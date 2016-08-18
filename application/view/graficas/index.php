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
                    <div class="row">
                        <div class="col-sm-2 text-center"><h4>Registrados</h4><h2><?php echo $todos->registrados;?></h2></div>
                    <div class="col-sm-2 text-center"><h4>No Registrados</h4><h2><?php echo $todos->no_registrados;?></h2></div>
                    <div class="col-sm-2 text-center"><h4>Confirmados</h4><h2><?php echo $todos->confirmados;?></h2></div>
                    <div class="col-sm-2 text-center"><h4>No Confirmados</h4><h2><?php echo $todos->no_confirmados;?></h2></div>
                    <div class="col-sm-2 text-center"><h4>Confirmados Asistidos</h4><h2><?php echo $todos->confirmados_asistidos;?></h2></div>
                    <div class="col-sm-2 text-center"><h4>Confirmados No Asistidos</h4><h2><?php echo $todos->confirmados_no_asistidos;?></h2></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 text-center"><h4>Homenajeados Confirmados</h4><h2><?php echo $todos->homenajeados_confirmados;?></h2></div>
                        <div class="col-sm-2 text-center"><h4>Homenajeados Confirmados Asistidos</h4><h2><?php echo $todos->homenajeados_confirmados_asistidos;?></h2></div>
                        <div class="col-sm-2 text-center"><h4>Homenajeados Confirmados Ausentes</h4><h2><?php echo $todos->homenajeados_confirmados_no_asistidos;?></h2></div>
                        <div class="col-sm-2 text-center"><h4>Homenajeados No Confirmados Asistidos</h4><h2><?php echo $todos->homenajeados_no_confirmados_asistidos;?></h2></div>
                        <div class="col-sm-2 text-center"><h4>Columnistas Asistidos</h4><h2><?php echo $todos->columnistas;?></h2></div>
                        <div class="col-sm-2 text-center"><h4>VIP Asistidos</h4><h2><?php echo $todos->vip;?></h2></div>
                    </div>
                    <div class="col-md-12" style="margin-top:40px;">
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
