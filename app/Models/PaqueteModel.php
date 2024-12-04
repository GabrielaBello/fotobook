<?php

namespace App\Models;

use CodeIgniter\Model; 

class PaqueteModel extends Model{
//---------------------------------------------------------------------------------
//PaqueteModel Del Proyecto FINAL

    protected $table = "paquetes"; //Nombre de la tabla
    protected $primaryKey = "id";  //Primary key

    //columnas que quiero que se puedan editar
    protected $allowedFields = ["nombre","descripcion","cantidad_fotos","precio","imagen","usuario_id"];

    //llena los campos created_at y updated_at
    protected $useTimestamps = false;


}
