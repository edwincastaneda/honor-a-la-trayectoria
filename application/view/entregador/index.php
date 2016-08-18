
<div id="wrapper_nsidebar">
    <div class="row">
        <div id="container-full-width">
            <div class="col-md-12">
                <div id="toolbar" style="margin-top:20px;">
                </div>
                <br/>
                <div class="col-md-12">

                    <?php
                    foreach ($empresas as $loop) {
                        $url = URL . 'entregador/empresa/?nombre='.urlencode($loop->empresa);
                        $json = file_get_contents($url);
                        $obj = json_decode($json);
                        echo $loop->empresa."<br>";
                        foreach ($obj as &$valor) {
                             echo $valor->nombresApellidos."<br>";
                        }
                    }
                    ?>

                </div> 
            </div>
        </div>

    </div>
</div>
</div>
