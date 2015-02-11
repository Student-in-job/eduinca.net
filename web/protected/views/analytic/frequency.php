<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



?>

<script class="include" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/jquery.jqplot.js"></script>
<script class="include" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/plugins/jqplot.barRenderer.js"></script>
<script class="include" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/plugins/jqplot.pointLabels.js"></script>

<span id='info3'></span>
<div id="bar-chart" style="margin-top:20px; margin-left:20px; width:600px; height:300px;"></div>
<!--
<script>
$(document).ready(function(){
        var s1 = [2, 6, 7, 10, 1];
        var s2 = [7, 5, 3, 2, 12];
        var s3 = [14, 9, 3, 8, 3];
        var data = [s1, s2, s3]
        plot3 = $.jqplot('bar-chart', data, {
            stackSeries: true,
            captureRightClick: true,
            seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
                rendererOptions: {
                    groups: 2,
                    highlightMouseDown: true   
                },
                pointLabels: {show: true}
            },
            series:[
                {label:'Hotel'},
                {label:'Event Regristration'},
                {label:'Airfare'}
            ],
            /*
            axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer
                },
                yaxis: {
                  // Don't pad out the bottom of the data range.  By default,
                  // axes scaled as if data extended 10% above and below the
                  // actual range to prevent data points right on grid boundaries.
                  // Don't want to do that here.
                  padMin: 0
                }
            },*/
            legend: {
                show: true,
                location: 'e',
                placement: 'outside'
            }     
        });
     
        $('#bar-chart').bind('jqplotDataClick', 
            function (ev, seriesIndex, pointIndex, data) {
              $('#info3').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
            }
        ); 
    });
</script>
-->
<?php var_dump($dataTeacher);?>