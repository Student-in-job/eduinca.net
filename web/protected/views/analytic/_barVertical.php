<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
    $h = (isset($height))?$height:350;
    $w = (isset($width))?$width:420;
    $bWidth = (isset($barWidth))?$barWidth:0;
    if ($bWidth!=0)
        $bWidth = 'barWidth:' . $bWidth;
    else
        $bWidth = '';
    echo '<div id="' . $id . '" style="float: left; height:' . $h . 'px; width:' . $w . 'px;"></div>';
?>
<script class="code" type="text/javascript">
    $(document).ready(function(){
        var data = [<?php echo $data; ?>];
        var plot1 = $.jqplot('<?php echo $id;?>', data, 
            { 
                title: '<?php echo $title; ?>',
                seriesDefaults: {
                    renderer: $.jqplot.BarRenderer,
                    rendererOptions:{<?php echo $bWidth;?>},
                    pointLabels: {show: true}
                },
                legend: {
                    show:true,
                    location:'e',
                    labels: [<?php echo $label;?>]
                },
                axes: {
                    xaxis: {
                        renderer: $.jqplot.CategoryAxisRenderer,
                        autoscale: true,
                        min:0,
                        max:6,
                        ticks:[<?php echo $xAxesLegend;?>],
                    },
                    yaxis: {
                        // Don't pad out the bottom of the data range.  By default,
                        // axes scaled as if data extended 10% above and below the
                        // actual range to prevent data points right on grid boundaries.
                        // Don't want to do that here.
                        padMin: 0,
                        min:0,
                        max:100,
                        tickInterval:10
                    }
                }
            }
        );
    });
</script>