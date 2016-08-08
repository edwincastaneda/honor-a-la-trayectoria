<?php

class Programa extends Controller {

    public function index() {

        $categorias = $this->model->getCategoriasConColores();
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/menu_programa.php';
        require APP . 'view/programa/index.php';
        require APP . 'view/_templates/libs.php';
        require APP . 'view/programa/libs.php';
        require APP . 'view/_templates/footer.php';
    }

    public function registrar($codigoBarras, $estado) {
        $this->model->registrarPin($codigoBarras, $estado);
    }

    public function homenajeados($anio, $entregadorPin) {
        $resultset = $this->model->getHomenajeados($anio, $entregadorPin);
        require APP . 'view/programa/json.php';
    }

    public function grupos($anios) {
        $resultset = $this->model->getGruposPorAnio($anios);
        require APP . 'view/programa/json.php';
    }

    public function autorefresh() {
        $resultset = $this->model->getAutoRefresh();
        require APP . 'view/programa/json.php';
    }

    public function refrescar($estado) {
        $this->model->setAutoRefresh($estado);
    }

}
