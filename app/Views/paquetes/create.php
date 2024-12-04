<!-- Views/paquetes/create -->

<?php $this->extend("plantilla"); //Plantilla que usaremos ?>

<?php $this->section("titulo");  ?>
Nuevo paquete
<?php $this->endSection();  ?>

<?php $this->section("content"); //Aqui empieza el contenido ?>

<section class="row">
    <div class="col-12 card">

        <div class="card-header">
            <h3 class="card-title"> Datos del paquete </h3>
        </div>

        <div class="card-body">
            
        <form action="/paquetes/store"method="POST" name="paqueteForm" > 

            <div class ="mb-3">
                <label class="form-label" for="nombre">Nombre</label>
                <input class="form-control" type="text" name="nombre" required>
            </div>

            <div class ="mb-3">
                <label class="form-label" for="descripcion">Descripción</label>
                <input class="form-control" type="text" name="descripcion" required>
            </div>

            <div class ="mb-3">
                <label class="form-label" for="cantidad_fotos">Cantidad de fotos</label>
                <input class="form-control" type="number" name="cantidad_fotos" required>
            </div class ="mb-3">

            <div class ="mb-3">
                <label class="form-label" for="precio">Precio</label>
                <input class="form-control" type="number" name="precio" required>
            </div class ="mb-3">

            <div class ="mb-3">
                <label class="form-label" for="imagen">Imagen</label>
                <input class="form-control" type="text" name="imagen" required>
            </div class ="mb-3">

            <div class ="mb-3">
                <label class="form-label" for="usuario_id">Usuario</label>
                <input class="form-control" type="text" name="usuario_id" required>
            </div class ="mb-3">

            <button class="btn btn-success" type="submit"> Crear Paquete</button>
        </form>
        </div>
    </div>
</section>


<?php $this->endSection(); //Aqui termina el contenido?>
