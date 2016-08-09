<link href="<?php echo URL; ?>css/morris.css" rel="stylesheet">
<script src="<?php echo URL; ?>js/raphael-min.js"></script>
<script src="<?php echo URL; ?>js/morris.js"></script>
<script>
$(function () {
  
  <?php 
  
  function imprimeGraficador($anios){
       $jvsp="Morris.Donut({
                element: '".$anios."_category',
                data: [
                  {value: nr".$anios.", label: 'No Registrados', formatted: pnr".$anios."+'% ('+nr".$anios."+')' },
                  {value: r".$anios.", label: 'Registrados', formatted: pr".$anios."+'% ('+r".$anios."+')'  }

                ],
                colors: ['red', 'yellowgreen'],
                formatter: function (x, data) { return data.formatted; }
              });";   
       echo $jvsp;
  }
  
  
 foreach ($categorias as $loop) {
imprimeGraficador($loop->anios);
}

?>

});

</script>


