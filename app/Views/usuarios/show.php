<!-- Views/usuarios/create -->

<?php $this->extend("plantilla"); //Plantilla que usaremos ?>

<?php $this->section("titulo");  ?>
Info del usuario
<?php $this->endSection();  ?>

<?php $this->section("content"); //Aqui empieza el contenido ?>

<section class="row">
    <div class="col-12 card">

        <div class="card-header">
            <h3 class="card-title"> Usuario <?= $usuario["nombre"]; ?> </h3>
        </div>

        <div class="card-body">
        <u1>

        <li> <b>Nombre:</b> <?= $usuario["nombre"]; ?></li>
        <li> <b>Telefono:</b> <?= $usuario["telefono"]; ?></li>
        <li> <b>Correo:</b> <?= $usuario["correo"]; ?></li>



        </u1>





        </div>
    </div>
</section>


<?php $this->endSection(); //Aqui termina el contenido?>
