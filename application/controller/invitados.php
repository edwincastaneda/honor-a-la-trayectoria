<?php

class Invitados extends Controller {

    public function index() {
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/menu.php';
        require APP . 'view/invitados/index.php';
        require APP . 'view/invitados/libs.php';
        require APP . 'view/_templates/libs.php';
        require APP . 'view/_templates/footer.php';
    }
    
    public function json() {

        $resultset = $this->model->getInvitados();
       
        require APP . 'view/invitados/json.php';
    }

    
    public function subirXLS() {


        require APP . 'libs/PHPExcel.php';
        include APP . 'libs/PHPExcel/IOFactory.php';

        $uploaddir = $_SERVER["DOCUMENT_ROOT"] . URL_SUB_FOLDER . "public/xls/";
        $nombreArchivo = basename($_FILES['file']['name']);
        $uploadfile = $uploaddir . $nombreArchivo;

        // SI CARGO EL ARCHIVO Y SE MOVIO A LA CARPETA
        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {

            $inputFileName = $uploadfile;
            $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
            $sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, false);

            $columnas = ord(strtolower($objPHPExcel->setActiveSheetIndex(0)->getHighestColumn())) - 96;
            
            $array = array();
          foreach ($sheetData as $clave => $valor) {

                if ($clave == 0) {
                    for ($i = 0; $i <= $columnas-1; $i++) {
                        try{
                         array_push($array, $valor[$i]);
                        } catch(Exception $e){
                            
                        }
                    } 
                }else{
                       
                        
                     $arr = array("","","","","","0",
                                    "","","1","0","0","","");
                     
                    for ($i = 0; $i <= $columnas-1; $i++) {   
                             switch ($array[$i]) {
                                case "nombresApellidos":
                                    $arr[0]=$valor[$i];
                                    break;
                                case "codigoBarras":
                                    $arr[1]=$valor[$i];
                                    break;
                                case "empresa":
                                    $arr[2]=$valor[$i];
                                    break;
                                case "departamento":
                                     $arr[3]=$valor[$i];
                                    break;
                                case "puesto":
                                     $arr[4]=$valor[$i];
                                    break;
                                case "asistencia":
                                     $arr[5]=$valor[$i];
                                    break;
                                case "fechaIngreso":
                                     $arr[6]=$valor[$i];
                                    break;
                                case "anios":
                                     $arr[7]=$valor[$i];
                                    break;
                                case "numPersonas":
                                     $arr[8]=$valor[$i];
                                    break;
                                case "confirmacion":
                                     $arr[9]=$valor[$i];
                                    break;
                                case "entregaPin":
                                     $arr[10]=$valor[$i];
                                    break;
                                case "entregadorPin":
                                     $arr[11]=$valor[$i];
                                    break;
                            }
                            
                     } 
                    $this->model->agregarInvitado($arr[0], $arr[1], $arr[2], $arr[3], $arr[4], $arr[5], $arr[6], $arr[7], $arr[8], $arr[9], $arr[10], $arr[11]);   
                    
                }
            }
            
            echo "<strong>Realizado!</stron> Archivo cargado en base de datos...";
 
          
        } else {
            echo "Error al cargar excel, kntente nuevamente";
        }

    }
    
    
    public function categorias() {
        $categorias = $this->model->getCategorias();
        require APP . 'view/invitados/categorias.php';
    }
    
    public function entregador($id) {
        $resultset = $this->model->getEntregador($id);
        require APP . 'view/invitados/json.php';
    }
    
    public function entregadores() {
        $resultset = $this->model->getEntregadores();
        require APP . 'view/invitados/json.php';
    }
    
    public function cambiarEntregador($codigo, $entrega) {
       $this->model->setEntregador($codigo, $entrega);
    }
    

}
