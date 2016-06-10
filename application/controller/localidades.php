<?php

class Localidades extends Controller {

    public function index() {
        $ubicaciones = $this->model->getUbicaciones();
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/menu.php';
        require APP . 'view/localidades/index.php';
        require APP . 'view/_templates/libs.php';
        require APP . 'view/localidades/libs.php';
        require APP . 'view/_templates/footer.php';
    }

    public function agregar() {

        $tablas = ($_POST["params"]['arrayTablas']);
        
        if (isset($tablas)) {
            $this->model->borrarUbicaciones();
            foreach ($tablas as $values) {
                list($descripcion, $columnas, $filas, $p_descripcion, $p_columna, $p_fila, $mesas) = explode(',', $values);
                $this->model->agregarUbicacion($descripcion, $columnas, $filas, $p_descripcion, $p_columna, $p_fila, $mesas);
            }
            
        }
    }

}
