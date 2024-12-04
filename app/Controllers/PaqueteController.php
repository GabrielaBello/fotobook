<?php

namespace App\Controllers;

use App\Models\PaqueteModel;

class PaqueteController extends BaseController {

    protected $paqueteModel;

    public function __construct() {
        $this->paqueteModel = new PaqueteModel();
    }

    public function index() {
        $paquetes = $this->paqueteModel->findAll();
        return view('paquetes/index', ['paquetes' => $paquetes]);
    }

    public function show($id) {
        $paquete = $this->paqueteModel->find($id);
        return view('paquetes/show', ['paquete' => $paquete]);
    }

    public function create() {
        return view('paquetes/create');
    }

    public function store() {
        $data = array(
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'cantidad_fotos' => $this->request->getPost('cantidad_fotos'),
            'precio' => $this->request->getPost('precio'),
            'imagen' => $this->request->getPost('imagen'),
            'usuario_id' => $this->request->getPost('usuario_id')
        );

        $this->paqueteModel->save($data);
        return redirect()->to('/paquetes');
    }

    public function edit($id) {
        $paquete = $this->paqueteModel->find($id);
        return view('paquetes/edit', ['paquete' => $paquete]);
    }

    public function update($id) {
        $data = array(
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'cantidad_fotos' => $this->request->getPost('cantidad_fotos'),
            'precio' => $this->request->getPost('precio'),
            'imagen' => $this->request->getPost('imagen'),
            'usuario_id' => $this->request->getPost('usuario_id')
        );

        $this->paqueteModel->update($id, $data);
        return redirect()->to("/paquetes/$id");
    }

    public function delete($id) {
        $this->paqueteModel->delete($id);
        return redirect()->to('/paquetes');
    }
}
