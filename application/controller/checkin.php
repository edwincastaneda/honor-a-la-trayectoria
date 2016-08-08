<?php

class Checkin extends Controller {

    public function index() {
        
        if(isset($_GET['c'])){
        $asignacionMesas=$this->model->getAsignacionPorCodigo($_GET['c']);
        }
        
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/menu.php';
        require APP . 'view/checkin/index.php';
        require APP . 'view/_templates/libs.php';
        require APP . 'view/checkin/libs.php';
        require APP . 'view/_templates/footer.php';
       
    }

    public function registrar($codigoBarras) {
            $this->model->registrarInvitado($codigoBarras);
            $this->model->setAutoRefresh(1);
            header("Location: ".URL.'checkin/?c='.$codigoBarras);
    }
    
    
    public function json() {
        $invitados = $this->model->getInvitadosNoConfirmados("asistencia");

        require APP . 'view/checkin/json.php';
    }


}
