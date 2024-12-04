<!-- Views/usuarios/create -->

<?php $this->extend("plantilla"); //Plantilla que usaremos ?>

<?php $this->section("titulo");  ?>
Nuevo usuario
<?php $this->endSection();  ?>

<?php $this->section("content"); //Aqui empieza el contenido ?>

<section class="row">
    <div class="col-12 card">

        <div class="card-header">
        
        <a href="<?= base_url(); ?>/usuarios/create" 
            class="btn btn-success btn-sm"> 
            <i class= "bi bi-plus"></i>    
            Nuevo Usuario 
        </a>

        </div>

        <div class="card-body">
           
        <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th style="width: 40px">Telefono</th>
                                <th> Acciones </th>
                            </tr>
                        </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario): //inicio foreach ?>
                        <tr class="align-middle">
                            <td> <?=$usuario["id"]; ?> </td>
                            <td> <?=$usuario["nombre"]; ?> </td>
                            <td> <?=$usuario["correo"]; ?> </td>
                            <td> <?=$usuario["telefono"]; ?>  </td>
                            <td>
                            
                            

                                <a href="<?= base_url("/usuarios/$usuario[id]/edit"); ?>"
                                href="" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i> 
                                </a>
 

                                <a href="<?= base_url("/usuarios/$usuario[id]"); ?>"
                                href="" class="btn btn-success btn-sm">
                                <i class="bi bi-eye"></i> 
                                </a>


                                <button
                                onClick="eliminar(<?=$usuario["id"]; ?>)"     
                                class="btn btn-danger btn-sm"> 
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
                    <!-- libreria de sweet alert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script> //JAVASCRIPT

    function eliminar(id){
        
        Swal.fire({
  title: "Estas seguro?",
  text: "El registro se eliminara permanentemente!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Si, Eliminalo para siempre!"
}).then((result) => {
  if (result.isConfirmed) {
    location.href= "<?=base_url(); ?>/usuarios/"+id+"/delete";
   //href.location = `/usuarios/{id}/delete`;
  }
});

    }

</script>


<?php $this->endSection(); //Aqui termina el contenido?>
