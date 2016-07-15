    <style>
        body{
            background:#000;
        }
        a.opcion_menu:active,a.opcion_menu:visited,a.opcion_menu:link
        {
            font-family: fantasy;
            text-decoration: none;
            color: #7C5A2D;
        }
        a{
            text-decoration: none;
        }
        .opcion_menu
        {
          margin:10px auto;
          display:block;
          width: 110px;
          height: 120px;
          border: 1px solid #000;
          text-align: center ; 
              border-radius:5px 5px 5px 5px;
              float:left;
              background: #F2E5B0;
              margin-left: 10px;
              padding-top: 10px;
            
        }
        .opcion_menu:hover
        {
        background: #eee;
        font-weight: bold;
       color:#7C5A2D;
              
              
            
        }
        .opcion_menu img:hover{
            width: 90px;
        }
        .contentPrincipal{
           margin:0 auto;border: 2px solid #E5D4A2;width: 900px; height: 427px;background: #eee ;
               border-radius:5px 5px 5px 5px;
               background: url(img/fondo.png);
                   
            
        }
        .menu{
         background: #000;   
         width: 500px;
         float:right;
         margin-top: 335px;
             border-radius:5px 5px 5px 5px;
             border:2px solid #E5D4A2;
         margin-right: 55px;
          position: absolute;
         z-index: 2;
         left: 470px;
        }
          .menu2{
              position: absolute;
                z-index: 1;
         background: #000;   
         width: 880px;
         float:right;
         margin-top: 408px;
             border-radius:5px 5px 5px 5px;
             height: 15px;
         
        }
        
    </style>

<div id="wrapper_nsidebar">
    <div class="row">
        <div id="container-full-width">
            <div class="col-md-12">
                    <div style="width: 100%">
                <div class="contentPrincipal">
                    <div class="menu2"></div>
                    <div class="menu">
                    <a href="../../HonorTrayectoria/asignacionMesas.php"  class="opcion_menu" target="_blank">
                        Mesas
                          <img src="img/ipad.png" width="80px">
                    </a>

                        <a href="../../HonorTrayectoria/index.php" class="opcion_menu" target="_blank">
                        Conductores
                        <img src="img/ipad.png" width="80px">
                    </a>

                    <a href="../../HonorTrayectoria/flowplayer/index.html"class="opcion_menu" target="_blank">
                        Video
                        <img src="img/video.png" width="70px">
                    </a>
                         <a href="../../HonorTrayectoria/grafica.php"class="opcion_menu" target="_blank">
                        Graficas
                        <img src="img/laptop.png" width="75px">

                    </a>
                    </div>

                </div>
            </div>

            
    </div>
</div>
</div>
