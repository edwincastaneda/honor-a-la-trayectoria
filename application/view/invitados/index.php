<style>
    .search input[type="text"] {
        width:600px;
    }
</style>
<script>
    var host="<?php echo URL; ?>";

    function nameFormatter(value, row) {
        var icon = value == '1' ? 'glyphicon-ok text-success' : 'glyphicon-remove text-danger' 
        return '<i class="glyphicon ' + icon + '"></i> ';
    }
    
     window.onload = function () {
        $('.search input[type="text"]').focus();
    }
</script>
<div id="wrapper_nsidebar">
    <div class="row">
        <div id="container-full-width">
            <div class="col-md-12">

                <!-- D&D Zone-->
                <div id="drag-and-drop-zone" class="uploader">
                    <div>Drag &amp; Drop Files Here</div>
                    <div class="or">- or -</div>
                    <div class="browser">
                        <label>
                            <span>Click to open the file Browser</span>
                            <input type="file" name="files[]" multiple="multiple" title='Click to add Files'>
                        </label>
                    </div>
                </div>
                <!-- /D&D Zone -->
                <div class="alert alert-success" style="display:none;" role="alert" id="uploader-succes">
                    
                </div>
                <div id="toolbar">
                    <h2 style="margin:0;">Listado de Participantes</h2>
                </div>
                <div class="table-responsive">
                    <table id="table"
                           data-toggle="table"
                           data-striped="true"
                           data-show-toggle="true"
                           data-show-columns="true"
                           data-search="true"
                           data-sortable="true"
                           data-pagination="true"
                           data-page-size="100"
                           data-search-align="left"
                           data-url="<?php echo URL; ?>invitados/json"
                           data-page-list="[10, 25, 50, 100, All]"
                           >
                        <thead>
                            <tr>
                                <th data-field="codigo" data-visible="false" data-sortable="true">Código</th>
                                <th data-field="nombresApellidos" data-sortable="true">Nombres</th>
                                <th data-field="codigoBarras" data-sortable="true">Codigo Barras</th>
                                <th data-field="empresa" data-sortable="true">Empresa</th>
                                <th data-field="departamento" data-sortable="true" data-visible="false">Departamento</th>
                                <th data-field="puesto" data-sortable="true">Puesto</th>
                                <th data-halign="center" data-align="center"data-field="asistencia" data-sortable="true" data-formatter="nameFormatter">Asistencia</th>
                                <th data-halign="center" data-align="center" data-field="fechaIngreso" data-visible="false" data-sortable="true">Ingreso</th>
                                <th data-halign="center" data-align="center" data-field="anios" data-sortable="true" data-visible="false">(#)Años</th>
                                <th data-halign="center" data-align="center" data-field="numPersonas" data-sortable="true">(#)Personas</th>
                                <th data-halign="center" data-align="center" data-field="confirmacion" data-sortable="true" data-visible="false">Confirmación</th>
                                <th data-field="entregaPin" data-visible="false" data-sortable="true">Entrega Pin</th>
                                <th data-field="entregadorPin" data-visible="false" data-sortable="true">Entregador Pin</th>
                                <th data-field="entregadorPuesto" data-visible="false" data-sortable="true">Entregador Puesto</th>
                               <!-- <th data-halign="center" data-align="center" data-field="action" data-formatter="actionFormatter" data-events="actionEvents">Acciones</th>-->
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>