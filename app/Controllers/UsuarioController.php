<?php

namespace App\Controllers;

use App\models\UsuarioModel;

class UsuarioController extends BaseController{

    
    protected $usuarioModel;

    function __construct(){
        $this->usuarioModel = new UsuarioModel();
    }



    //normalmente esta lista de usuarios (VIEW)
    public function index (){
        //crear, buscar, editar, eliminar usuarios
        //$usuarioModel = new UsuarioModel();

        $usuarios = $this->usuarioModel -> findAll(); //$usuarioModel -> findAll();

        $data= array(
            "usuarios" => $usuarios
        );

         return view("usuarios/index",$data);
    }

    //Informacion de un usuario (VIEW)
    public function show($id){
        
        $usuario = $this -> usuarioModel -> find($id);

        $data = array("usuario" => $usuario);

        return view("usuarios/show", $data);
        //echo "<h1> INFO USUARIO $id </h1>";
        //echo "<p> $usuario[nombre] - $usuario[telefono]</p>";

    }

    //Formulario para crear usuario (VIEW)
    public function create(){
        
        return view("usuarios/create");

    }

    //Codigo para guardar usuario en la b Base de Datos "DB" (redirect -> index)
    public function store(){
        
        $data = array(
            "nombre" => $this->request->getPost("nombre"),
            "telefono" => $this->request->getPost("telefono"),
            "correo" => $this->request->getPost("correo"),
            "password" => $this->request->getPost("password")
        );
        
        $this->usuarioModel->save($data);

        return redirect()->to("/usuarios");

    }

    //Formulario para editar usuario (VIEW)
    public function edit($id){
        //buscamos el usuario a editar 
        $usuario = $this->usuarioModel->find($id);
        //creamos el data que se le pasara al view 
        $data = array(
            "usuario" => $usuario
        );

        //Retornamos la vista edit que esta en la carpeta "usuarios"
        return view("usuarios/edit", $data);

    }

    //Codigo para actualizar usuario (redirect -> view)
    public function update($id){
        
        $data = array(
            "nombre" => $this->request->getPost("nombre"),
            "telefono" => $this->request->getPost("telefono"),
            "correo" => $this->request->getPost("correo"),
            "password" => $this->request->getPost("password")
        );

        $this->usuarioModel->update($id,$data);

        return redirect()->to("/usuarios/$id");
    }

    //Codigo para eliminar un usuario de la Base de Datos "DB" (redirect -> index)
    public function delete($id){
        
        //en esta linea lo que pasara es que solamente buscara el ID que corresponde
        //y al momento de escribir su numero en el URL automaticamente se eliminaraS
        $this->usuarioModel->delete($id);
        return redirect()->to("/usuarios");
        
    }

    public function login(){
        
        return view("usuarios/login");

    }

    public function validarLogin(){
        
        $correo = $this->request->getPOST("correo");
        $password = $this->request->getPOST("password");

        $usuario = $this->usuarioModel
                        ->where("correo",$correo)
                        ->where("password",$password)
                        ->first();
        
        if(!$usuario){
            return redirect()->to(base_url()."/;login");
        }else{
            session()->set($usuario);

            return redirect()->to(base_url()."/usuarios");
        }

    }

    public function logout(){
        
    }

}