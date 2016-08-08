<style>
    .search input[type="text"] {
        width:600px;
    }
</style>
<script>
    window.onload = function () {
        
        <?php if (isset($_GET['c'])) { ?>
        $('#confirmacion').modal('show');
        <?php }else{?>
           $('.search input[type="text"]').focus(); 
        <?php }?>
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
            <?php if (isset($_GET['c'])) { ?>
                <div class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" id="confirmacion">
                    <div class="modal-dialog modal-">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><span class="glyphicon glyphicon-ok text-success" aria-hidden="true"></span> REALIZADO!</h4>
                            </div>
                            <div class="modal-body row" style="font-size:1.8em;">
                                <div class="col-sm-12">
                                <span class="glyphicon glyphicon-user text-primary" aria-hidden="true"></span> <?php if(isset($asignacionMesas->nombresApellidos)){echo $asignacionMesas->nombresApellidos;}?><br>
                                </div>
                                <div class="col-sm-12">
                                <span class="glyphicon glyphicon-barcode text-primary" aria-hidden="true"></span> <?php if(isset($asignacionMesas->nombresApellidos)){echo $asignacionMesas->codigoBarras;}?>
                                </div>
                                <div class="col-sm-6">
                                <span class="text-primary">Personas: </span> <?php if(isset($asignacionMesas->nombresApellidos)){echo $asignacionMesas->numPersonas;}?>
                                </div>
                                <div class="col-sm-6">
                                <span class="text-primary">Mesa: </span> <?php if(isset($asignacionMesas->mesa)){echo $asignacionMesas->mesa;}?>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="<?php echo URL; ?>checkin" class="btn btn-success" id="finalizar">Finalizar</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
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
                                <th data-halign="center" data-align="center" data-field="anios" data-sortable="true">(#)Años</th>
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
