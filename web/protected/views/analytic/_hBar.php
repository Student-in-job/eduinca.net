<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<div id="hbar-chart"></div>
<script>
$(document).ready(function(){
        var data = [<?php echo $data; ?>];
        $.jqplot('hbar-chart', data, {
            seriesDefaults: {
                renderer:$.jqplot.BarRenderer,
                pointLabels: { show: true, location: 'e', edgeTolerance: -15 },
                shadowAngle: 135,
                rendererOptions: {
                    barDirection: 'horizontal'
                }
            },
            axes: {
                yaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer
                }
            },
            legend: { 
                show:true,
            }
        });
    });
</script>