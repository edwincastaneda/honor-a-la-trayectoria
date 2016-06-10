<?php
function dibujaMesa($numMesa, $numSillas, $tipo) {
    $silla = 1;
    $mesa = '<div id="' . $numMesa . '-' . $numSillas . '-' . $tipo . '" class="contenedor_mesa">
        <div class="js-remove">✖</div>
    <div class="mesa">' . $numMesa . '</div>';

    if ($tipo == 1) {
        $value = 360 / $numSillas;
        for ($i = 0; $i <= 360; $i = $i + $value) {
            $mesa.='<div  class="sillas_contenedor" style="transform:rotateZ(' . $i . 'deg);"><div class="silla" id="mesa-' . $numMesa . '-silla-' . $silla . '"></div></div>';
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
            $mesa.='<div  class="sillas_contenedor" style="transform:rotateZ(' . $grados . 'deg);"><div class="silla" id="mesa-' . $numMesa . '-silla-' . $silla . '"></div></div>';
            $silla++;
        }
    }


    return $mesa.='</div>';
}
?>