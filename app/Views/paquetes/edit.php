<?php $this->extend("plantilla"); ?>

<?php $this->section("titulo"); ?>
Editar paquete
<?php $this->endSection(); ?>

<?php $this->section("content"); ?>

<section class="row">
    <div class="col-12 card">

        <div class="card-header">
            <h3 class="card-title"> Editar datos del paquete </h3>
        </div>

        <div class="card-body">
            <form action="/paquetes/<?= $paquete['id'] ?>/update" method="POST" name="paqueteForm">
                <div class="mb-3">
                    <label class="form-label" for="nombre">Nombre</label>
                    <input class="form-control" type="text" name="nombre" value="<?= $paquete['nombre'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="descripcion">Descripción</label>
                    <input class="form-control" type="text" name="descripcion" value="<?= $paquete['descripcion'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="cantidad_fotos">Cantidad de fotos</label>
                    <input class="form-control" type="number" name="cantidad_fotos" value="<?= $paquete['cantidad_fotos'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="precio">Precio</label>
                    <input class="form-control" type="number" name="precio" value="<?= $paquete['precio'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="imagen">Imagen</label>
                    <input class="form-control" type="text" name="imagen" value="<?= $paquete['imagen'] ?>" required>
                </div>

                <button class="btn btn-success" type="submit">Guardar cambios</button>
            </form>
        </div>
    </div>
</section>

<?php $this->endSection(); ?>
