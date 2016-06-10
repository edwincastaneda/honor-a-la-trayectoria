<?php

function fHTML($campo) {
    if (isset($campo)) {
        echo htmlspecialchars($campo, ENT_QUOTES, 'UTF-8');
    }
}
?>
<script>

    function actionFormatter(value, row, index) {
        return [
            '<a class="edit" href="javascript:void(0)" title="Edit">',
            '<i class="glyphicon glyphicon-edit"></i>',
            '</a>',
            '<a class="remove" href="javascript:void(0)" title="Remove">',
            '<i class="glyphicon glyphicon-remove"></i>',
            '</a>'
        ].join('');
    }

    window.actionEvents = {
        'click .edit': function (e, value, row, index) {
            window.open("<?php echo URL; ?>invitados/modificar/" + row.codigo, "_self")
        },
        'click .remove': function (e, value, row, index) {
            window.open("<?php echo URL; ?>invitados/eliminar/" + row.codigo, "_self")
        }
    };
</script>
<div class="container-fluid">
    <div class="row">
        <div class="container">
            <h2>Invitados</h2>
            <?php
            if (isset($_GET['m'])) {
                switch ($_GET['m']) {
                    case 1:
                        ?>
                        Invitado Agregado
                        <?php
                        break;
                    case 2:
                        ?>
                        Invitado Borrado
                        <?php
                        break;
                    case 3:
                        ?>
                        Invitado Actualizado
                        <?php
                        break;
                }
            }
            ?>
            <div class="col-md-12">
                <h3>Agregar Invitado</h3>
                <form action="<?php echo URL; ?>invitados/agregar" method="POST">
                    <label>Codigo</label>
                    <input type="text" name="codigo" value="" required />
                    <label>Nombres y Apellidos</label>
                    <input type="text" name="nombresyapellidos" value="" required />
                    <label>Barras</label>
                    <input type="text" name="barras" value="" />
                    <input type="submit" name="submit_agregar_invitado" value="Submit" />
                </form>
            </div>
            <!-- main content output -->
            <div class="col-md-12">
                <h2 class="sub-header">Listado de Participantes</h2>
                <div class="table-responsive">
                    <table id="table"
                           data-toggle="table"
                           data-striped="true"
                           data-show-toggle="true"
                           data-show-columns="true"
                           data-search="true"
                           data-sortable="true"
                           data-pagination="true"
                           data-page-size="15"
                           data-url="<?php echo URL; ?>invitados/json"
                           data-page-list="[10, 25, 50, 100, All]"
                           >
                        <thead>
                            <tr>
                                <th data-field="codigo" data-visible="false" data-sortable="true">Codigo</th>
                                <th data-field="nombresApellidos" data-sortable="true">Nombres y Apellidos</th>
                                <th data-field="codigoBarras" data-visible="false" data-sortable="true">Barras</th>
                                <th data-field="empresa" data-sortable="true">Empresa</th>
                                <th data-field="departamento" data-sortable="true">Departamento</th>
                                <th data-field="puesto" data-visible="false" data-sortable="true">Puesto</th>
                                <th data-field="asistencia" data-sortable="true">Asistencia</th>
                                <th data-field="fechaIngreso" data-visible="false" data-sortable="true">Ingreso</th>
                                <th data-field="anios" data-sortable="true">(#)Años</th>
                                <th data-field="numPersonas" data-sortable="true">(#)Personas</th>
                                <th data-field="confirmacion" data-sortable="true">Confirmacion</th>
                                <th data-field="entregaPin" data-visible="false" data-sortable="true">Entrega Pin</th>
                                <th data-field="entregadorPin" data-visible="false" data-sortable="true">Entregador Pin</th>
                                <th data-field="entregadorPuesto" data-visible="false" data-sortable="true">Entregador Puesto</th>
                                <th data-field="action" data-formatter="actionFormatter" data-events="actionEvents">Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>