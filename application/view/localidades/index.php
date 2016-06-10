
<script>
    var arrayTablas = new Array();
<?php
$i = 0;
$move = "";
foreach ($ubicaciones as $loop) {
    $descripcion = $loop->descripcion;
    $padre = $loop->padre_descripcion;
    $columnas = $loop->columnas;
    $filas = $loop->filas;
    $mesas = $loop->mesas;
    $p_columna = $loop->padre_columna;
    $p_fila = $loop->padre_fila;
    ?>

        //-------------------<?php echo "objeto_" . $i; ?>------------------------- 
        var objeto_<?php echo $i; ?> = {};
        objeto_<?php echo $i; ?>["descripcion"] = "<?php echo $descripcion; ?>";
        objeto_<?php echo $i; ?>["columnas_filas"] = "<?php echo $columnas; ?>" + "-" + "<?php echo $filas; ?>";
        objeto_<?php echo $i; ?>["padre"] = "<?php echo $padre . "-" . $p_columna . "-" . $p_fila; ?>";
        objeto_<?php echo $i; ?>["mesas"] = "<?php echo $mesas; ?>";
        arrayTablas.push(objeto_<?php echo $i; ?>);
        //----------------------------------------------------
    <?php
    if ($p_columna > 0 && $p_fila > 0) {
        $move.= '            $(".' . $descripcion . '").parent(".tabla_localidad").'
                . 'detach().appendTo("#' . $padre . '-' . $p_columna . '-' . $p_fila . '");' . "\r\n";
    }
    $i++;
}
?>

    //--------------MOVIMIENTO DE OBJETOS-----------------

    jQuery(document).ready(function ($) {
<?php
echo $move;
?>
    });
</script>
<div id="wrapper">
    <!-- Modal-->
    <div class="modal fade" id="avisos_modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" >
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
        <form class="col-lg-12">
            <div class="form-group">
                <label for="columnas_tabla">Columnas*</label>
                <input type="number" class="form-control" id="columnas_tabla"value="1" required="required">
            </div>
            <div class="form-group">
                <label for="filas_tabla">Filas*</label>
                <input type="number" class="form-control" id="filas_tabla" value="1" required="required">
            </div>
            <div class="form-group">
                <label for="descripcion_tabla">Descripción*</label>
                <input type="text" class="form-control" id="descripcion_tabla" placeholder="Describa la ubicación">
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" checked="false" id="mesas_tabla"> Contiene mesas
                </label>
            </div>
            <button id="agrega_tabla" type="button" class="btn btn-primary btn-sm btn-block">Agregar</button>
        </form>
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
                                <h1>Ubicaciones</h1>
                            </td>
                        </tr>
                    </table>
                    <div class="row alert alert-success" style="display:none;"  id="alert_auto_guardado" role="alert">
                        <strong>Auto-Guardado!</strong> Los cambios han sido actualizados.
                    </div>
                    <form id="formulario_tablas">
                        <div id="mapa_localidades" class="row seccion_tabla">

                            <?php
                            foreach ($ubicaciones as $loop) {

                                $titulo = $loop->descripcion;
                                $padre = $loop->padre_descripcion;
                                $columnas = $loop->columnas;
                                $filas = $loop->filas;
                                $mesas = $loop->mesas;

                                $tabla = '<div class="tabla_localidad">' .
                                        '<span class="borrar_tabla">✖</span>' .
                                        '<span class="titulo_tabla">' . $titulo . '</span>' .
                                        '<table class="' . $titulo . '">' .
                                        '<tbody>';

                                for ($i = 0; $i < $filas; $i++) {
                                    $tabla.='<tr>';
                                    for ($j = 0; $j < $columnas; $j++) {
                                        $tabla.='<td class="seccion_tabla mesas_' . $mesas . '" id="' . $titulo . '-' . ($j + 1) . '-' . ($i + 1) . '">';

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
                    </form>

                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
</div>