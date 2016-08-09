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


    $total = (int) $obj->registrados + (int) $obj->no_registrados;
    $pr = $obj->registrados / $total;
    $pnr = $obj->no_registrados / $total;
    echo "var r" . $anios . "=" . $obj->registrados . ";";
    echo "var nr" . $anios . "=" . $obj->no_registrados. ";";
    echo "var pr" . $anios . "=" . number_format((float) $pr * 100, 2, '.', '') . ";";
    echo "var pnr" . $anios . "=" . number_format((float) $pnr * 100, 2, '.', '') . ";";
    }else{
        echo "var r" . $anios . "=0;"; 
        echo "var nr" . $anios . "=0;";
        echo "var pr" . $anios . "=0;"; 
        echo "var pnr" . $anios . "=0;"; 
    }
    
}

foreach ($categorias as $loop) {
datosGrafica($loop->anios);
}

?>

</script>
<div id="wrapper_nsidebar">
    <div class="row">
        <div id="container-full-width">
                <div class="col-md-12">
                    <div id="toolbar" style="margin-top:20px;">
                        <h2 style="margin:0;">Gráficas de Asistencia</h2>
                    </div>
                    <br/>
                    <div class="col-md-12">
                        <?php foreach($categorias as $loop){ ?>
                        <div class="col-md-4">
                            <div class="panel  panel-default">
                                <div class="panel-heading">
                                    <span class="glyphicon glyphicon-signal" aria-hidden="true"></span> <?php echo $loop->titulo;?>  
                                    <div class="pull-right">
                                        <div class="btn-group">

                                        </div>
                                    </div>    
                                </div>
                                <div class="panel-body graph" id="<?php echo $loop->anios;?>_category">
                                </div>
                                <div id="total_letras_<?php echo $loop->anios;?>"></div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                 
     
                    
                </div>
        </div>

    </div>
</div>
</div>
