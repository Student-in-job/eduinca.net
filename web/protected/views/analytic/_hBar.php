<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<div id="<?php echo $id; ?>"></div>
<script>
$(document).ready(function(){
        var data = [<?php echo $data; ?>];
        $.jqplot('<?php echo $id; ?>', data, {
            title: '<?php echo $title; ?>',
            animate : true,
            animateReplot : true,
            seriesDefaults: {
                renderer:$.jqplot.BarRenderer,
				pointLabels: { show: true, formatString: '%d', location: 'e', edgeTolerance: -15 },
                shadowAngle: 135,
                rendererOptions: {
                    barDirection: 'horizontal'
                }
            },
            axes: {
                xaxis:{
                  label:'',
                },                
                yaxis: {
                    label:'',
                    renderer: $.jqplot.CategoryAxisRenderer,
                },
            },
            legend: { 
                show:true,
                placement: "outsideGrid",
                location: 'e',
                labels: ["Участвовали", "Не участвовали"],
            }
        });
    });
</script>