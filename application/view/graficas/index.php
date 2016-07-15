<style>
    .graph {
        width: 380px;
        height: 210px;
        margin: 20px auto 0 auto;
    }
</style>
<script>
<?php

function datosGrafica($anios) {
    $url = URL . 'graficas/json/' . $anios;
    $json = file_get_contents($url);
    $obj = json_decode($json);
    
    if($obj->registrados!="0" && $obj->no_registrados!="0"){
    echo "var r" . $anios . "=" . $obj->registrados . ";";
    echo "var nr" . $anios . "=" . $obj->no_registrados . ";";

    $total = (int) $obj->registrados + (int) $obj->no_registrados;
    $pr = $obj->registrados / $total;
    $pnr = $obj->no_registrados / $total;

    echo "var pr" . $anios . "=" . number_format((float) $pr * 100, 2, '.', '') . ";";
    echo "var pnr" . $anios . "=" . number_format((float) $pnr * 100, 2, '.', '') . ";";
    }else{
        echo "var r" . $anios . "=0;"; 
        echo "var nr" . $anios . "=0;";
        echo "var pr" . $anios . "=0;"; 
        echo "var pnr" . $anios . "=0;"; 
    }
    
}

datosGrafica(5);
datosGrafica(10);
datosGrafica(15);
datosGrafica(20);
datosGrafica(25);
datosGrafica(30);
datosGrafica(35);
datosGrafica(0);
?>

</script>
<div id="wrapper_nsidebar">
    <div class="row">
        <div id="container-full-width">
                <div class="col-md-12">
                    <div id="toolbar" style="margin-top:20px;">
                        <h2 style="margin:0;">Graficas de Asistencia</h2>
                    </div>
                    <br/>
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <div class="panel  panel-default">
                                <div class="panel-heading">
                                    <span class="glyphicon glyphicon-signal" aria-hidden="true"></span> 5AÑOS  
                                    <div class="pull-right">
                                        <div class="btn-group">

                                        </div>
                                    </div>    
                                </div>
                                <div class="panel-body graph" id="5anos">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel  panel-default">
                                <div class="panel-heading">
                                    <span class="glyphicon glyphicon-signal" aria-hidden="true"></span> 10 AÑOS  
                                    <div class="pull-right">
                                        <div class="btn-group">

                                        </div>
                                    </div>    
                                </div>
                                <div class="panel-body graph" id="10anos">
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="panel  panel-default">
                                <div class="panel-heading">
                                    <span class="glyphicon glyphicon-signal" aria-hidden="true"></span> 15 AÑOS 
                                    <div class="pull-right">
                                        <div class="btn-group">

                                        </div>
                                    </div>    
                                </div>
                                <div class="panel-body graph" id="15anos">
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <div class="panel  panel-default">
                                <div class="panel-heading">
                                    <span class="glyphicon glyphicon-signal" aria-hidden="true"></span> 20 AÑOS
                                    <div class="pull-right">
                                        <div class="btn-group">

                                        </div>
                                    </div>    
                                </div>
                                <div class="panel-body graph" id="20anos">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel  panel-default">
                                <div class="panel-heading">
                                    <span class="glyphicon glyphicon-signal" aria-hidden="true"></span> 25 AÑOS 
                                    <div class="pull-right">
                                        <div class="btn-group">

                                        </div>
                                    </div>    
                                </div>
                                <div class="panel-body graph" id="25anos">
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="panel  panel-default">
                                <div class="panel-heading">
                                    <span class="glyphicon glyphicon-signal" aria-hidden="true"></span> 30 AÑOS 
                                    <div class="pull-right">
                                        <div class="btn-group">

                                        </div>
                                    </div>    
                                </div>
                                <div class="panel-body graph" id="30anos">
                                </div>
                            </div>

                        </div>
                    </div> 
                    
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="panel  panel-default">
                                <div class="panel-heading">
                                    <span class="glyphicon glyphicon-signal" aria-hidden="true"></span> 35 AÑOS
                                    <div class="pull-right">
                                        <div class="btn-group">

                                        </div>
                                    </div>    
                                </div>
                                <div class="panel-body graph" id="35anos">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel  panel-default">
                                <div class="panel-heading">
                                    <span class="glyphicon glyphicon-signal" aria-hidden="true"></span> SIN CATEGORIA
                                    <div class="pull-right">
                                        <div class="btn-group">

                                        </div>
                                    </div>    
                                </div>
                                <div class="panel-body graph" id="0anos">
                                </div>
                            </div>

                        </div>
                    </div> 
                    
                    
                </div>
        </div>

    </div>
</div>
</div>
