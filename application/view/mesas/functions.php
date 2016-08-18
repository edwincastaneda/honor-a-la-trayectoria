<style>
    <?php foreach ($categorias as $loop) { 
    echo ".anos_".$loop->anios."{
            background: ".$loop->color.";
            color:#fff;
            }
            ";
    
    }?>
</style>

<?php
function setInvitado($anos,$codigo_barras,$nombres_apellidos, $empresa, $departamento, $puesto){
    return $invitado='<div data-title="'.$nombres_apellidos.'" data-content="<strong>Empresa:</strong> '.$empresa.'<br/><strong>Departamento:</strong> '.$departamento.'<br/><strong>Puesto:</strong> '.$puesto.'" class="invitados anos_'.$anos.'" id="'.$codigo_barras.'">'.strtoupper (substr($nombres_apellidos, 0,1)).'</div>';
}

function getInvitado($no_mesa, $no_silla){
    $invitado='';
    $url = URL . 'mesas/invitado/' . $no_mesa . '/' . $no_silla;
    $json = file_get_contents($url);
    $obj = json_decode($json);
    
    if ($obj->estado != 0) {
         $invitado = setInvitado($obj->anios,$obj->codigoBarras,$obj->nombresApellidos,$obj->empresa,$obj->departamento,$obj->puesto);
    }
    
    return $invitado;
}

function dibujaMesa($numMesa, $numSillas, $tipo) {
    $silla = 1;
    $mesa="";
    if($tipo==1 || $tipo==2){
    $mesa .= '<div id="' . $numMesa . '-' . $numSillas . '-' . $tipo . '" class="contenedor_mesa">
        <div class="js-remove">✖</div>
    <div class="mesa">' . $numMesa . '</div>';

    if ($tipo == 1) {
        $value = 360 / $numSillas;
        for ($i = 0; $i < 360; $i = $i + $value) {
            $mesa.='<div class="sillas_contenedor" style="transform:rotateZ(' . $i . 'deg);">'
                    . '<div class="silla" id="' . $numMesa . '-' . $silla . '">';
                    
            $mesa.=getInvitado($numMesa,$silla);
            
            $mesa.= '</div></div>';
            $silla++;
        }
    }

    if ($tipo == 2) {
        $value = 180 / $numSillas;
        for ($i = 0; $i < 180; $i = $i + $value) {

            $grados = $i + 90;

            switch ($numSillas) {
                case 1:
                    $grados = $i + 180;
                    break;
                case 2:
                    $grados = ($i + 90 + 45);
                    break;
                case 3:
                    $grados = ($i + 90 + 30);
                    break;
                case 4:
                    $grados = ($i + 90 + 20);
                    break;
                case 5:
                    $grados = ($i + 90 + 18);
                    break;
                case 6:
                    $grados = ($i + 90 + 16);
                    break;
                case 7:
                    $grados = ($i + 90 + 14);
                    break;
                case 8:
                    $grados = ($i + 90 + 12);
                    break;
                case 9:
                    $grados = ($i + 90 + 10);
                    break;
                case 10:
                    $grados = ($i + 90 + 8);
                    break;
                case 11:
                    $grados = ($i + 90 + 6);
                    break;
            }
            //$mesa.='<div  class="sillas_contenedor" style="transform:rotateZ(' . $grados . 'deg);"><div class="silla" id="mesa-' . $numMesa . '-silla-' . $silla . '"></div></div>';
            
            $mesa.='<div class="sillas_contenedor" style="transform:rotateZ(' . $grados . 'deg);">'
                    . '<div class="silla" id="' . $numMesa . '-' . $silla . '">';
                    
            $mesa.=getInvitado($numMesa,$silla);
            
            $mesa.= '</div></div>';
            $silla++;
        }
    }


    return $mesa.='</div>';
    }
    
    if($tipo==3 || $tipo==4){
        $s = explode(".", $numSillas);
        $count=1;
        
                //$mesa.='<div id="' . $numMesa . '-' . $numSillas . '-' . $tipo . '" class="contenedor_mesa cuadrada">' .
                

                //$mesa.='<div class="mesa mesa_cuadrada">' . $numMesa . '</div>';
               
                
                if ($tipo==4){
                    $mesa.='<div id="' . $numMesa . '-' . $numSillas . '-' . $tipo . '" class="contenedor_mesa cuadrada_alta">';
                    $mesa.='<div class="mesa mesa_cuadrada_alta">' . $numMesa . '</div>';
                }else{
                    $mesa.='<div id="' . $numMesa . '-' . $numSillas . '-' . $tipo . '" class="contenedor_mesa cuadrada">';
                    $mesa.='<div class="mesa mesa_cuadrada">' . $numMesa . '</div>';
                }
                
                $mesa.='<div class="js-remove">✖</div>';

                $mesa.='<div class="contenedor_t"><div>';
                for ($i = 1; $i <= $s[0]; $i++) {
                    $mesa.='<div class="silla" id="mesa-'. $numMesa .'-silla-'.$count.'">';
                    $mesa.=getInvitado($numMesa,$count);
                    $mesa.='</div>';
                    $count++;
                }
                 $mesa.='</div></div>';
                 
                $mesa.='<div class="contenedor_r"><div>';
                for ($i = 1; $i <= $s[2]; $i++) {
                    $mesa.='<div class="silla" id="mesa-'. $numMesa .'-silla-'.$count.'">';
                    $mesa.=getInvitado($numMesa,$count);
                    $mesa.='</div>';
                    $count++;
                }
                
                $mesa.='</div></div>';
                
                $mesa.='<div class="contenedor_b"><div>';
                for ($i = 1; $i <= $s[1]; $i++) {
                    $mesa.='<div class="silla" id="mesa-'. $numMesa .'-silla-'.$count.'">';
                    $mesa.=getInvitado($numMesa,$count);
                    $mesa.='</div>';
                    $count++;
                }
                $mesa.='</div></div>';
                
                $mesa.='<div class="contenedor_l"><div>';
                for ($i = 1; $i <= $s[3]; $i++) {
                    $mesa.='<div class="silla" id="mesa-'. $numMesa .'-silla-'.$count.'">';
                    $mesa.=getInvitado($numMesa,$count);
                    $mesa.='</div>';
                    $count++;
                }
                $mesa.='</div></div>';
                
                return $mesa;
                
    }
}
?>