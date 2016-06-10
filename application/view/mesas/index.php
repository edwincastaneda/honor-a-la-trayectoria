
<script>
    var arrayMesas = new Array();
<?php
$i = 0;
$move = "";
foreach ($ubicaciones as $ubicacion) {
    $descripcion = $ubicacion->descripcion;
    $padre = $ubicacion->padre_descripcion;
    $columnas = $ubicacion->columnas;
    $filas = $ubicacion->filas;
    $mesas = $ubicacion->mesas;
    $p_columna = $ubicacion->padre_columna;
    $p_fila = $ubicacion->padre_fila;

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
<?php
?>
<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <div class="panel panel-default"> 
            <div class="panel-heading" role="tab" id="collapseListGroupHeading1"> 
                <h4 class="panel-title"> 
                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapseListGroup1" aria-expanded="false" aria-controls="collapseListGroup1"> Asignación Manual </a> 
                </h4> 
            </div> 
            <div id="collapseListGroup1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading1"> 
                <ul class="list-group"> 
                    <li class="list-group-item silla">
                        <a tabindex="0" class="invitados"  role="button" data-html="true" data-toggle="popover" data-trigger="focus" title="Nombre Apellido" data-content="<div><b>AÑOS:</b> 5</br><b>DEPARATAMENTO:</b> Informatica</div>" data-placement="top" data-container="body">NA</a>
                        <a tabindex="0" class="invitados"  role="button" data-html="true" data-toggle="popover" data-trigger="focus" title="Nombre Apellido" data-content="<div><b>AÑOS:</b> 5</br><b>DEPARATAMENTO:</b> Informatica</div>" data-placement="top" data-container="body">NA</a>
                    </li>
                </ul>
            </div>
        </div>

        <form id="formulario_mesa" class="col-lg-12">
            <div class="form-group">
                <label for="no_sillas">Sillas*</label>
                <input type="number" min="1" max="12" class="form-control" id="no_sillas"value="8" required="required">
            </div>
            <div class="form-group">
                <label for="no_mesa">Numero de Mesa*</label>
                <input type="number" min="1" max="999" class="form-control" id="no_mesa" value="0" required="required">
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" id="media_luna"> Media Luna
                </label>
            </div>
        </form>

        <div id="generador_sillas"></div>

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

                    <!--<div class="well col-md-4 secciones_mesas">
<?php //echo dibujaMesa(10, 1, 1)  ?>
                        
                        
                    </div>-->
                    <div id="mapa_localidades" class="row">

<?php
foreach ($ubicaciones as $ubicacion) {

    $titulo = $ubicacion->descripcion;
    $padre = $ubicacion->padre_descripcion;
    $columnas = $ubicacion->columnas;
    $filas = $ubicacion->filas;
    $mesas = $ubicacion->mesas;


    if ($mesas > 0) {
        $tabla = '<div class="tabla_localidad con_mesa" id="' . $titulo . '-' . $columnas . '-' . $filas . '" data-toggle="tooltip" data-placement="top" title="' . $titulo . '">';
    } else {
        $tabla = '<div class="tabla_localidad">';
    }
    $tabla.= '<table class="' . $titulo . '">' .
            '<tbody>';

    for ($i = 0; $i < $filas; $i++) {
        $tabla.='<tr>';
        for ($j = 0; $j < $columnas; $j++) {
            $tabla.='<td class="secciones_mesas asigna_mesas_' . $mesas . '" id="' . $titulo . '-' . ($j + 1) . '-' . ($i + 1) . '">';

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