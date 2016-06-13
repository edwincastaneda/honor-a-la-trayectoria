
<script>
    
    var arrayMesas = new Array();
<?php
$i = 0;
$move = "";
foreach ($ubicaciones as $loop) {
    $descripcion = $loop->descripcion;
    $padre = $loop->padre_descripcion;
    $p_columna = $loop->padre_columna;
    $p_fila = $loop->padre_fila;

    if ($p_columna > 0 && $p_fila > 0) {
        $move.= '            $(".' . $descripcion . '").parent(".tabla_localidad").'
                . 'detach().appendTo("#' . $padre . '-' . $p_columna . '-' . $p_fila . '");' . "\r\n";
    }
    $i++;
}

$i = 0;
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
    $i++;
}
?>
    jQuery(document).ready(function ($) {
        $('#avisos_modal').modal('hide');
    
<?php
echo $move;
?>
    });

</script>
<?php
?>
<div id="wrapper">

        <!-- Modal-->
    <div class="modal fade in" id="avisos_modal" tabindex="-1" data-show role="dialog" data-backdrop="static" data-keyboard="false" >
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="avisos_modal_titulo"></h4>
                </div>
                <div class="modal-body" id="avisos_modal_mensaje"></div>
            </div>
        </div>
    </div>

        
        
    <!-- Sidebar -->
    <div id="sidebar-wrapper">

        <form style="padding:10px">
            <div class="form-group">
                <label for="no_sillas">Numero de sillas*</label>
                <input type="number" min="1" max="12" class="form-control" id="no_sillas"value="10" required="required">
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
        <br/>
        <div class="col-lg-12">
            <label for="contenedor_asignacion_manual">Asignacion Manual</label>
            
            <div id="contenedor_asignacion_manual" class="silla">
            </div>
            
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
                                $tabla = '<div class="tabla_localidad con_mesa" id="' . $titulo . '-' . $columnas . '-' . $filas . '">';
                            } else {
                                $tabla = '<div class="tabla_localidad">';
                            }
                            $tabla.= '<table class="' . $titulo . '">' .
                                    '<tbody>';

                            for ($i = 0; $i < $filas; $i++) {
                                $tabla.='<tr>';
                                for ($j = 0; $j < $columnas; $j++) {
                                    $tabla.='<td class="secciones_mesas asigna_mesas_' . $tiene_mesas . '" id="' . $titulo . '-' . ($j + 1) . '-' . ($i + 1) . '">';

                                    $url = URL . 'mesas/json/' . ($j + 1) . '/' . ($i + 1) . '/' . $titulo;
                                    $json = file_get_contents($url);
                                    $obj = json_decode($json);

                                    if ($obj->estado != 0) {
                                        $tabla.= dibujaMesa($obj->no_mesa, $obj->no_sillas, $obj->tipo);
                                    }

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

            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->