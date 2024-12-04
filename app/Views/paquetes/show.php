<?php $this->extend("plantilla"); ?>

<?php $this->section("titulo"); ?>
Detalles del paquete
<?php $this->endSection(); ?>

<?php $this->section("content"); ?>

<section class="row">
    <div class="col-12 card">

        <div class="card-header">
            <h3 class="card-title"> Paquete: <?= $paquete['nombre']; ?> </h3>
        </div>

        <div class="card-body">
            <ul>
                <li><b>Nombre:</b> <?= $paquete['nombre']; ?></li>
                <li><b>Descripción:</b> <?= $paquete['descripcion']; ?></li>
                <li><b>Cantidad de fotos:</b> <?= $paquete['cantidad_fotos']; ?></li>
                <li><b>Precio:</b> <?= $paquete['precio']; ?></li>
                <li><b>Imagen:</b> <?= $paquete['imagen']; ?></li>
            </ul>
        </div>
    </div>
</section>

<?php $this->endSection(); ?>
