<?php

/*
 * This file is part of the Predis package.
 *
 * (c) 2009-2020 Daniele Alessandri
 * (c) 2021-2023 Till Krüss
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Predis\Monitor;

use Iterator;
use Predis\ClientInterface;
use Predis\Connection\Cluster\ClusterInterface;
use Predis\NotSupportedException;
use ReturnTypeWillChange;

/**
 * Redis MONITOR consumer.
 */
class Consumer implements Iterator
{
    private $client;
    private $valid;
    private $position;

    /**
     * @param ClientInterface $client Client instance used by the consumer.
     */
    public function __construct(ClientInterface $client)
    {
        $this->assertClient($client);

        $this->client = $client;

        $this->start();
    }

    /**
     * Automatically stops the consumer when the garbage collector kicks in.
     */
    public function __destruct()
    {
        $this->stop();
    }

    /**
     * Checks if the passed client instance satisfies the required conditions
     * needed to initialize a monitor consumer.
     *
     * @param ClientInterface $client Client instance used by the consumer.
     *
     * @throws NotSupportedException
     */
    private function assertClient(ClientInterface $client)
    {
        if ($client->getConnection() instanceof ClusterInterface) {
            throw new NotSupportedException(
                'Cannot initialize a monitor consumer over cluster connections.'
            );
        }

        if (!$client->getCommandFactory()->supports('MONITOR')) {
            throw new NotSupportedException("'MONITOR' is not supported by the current command factory.");
        }
    }

    /**
     * Initializes the consumer and sends the MONITOR command to the server.
     */
    protected function start()
    {
        $this->client->executeCommand(
            $this->client->createCommand('MONITOR')
        );
        $this->valid = true;
    }

    /**
     * Stops the consumer. Internally this is done by disconnecting from server
     * since there is no way to terminate the stream initialized by MONITOR.
     */
    public function stop()
    {
        $this->client->disconnect();
        $this->valid = false;
    }

    /**
     * @return void
     */
    #[ReturnTypeWillChange]
    public function rewind()
    {
        // NOOP
    }

    /**
     * Returns the last message payload retrieved from the server.
     *
     * @return object
     */
    #[ReturnTypeWillChange]
    public function current()
    {
        return $this->getValue();
    }

    /**
     * @return int|null
     */
    #[ReturnTypeWillChange]
    public function key()
    {
        return $this->position;
    }

    /**
     * @return void
     */
    #[ReturnTypeWillChange]
    public function next()
    {
        ++$this->position;
    }

    /**
     * Checks if the the consumer is still in a valid state to continue.
     *
     * @return bool
     */
    #[ReturnTypeWillChange]
    public function valid()
    {
        return $this->valid;
    }

    /**
     * Waits for a new message from the server generated by MONITOR and returns
     * it when available.
     *
     * @return object
     */
    private function getValue()
    {
        $database = 0;
        $client = null;
        $event = $this->client->getConnection()->read();

        $callback = function ($matches) use (&$database, &$client) {
            if (2 === $count = count($matches)) {
                // Redis <= 2.4
                $database = (int) $matches[1];
            }

            if (4 === $count) {
                // Redis >= 2.6
                $database = (int) $matches[2];
                $client = $matches[3];
            }

            return ' ';
        };

        $event = preg_replace_callback('/ \(db (\d+)\) | \[(\d+) (.*?)\] /', $callback, $event, 1);
        @[$timestamp, $command, $arguments] = explode(' ', $event, 3);

        return (object) [
            'timestamp' => (float) $timestamp,
            'database' => $database,
            'client' => $client,
            'command' => substr($command, 1, -1),
            'arguments' => $arguments,
        ];
    }
}
