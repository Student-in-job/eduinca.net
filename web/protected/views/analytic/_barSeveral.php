<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<span id='info3'></span>
<div id="<?php echo $id;?>" style="margin-top:20px; margin-left:20px; width:300px; height:300px;"></div>
<?php
    $temp = '';
    if (is_array($data)){
        foreach($data as $item){
            $temp = $item . ',';
        }
    }
    else{
        $temp = $data;
    }
?>
<script>
$(document).ready(function(){
        plot3 = $.jqplot('<?php echo $id;?>', [<?php echo $temp;?>], {
            stackSeries: true,
            captureRightClick: true,
            title: '<?php echo Yii::t('analytic', $title);?>',
            seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
                rendererOptions: {
                    highlightMouseDown: true   
                },
                pointLabels: {show: true}
            },
            series:[<?php echo $series;?>],
            
            axes: {
                xaxis: {
                    min: 6,      // minimum numerical value of the axis.  Determined automatically.
                    max: 0,
                    ticks: ['6','5','4','3','2','1','0'],
                    //renderer: $.jqplot.CategoryAxisRenderer
                },
                yaxis: {
                  // Don't pad out the bottom of the data range.  By default,
                  // axes scaled as if data extended 10% above and below the
                  // actual range to prevent data points right on grid boundaries.
                  // Don't want to do that here.
                  padMin: 0,
                }
            },
            legend: {
                show: true,
                location: 'e',
                placement: 'outside'
            }     
        });
     
        $('#<?php echo $id;?>').bind('jqplotDataClick', 
            function (ev, seriesIndex, pointIndex, data) {
              $('#info3').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
            }
        ); 
    });
</script>