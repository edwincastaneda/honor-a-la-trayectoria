<link href="<?php echo URL; ?>css/morris.css" rel="stylesheet">
<script src="<?php echo URL; ?>js/raphael-min.js"></script>
<script src="<?php echo URL; ?>js/morris.js"></script>
<script>
$(function () {
  
  <?php 
  
  function imprimeGraficador($anios){
       $jvsp="Morris.Donut({
                element: '".$anios."anos',
                data: [
                  {value: nr".$anios.", label: 'No Registrados', formatted: pnr".$anios."+'%' },
                  {value: r".$anios.", label: 'Registrados', formatted: pr".$anios."+'%' }

                ],
                colors: ['red', 'yellowgreen'],
                formatter: function (x, data) { return data.formatted; }
              });";   
       echo $jvsp;
  }
  
  imprimeGraficador(5);
  imprimeGraficador(10);
  imprimeGraficador(15);
  imprimeGraficador(20);
  imprimeGraficador(25);
  imprimeGraficador(30);
  imprimeGraficador(35);
  imprimeGraficador(0);
?>

});

</script>


