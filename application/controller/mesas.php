<?php

class Mesas extends Controller {

    public function index() {

        $ubicaciones = $this->model->getUbicaciones();
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/menu.php';
        require APP . 'view/mesas/index.php';
        require APP . 'view/_templates/libs.php';
        require APP . 'view/mesas/libs.php';
        require APP . 'view/_templates/footer.php';
    }

}
