<?php

class Graficas extends Controller {

    public function index() {
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/menu.php';
        require APP . 'view/graficas/index.php';
        require APP . 'view/_templates/libs.php';
        require APP . 'view/graficas/libs.php';
        require APP . 'view/_templates/footer.php';
    }
    
    
    public function json($anios) {
        $graficas = $this->model->getBarras($anios);
        require APP . 'view/graficas/json.php';
    }


}
