<?php

class Mesas extends Controller {

    public function index() {
        $mesas = $this->model->getMesas();
        $ubicaciones = $this->model->getUbicaciones();

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

    public function json($columna, $fila, $contenedor) {
        $mesa = $this->model->getMesa($columna, $fila, $contenedor);
        require APP . 'view/mesas/json.php';
    }

    public function invitado($no_mesa, $no_silla) {
        $invitado = $this->model->getInvitado($no_mesa, $no_silla);
        require APP . 'view/mesas/invitado.php';
    }

}
