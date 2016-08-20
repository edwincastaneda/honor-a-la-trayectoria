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

                if ($loop->anios == 200) {
                ?>
                
                <?php
                }

                if ($loop->anios == 45) {
                ?>    
                <br/><br/>
                <h1>GUION</h1>
                <h2>Llamamos al Licenciado Mario Antonio Sandoval Samayoa para hacer entrega del siguiente Pin de Honor a la Trayectoria  por cumplir 45 años
                    Ingresó en el Departamento de Anuncios en 1958</h2>
                <h2>Fue Secretaria del Consejo de Administración 1975</h2>
                <h2>Trabajó en el Departamento de Circulación en Suscripciones, y Ventas ediciones al por mayor en 1969 – 1978</h2>
                <h2>Fue Sub-gerente de Circulación 1979 – 1988</h2>
                <h2>Fue Gerente de Circulación enero 1989 – octubre 1999 </h2>
                <h2>Fue Vice-presidenta del Consejo de Administración 
                    noviembre 1999 – octubre 2001</h2>
                <h2>Se puede visualizar como una heredera del servicio humano que inspiró a su padre, en apoyar a las personas.</h2>
                <h2>El legado de su padre la llevó  a trabajar hasta alcanzar una meta en la circulación, el 6 de julio de  1992 se vendieron más de 100 mil ejemplares diarios, lo que incluía 28 mil suscripciones.</h2>
                <h2>Desarrolló Tarjeta Libre, que es un valor agregado a todos nuestros suscriptores.
                    <h2>Proyectó la idea de dar un beneficio a todo el grupo de voceadores, por lo cual, a través de  Conalfa, se creó La Escuela de Alfabetización, de Prensa Libre que fue inaugurada en 1994.   Esta escuela fue fundada por su iniciativa para que todos los  Voceadores pudieran leer y escribir, y así conozcan el contenido del periódico que ellos  venden. También, el coro de voceadores fue su iniciativa, quienes actuaban siempre en las fiestas  Navideñas, Así como varios grupos de primera comunión.</h2>

                    <h2>En el año 2004 tuvo la iniciativa de desarrollar el evento “Honor a la Trayectoria”, el cual reconoce la trayectoria de nuestros Colaboradores por quinquenios, asimismo se reconoce la trayectoria de Columnistas que escriben su columna en Prensa Libre. </h2>

                    <h2>Actualmente ocupa el cargo de Presidenta del Consejo de Administración de Prensa  Libre
                        Y es hija del Fundador Salvador Girón Collier</h2>
                    <h2>El PIN por 45 AÑOS de trayectoria es para 
                        MARÍA MERCEDES GIRON MENDOZA DE BLANK a quien pedimos de favor acercarse al escenario </h2>

                    <h2>El pin por 45 años es 1 DIAMANTE, 2 RUBI Y 1 ZAFIRO</h2>
                    <br/><br/>
                    <?php
                    }
                    if ($loop->anios == 200) {
                    ?>    
                    <br/><br/>
                    <h1>GUION</h1>
                    <h2>Dr. Eduardo Palacios Lima</h2>
                    <h2>Empresario y profesor universitario. Posee un doctorado de California Christian University, es egresado de Haggai Institute for Leadership. Sus enseñanzas se publican semanalmente en la sección de negocios de Prensa Libre y las mísmas se han transmitido en Univisión, CVC y RCN Colombia.</h2>
                    <h2>Ha impartido sus conocimientos en empresas como: Coca Cola, Avon, Honda, Mc Donalds, Sabritas Frito Lay, Colgate, Western Union, Cementos Progresos, Banco Industrial, VisaNet, Banco Internacional, Abbott, Novartis, World Vision, Pollo Campero, BID, Embajadas de EUA y Cánada, Unilever, entre otras.</h2>
                    <h2>Autor del Best Seller “Cómo hacerla en la vida”, el cual ya va en su séptima edición y es utilizado actualmente como libro de texto en cinco universidades de Centroamérica.Miles de personas, en distintos países, han mejorado extraordinariamente sus finanzas personales al poner en práctica los principios de administración del dinero que el autor nos comparte en este fabuloso Libro</h2>
                    <br/><br/>

                    <?php } 
                    
                    if ($loop->anios == 300) {
                    ?>    
                    <br/><br/>
                    <h1>GUION</h1>
                    <h2>Ing. Manuel Francisco Salguero España</h2>

                        <h2>Empresario y conferencista. Graduado de Ingeniero Civil, de la Universidad de San Carlos de Guatemala, con postgrados tales como: Postgrado de Avalúos, postgrado de Administración de Empresas, entre otros.</h2>
                        <h2>Gerente General de Estrategias Valuatorias e Inversiones  Inmobiliarias EVINSA, 1999 a la fecha.    Gerente General de PLUSVALÍA, Revista especializada en los valores de la tierra.  Julio de 2006 a la fecha.   Presidente de la Asociación de Profesionales Valuadores APROVA.</h2>
                        <h2>Con una larga trayectoria como conferencista, organizandor de distintos eventos, congresos y seminarios, en Guatemala y varios paises del continente.</h2>
                        <h2>Ha escrito varios libros entre ellos: Curso de Capitalización de la Renta, guía de Consultas Inmobiliarias, guía de elaboración de Avalúos Inmobiliario, tratado de Valuación entre otros.</h2>
                        <br/><br/>

                    <?php } ?>
                        <ul class="list-group">
                            <li class="list-group-item" style="background:<?php echo $loop->color2; ?>;border-color:<?php echo $loop->color2; ?>;">
                                <!--<img class="diamante" width="100" src="<?php echo URL; ?>img/diamante.svg"/>-->

                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="100" height="90" style="float:left">
                                <defs>
                            <filter id="colorMask<?php echo $loop->anios; ?>">
                                <feFlood flood-color="<?php
                                         if ($loop->color != "") {
                                         echo $loop->color;
                                         } else {
                                         echo "#ffffff";
                                         }
                                         ?>" result="flood" />
                                <feComposite in="SourceGraphic" in2="flood" operator="arithmetic" k1="1" k2="0" k3="0" k4="0" />
                            </filter>
                            </defs>
                            <image width="100%" height="100%" xlink:href="<?php echo URL; ?>img/<?php echo $loop->imagen; ?>" filter="url(#colorMask<?php echo $loop->anios; ?>)" />
                            </svg>


                            <div class="texto-diamante">
                                <h1><?php echo $loop->titulo; ?></h1>
                                <h3><?php echo $loop->nombrePiedra; ?></h3>
                                <h5> <?php if($loop->texto_extra!=""){echo "<u>NOTA: </u>".$loop->texto_extra;
                            } ?></h5>
                            </div>
                            </li>
                                    <?php
                                    foreach ($obj as &$valor) {
                                    ?>

                            <li class="list-group-item list-group-item" style="background: #222222; color:white; border-color:#222222;">
                                <h3 style="color:white;">Grupo <?php echo $valor->grupo; ?></h3>
                                <h4><span class="label label-success">Entrega:</span> &nbsp;<?php echo $valor->nombre; ?> <?php
                            if ($valor->puesto != "") {
                            echo "/ " . $valor->puesto;
                            }
                            ?></h4>
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
                                                                <input class="chk" type="checkbox" id="<?php echo $valor2->codigoBarras; ?>" <?php
                                                    if ($valor2->entregaPin == 1) {
                                                    echo "checked";
                                                    }
                                                    ?>><span class="checkboxtext"><?php echo $valor2->nombresApellidos; ?></span>
                                                            </label>
                                                        </div>
                                                    </li>
                        <?php
                        }
                        }
                        ?>

                                                </ul>
                        <?php
                        }
                        }
                        ?>


                        </div>
                        </div>

                        </div>
                        </div>
                        </div>
