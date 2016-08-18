<style>
    .list-group-item h1, .list-group-item h2, .list-group-item h3, .list-group-item h5{
        padding:0;
        margin:0;
    }

    .list-group-item h3{
        margin-top: 5px;
    }

    input[type=checkbox]
    {
        /* Double-sized Checkboxes */
        -ms-transform: scale(2); /* IE */
        -moz-transform: scale(2); /* FF */
        -webkit-transform: scale(2); /* Safari and Chrome */
        -o-transform: scale(2); /* Opera */
        padding: 20px;
        margin-top: 8px;
    }

    .checkboxtext{
        font-size: 20px;
        display: inline;
        margin-left:6px;
        font-weight: bold;
    }

    .diamante{
        -webkit-filter: url(#monochrome);
        filter:  url(#monochrome);
        display: inline-block;
        margin-top: -60px;
    }

    .texto-diamante{
        display: inline-block;
        margin-left:10px;

    }


    .loading{
        display:none;
    }
</style>
<div id="wrapper_nsidebar">
    <div class="row">
        <div id="container-full-width">
            <div class="col-md-12">
                <?php
                foreach ($categorias as $loop) {
                    if ($loop->anios != 0 && $loop->anios != 100) {
                        $url = URL . "programa/grupos/" . $loop->anios;
                        $json = file_get_contents($url);
                        $obj = json_decode($json);
                        ?>    

                        <ul class="list-group">
                            <li class="list-group-item" style="background:<?php echo $loop->color2;?>;border-color:<?php echo $loop->color2;?>;">
                                <!--<img class="diamante" width="100" src="<?php echo URL; ?>img/diamante.svg"/>-->
                                
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="100" height="90" style="float:left">
                                    <defs>
                                      <filter id="colorMask<?php echo $loop->anios; ?>">
                                        <feFlood flood-color="<?php if($loop->color!=""){echo $loop->color;}else{echo "#ffffff";}?>" result="flood" />
                                        <feComposite in="SourceGraphic" in2="flood" operator="arithmetic" k1="1" k2="0" k3="0" k4="0" />
                                      </filter>
                                    </defs>
                                    <image width="100%" height="100%" xlink:href="<?php echo URL; ?>img/<?php echo $loop->imagen; ?>" filter="url(#colorMask<?php echo $loop->anios; ?>)" />
                                  </svg>
                                
                                
                                <div class="texto-diamante">
                                    <h1><?php echo $loop->titulo; ?></h1>
                                    <h3><?php echo $loop->nombrePiedra; ?></h3>
                                    <h5><u>NOTA:</u> <?php echo $loop->texto_extra;?></h5>
                                </div>
                            </li>
                            <?php
                            foreach ($obj as &$valor) {
                                ?>

                                <li class="list-group-item list-group-item" style="background: #222222; color:white; border-color:#222222;">
                                    <h3 style="color:white;">Grupo <?php echo $valor->grupo; ?></h3>
                                    <h4><span class="label label-success">Entrega:</span> &nbsp;<?php echo $valor->nombre; ?> / <?php echo $valor->puesto; ?></h4>
                                </li>

                                <?php
                                $url2 = URL . "programa/homenajeados/" . $loop->anios . "/" . $valor->grupo;
                                $json2 = file_get_contents($url2);
                                $obj2 = json_decode($json2);

                                foreach ($obj2 as &$valor2) {
                                    ?>

                                    <li class="list-group-item">
                                        <div class="checkbox">
                                            <label>
                                                <input class="chk" type="checkbox" id="<?php echo $valor2->codigoBarras; ?>" <?php if($valor2->entregaPin==1){echo "checked";}?>><span class="checkboxtext"><?php echo $valor2->nombresApellidos; ?></span>
                                            </label>
                                        </div>
                                    </li>
                                    <?php
                                }
                            }
                            ?>

                        </ul>
                    <?php }
                }
                ?>


            </div>
        </div>

    </div>
</div>
</div>
