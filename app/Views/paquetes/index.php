<?php $this->extend("plantilla"); //Plantilla que usaremos ?>

<?php $this->section("titulo"); ?>
Lista de Paquetes
<?php $this->endSection(); ?>

<?php $this->section("content"); //Aquí empieza el contenido ?>

<section class="row">
    <div class="col-12 card">

        <div class="card-header">
            <a href="<?= base_url(); ?>/paquetes/create" class="btn btn-success btn-sm"> 
                <i class="bi bi-plus"></i>    
                Nuevo Paquete 
            </a>
        </div>

        <div class="card-body">
           
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th style="width: 40px">Cantidad de Fotos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($paquetes as $paquete): //inicio foreach ?>
                    <tr class="align-middle">
                        <td> <?=$paquete["id"]; ?> </td>
                        <td> <?=$paquete["nombre"]; ?> </td>
                        <td> <?=$paquete["descripcion"]; ?> </td>
                        <td> <?=$paquete["precio"]; ?>  </td>
                        <td> <?=$paquete["cantidad_fotos"]; ?>  </td>
                        <td>
                            <a href="<?= base_url("/paquetes/$paquete[id]/edit"); ?>" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i> 
                            </a>

                            <a href="<?= base_url("/paquetes/$paquete[id]"); ?>" class="btn btn-success btn-sm">
                                <i class="bi bi-eye"></i> 
                            </a>

                            <button onClick="eliminar(<?=$paquete['id']; ?>)" class="btn btn-danger btn-sm"> 
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; //fin foreach ?>
            </tbody>
        </table>

        </div>
    </div>
</section>

<!-- librería de sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script> // JAVASCRIPT

    function eliminar(id){
        Swal.fire({
            title: "¿Estás seguro?",
            text: "¡El registro se eliminará permanentemente!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "¡Sí, Elimínalo para siempre!"
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = "<?=base_url(); ?>/paquetes/" + id + "/delete";
            }
        });
    }

</script>

<?php $this->endSection(); //Aquí termina el contenido?>
