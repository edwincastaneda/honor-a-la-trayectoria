<style>
    .search input[type="text"] {
        width:600px;
    }
</style>
<script>
    window.onload = function () {
        $('.search input[type="text"]').focus();
    }
    var url = "<?php echo URL; ?>";

    function actionFormatter(value, row, index) {
        return [
            '<a class="registrar" href="javascript:void(0)" title="Registrar">',
            '<h4><span class="label label-success"><i class="glyphicon glyphicon-ok"></i></label></h4>',
            '</a>'
        ].join('');
    }
    
        function nameFormatter(value, row) {
        var icon = value == '1' ? 'glyphicon-ok text-success' : 'glyphicon-remove text-danger' 
        return '<i class="glyphicon ' + icon + '"></i> ';
    }

    window.actionEvents = {
        'click .registrar': function (e, value, row, index) {
            window.open("<?php echo URL; ?>checkin/registrar/" + row.codigoBarras, "_self")
        }
    };


</script>

<div id="wrapper_nsidebar">
    <div class="row">
        <div id="container-full-width">
            <div class="col-md-12">
                <div id="toolbar">
                    <h2 style="margin:0;">Check-In de Invitados</h2>
                </div>
                <div class="table-responsive">
                    <div class="col-md-12"></div>
                    <table id="table"
                           data-toggle="table"
                           data-striped="true"
                           data-search="true"
                           data-sortable="true"
                           data-pagination="true"
                           data-page-size="100"
                           data-search-align="left"
                           data-show-columns="true"
                           data-url="<?php echo URL; ?>checkin/json"
                           data-page-list="[10, 25, 50, 100, All]"
                           >
                        <thead>
                            <tr>
                                <th data-field="nombresApellidos" data-sortable="true">Nombres</th>
                                <th data-field="codigoBarras" data-sortable="true">Codigo Barras</th>
                                <th data-field="empresa" data-sortable="true">Empresa</th>
                                <th data-field="departamento" data-sortable="true">Departamento</th>
                                <th data-field="puesto" data-sortable="true">Puesto</th>
                                <th data-halign="center" data-align="center"data-field="asistencia" data-sortable="true" data-visible="false" data-formatter="nameFormatter">Asistencia</th>
                                <th data-halign="center" data-align="center" data-field="numPersonas" data-sortable="true">(#)Personas</th>
                                <th data-halign="center" data-align="center" data-field="action" data-formatter="actionFormatter" data-events="actionEvents">Registrar</th>
                            </tr>
                        </thead>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>
</div>
