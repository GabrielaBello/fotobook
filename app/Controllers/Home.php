<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    //Se imprime algo
    public function saludar()
    {
        echo "<h1>Hola mundo</h1>";
    }

    public function saludar2( $nombre )
    {
        echo "<h1>Hola $nombre</h1>";
    }

    public function saludar3( $nombre, $edad )
    {
        echo "Hola $nombre ";
        echo($edad >= 18)? "Eres mayor de edad" : "Eres menor de edad";
    }

    //funcion calcular, que tengas dos numeros enteros como parametro
    //en respuesta imprima, la
    //suma, resta, multiplicacion y division de estos dos numeros

    public function calculadora( $num1, $num2, $operacion)
    {   
        echo "Numero 1: $num1 <br> ";
        echo "Numero 2: $num2 <br> ";
       echo "<hr>";

       switch ($operacion) {
        case 's': echo "<br>Sumar: ".($num1 + $num2); break;
        case 'r': echo "<br>Restar: ".($num1 - $num2); break;
        case 'm': echo "<br>Multiplicar: ".($num1 * $num2); break;
        case 'd': echo "<br>Division: ".($num1 / $num2); break; 
        default: echo "Esta operacion no exite )="; break;
       }

    }

    public function plantilla(){

        return view("plantilla");
        
    }


}