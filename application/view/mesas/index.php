
<script>
    var arrayMesas = new Array();
<?php
$i = 0;
$move1 = "";
foreach ($ubicaciones as $loop) {
    $descripcion = $loop->descripcion;
    $padre = $loop->padre_descripcion;
    $p_columna = $loop->padre_columna;
    $p_fila = $loop->padre_fila;

    if ($p_columna > 0 && $p_fila > 0) {
        $move1.= '            $(".' . $descripcion . '").parent(".tabla_localidad").'
                . 'detach().appendTo("#' . $padre . '-' . $p_columna . '-' . $p_fila . '");' . "\r\n";
    }
    $i++;
}

$i = 0;
$move2 = "";
foreach ($mesas as $loop) {
    $mesa = $loop->no_mesa;
    $sillas = $loop->no_sillas;
    $tipo = $loop->tipo;
    $contenedor = $loop->contenedor;
    $columna = $loop->columna;
    $fila = $loop->fila;
    ?>

        //-------------------<?php echo "objeto_" . $i; ?>------------------------- 
        var objeto_<?php echo $i; ?> = {};
        objeto_<?php echo $i; ?>["mesa"] = "<?php echo $mesa; ?>";
        objeto_<?php echo $i; ?>["sillas"] = "<?php echo $sillas; ?>";
        objeto_<?php echo $i; ?>["tipo"] = "<?php echo $tipo; ?>";
        objeto_<?php echo $i; ?>["contenedor"] = "<?php echo $contenedor; ?>";
        objeto_<?php echo $i; ?>["columna"] = "<?php echo $columna; ?>";
        objeto_<?php echo $i; ?>["fila"] = "<?php echo $fila; ?>";
        arrayMesas.push(objeto_<?php echo $i; ?>);
        //----------------------------------------------------

        //--------------MOVIMIENTO DE OBJETOS-----------------
    <?php
    if ($p_columna > 0 && $p_fila > 0) {
        $move2.= '            $("#' . $mesa . '-' . $sillas . '-' . $tipo . '").'
                . 'detach().appendTo("#' . $contenedor . '-' . $columna . '-' . $fila . '");' . "\r\n";
    }
    $i++;
}
?>
    jQuery(document).ready(function ($) {

<?php
echo $move1;
echo $move2;
?>
        console.log(arrayMesas);
    });

</script>
<?php
?>
<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">

        <form style="padding:10px">
            <div class="form-group">
                <label for="no_sillas">Numero de sillas*</label>
                <input type="number" min="1" max="12" class="form-control" id="no_sillas"value="8" required="required">
            </div>
            <div class="form-group">
                <label for="no_mesa">Identificador de mesa*</label>
                <input type="number" min="1" max="999" class="form-control" id="no_mesa" value="0" required="required">
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" id="media_luna"> Media Luna
                </label>
            </div>
        </form>

        <div id="generador_sillas"></div>
         <label for="no_mesa">Invitados sin asignar:</label>
        <div id="">
            <a tabindex="0" class="invitados"  role="button" data-html="true" data-toggle="popover" data-trigger="focus" title="Nombre Apellido" data-content="<div><b>AÑOS:</b> 5</br><b>DEPARATAMENTO:</b> Informatica</div>" data-placement="top" data-container="body">NA</a>
            <a tabindex="0" class="invitados"  role="button" data-html="true" data-toggle="popover" data-trigger="focus" title="Nombre Apellido" data-content="<div><b>AÑOS:</b> 5</br><b>DEPARATAMENTO:</b> Informatica</div>" data-placement="top" data-container="body">NA</a>

        </div>

    </div>

    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <table>
                        <tr>
                            <td>
                                <a href="#menu-toggle" class="btn btn-default menu-toggle botones_titulo"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a>
                            </td>
                            <td>
                                <h1>Distribución de Mesas</h1>
                            </td>
                        </tr>
                    </table>

                    <div class="row alert alert-success" style="display:none;"  id="alert_auto_guardado" role="alert">
                        <strong>Auto-Guardado!</strong> Los cambios han sido actualizados.
                    </div>

                    <div id="mapa_localidades" class="row">

                        <?php
                        foreach ($ubicaciones as $loop) {

                            $titulo = $loop->descripcion;
                            $padre = $loop->padre_descripcion;
                            $columnas = $loop->columnas;
                            $filas = $loop->filas;
                            $tiene_mesas = $loop->mesas;


                            if ($tiene_mesas > 0) {
                                $tabla = '<div class="tabla_localidad con_mesa" id="' . $titulo . '-' . $columnas . '-' . $filas . '" data-toggle="tooltip" data-placement="top" title="' . $titulo . '">';
                            } else {
                                $tabla = '<div class="tabla_localidad">';
                            }
                            $tabla.= '<table class="' . $titulo . '">' .
                                    '<tbody>';

                            for ($i = 0; $i < $filas; $i++) {
                                $tabla.='<tr>';
                                for ($j = 0; $j < $columnas; $j++) {
                                    $tabla.='<td class="secciones_mesas asigna_mesas_' . $tiene_mesas . '" id="' . $titulo . '-' . ($j + 1) . '-' . ($i + 1) . '">';

                                    $tabla.='</td>';
                                }
                                $tabla.='</tr>';
                            }

                            $tabla.='</tbody>' .
                                    '</table>' .
                                    '</div>';

                            echo $tabla;
                        }
                        ?>
                    </div>
                </div>
                <div id="mesas_vacias">
                        <?php
                        foreach ($mesas as $loop) {
                            $mesa = $loop->no_mesa;
                            $sillas = $loop->no_sillas;
                            $tipo = $loop->tipo;
                            $contenedor = $loop->contenedor;
                            $columna = $loop->columna;
                            $fila = $loop->fila;


                            echo dibujaMesa($mesa, $sillas, $tipo);
                        }
                        ?>
                    </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->