<?php

class Mesas extends Controller {

    public function index() {
        $invNA = $this->model->getInvitadosNoAsignados();
        $invitados = $this->model->getInvitadosMesas();
        $mesas = $this->model->getMesas();
        $ubicaciones = $this->model->getUbicaciones();
        $categorias = $this->model->getCategoriasConColores();

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
        $invitado = $this->model->getInvitadoMesa($no_mesa, $no_silla);
        require APP . 'view/mesas/invitado.php';
    }

    public function actualizar() {

        $invitados = ($_POST["params"]['arrayInvitados']);
        $this->model->borrarAsignacionMesa();

        if (isset($invitados)) {
            
            foreach ($invitados as $values) {
                list($no_mesa, $no_silla, $codigo_barras) = explode(',', $values);
                $this->model->asignarMesaInvitado($no_mesa, $no_silla, $codigo_barras);
            }
        }
        
        
    }
    
    public function todas() {
        $mesas = $this->model->getMesasJson();
        require APP . 'view/mesas/todas.php';
    }
    
    public function asignarAuto() {
        $mesasCategorias = ($_POST["params"]);
       
        if (isset($mesasCategorias)) {
            $partes = preg_split("/&0=0&/", $mesasCategorias);
            
            $mesas=str_replace("mesa-","",$partes[0]);
            $mesas=str_replace("=on","",$mesas);
            $mesas=str_replace("&",",",$mesas);
            $mesasArray = explode(",", $mesas);
            
            $cat=str_replace("cat-","",$partes[1]);
            $cat=str_replace("=on","",$cat);
            $cat=str_replace("&",",",$cat);
            
            
            foreach ($mesasArray as &$valor) {
                $sillas = $this->model->getNumeroSillas($valor);
                $utilizadas = $this->model->getSillasUtilizadas($valor);  

                for ($i = 1; $i <= $sillas; $i++) {
                    if (!in_array($i, $utilizadas)) {
                        $cb=$this->model->getInvitadosSinAsignar($cat);
                        $this->model->asignarMesaInvitado($valor,$i,$cb->codigoBarras);
                    }
                }
            }
            
        }
    }
    

  
}
