<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<div id="<?php echo $id;?>" style="float: left; height:300px; width:350px;"></div>
<script class="code" type="text/javascript">
      $(document).ready(function(){
      var data = [<?php echo $data; ?>];
      var plot1 = jQuery.jqplot('<?php echo $id;?>', [data], 
        { 
          title: '<?php echo $title; ?>',
          seriesDefaults: {
            // Make this a pie chart.
            renderer: jQuery.jqplot.PieRenderer,
            rendererOptions: {
              // Put data labels on the pie slices.
              // By default, labels show the percentage of the slice.
              showDataLabels: true
            }
          }, 
          legend: { show:true, location:'e' }
        }
      );
    });
</script>