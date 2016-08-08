<?php

class Entregador extends Controller {

    public function index() {
        //$categorias = $this->model->getCategoriasData();
        $empresas = $this->model->getEmpresas();
        //$max = $this->model->getCategoriaMayor();
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/menu.php';
        require APP . 'view/entregador/index.php';
        require APP . 'view/_templates/libs.php';
        //require APP . 'view/entregador/libs.php';
        require APP . 'view/_templates/footer.php';
    }
    
    
    public function empresa() {
        if(isset($_GET['nombre'])){
        $empresa=$_GET['nombre'];
        $resultset = $this->model->getHomenajeadosEmpresa($empresa);
        require APP . 'view/entregador/json.php';
        }
    }
    



}
