<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo URL; ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Principal</a>  <!--<a class="navbar-brand">Prensa Libre</a>-->
            <a id="alert_auto_guardado"  class="navbar-brand" style="display:none;margin-left:30px;color:#fff;font-size: 1em;"><span style="color:yellowgreen;" class="glyphicon glyphicon-ok" aria-hidden="true"></span> <strong>Auto-Guardado!</strong> Los cambios han sido actualizados</a>
       <a id="alert_auto_guardado2"  class="navbar-brand" style="display:none;margin-left:30px;color:#fff;font-size: 1em;"><span style="color:magenta;" class="glyphicon glyphicon-phone" aria-hidden="true"></span> Se actualizó la pantalla del programa.</a>
       
        
            
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a style="color:yellow;font-weight: bold;" href="<?php echo URL; ?>checkin"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Check-In</a></li>
                <li><a style="color:yellowgreen;font-weight: bold;" href="<?php echo URL; ?>graficas"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span> Gráficas</a></li>
                <li><a style="color: magenta;font-weight: bold;" href="<?php echo URL; ?>programa" target="_blank"><span class="glyphicon glyphicon-phone" aria-hidden="true"></span> Programa</a></li>
                <li><a style="color: tomato;font-weight: bold;" href="<?php echo URL; ?>ipads" target="_blank"><span class="glyphicon glyphicon-phone" aria-hidden="true"></span> iPads</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Configuración <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo URL; ?>invitados">Invitados</a></li>
                        <li><a href="<?php echo URL; ?>mesas">Mesas</a></li>
                        <li><a href="<?php echo URL; ?>localidades">Localidades</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a id="refrescar"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Auto-Refresh (Programa)</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>