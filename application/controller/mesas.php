<?php

class Mesas extends Controller {

    public function index() {

        $ubicaciones = $this->model->getUbicaciones();
        $mesas = $this->model->getMesas();
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/menu.php';
        require APP . 'view/mesas/functions.php';
        require APP . 'view/mesas/index.php';
        require APP . 'view/_templates/libs.php';
        require APP . 'view/mesas/libs.php';
        require APP . 'view/_templates/footer.php';
    }

        public function agregar() {

        $mesas = ($_POST["params"]['arrayMesas']);
        
        if (isset($mesas)) {
            $this->model->borrarMesas();
            foreach ($mesas as $values) {
                list($no_mesa, $no_sillas, $tipo, $contenedor, $columna, $fila) = explode(',', $values);
                $this->model->agregarMesas($no_mesa, $no_sillas, $tipo, $contenedor, $columna, $fila);
            }
            
        }
    }
}
