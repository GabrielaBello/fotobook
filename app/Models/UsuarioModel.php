<?php

namespace App\Models;

use CodeIgniter\Model; 

class UsuarioModel extends Model{
//---------------------------------------------------------------------------------
//UsuarioModel Del Proyecto FINAL

    protected $table = "usuarios_225025"; //Nombre de la tabla
    protected $primaryKey = "id";  //Primary key

    //columnas que quiero que se puedan editar
    protected $allowedFields = ["nombre","descripcion","cantidad_fotos","precio"
                               ,"imagen","usuario_id"];

    //llena los campos created_at y updated_at
    protected $useTimestamps = true;


}