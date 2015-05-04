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
<?php
echo '<div id="' . $this->id . '" style="float: left; height:' . $this->height . 'px; width:' . $this->width . 'px;"></div>';
?>
<script class="code" type="text/javascript">
    $(document).ready(function(){
        var data = <?php echo $this->getData(); ?>;
        var plot1 = $.jqplot('<?php echo $this->id;?>', data, 
            { 
                title: '<?php //echo $title; ?>',
                seriesDefaults: {
                    renderer: $.jqplot.BarRenderer,
                    rendererOptions:{<?php echo $this->getBarWidth();?>},
                    pointLabels: {show: true}
                },
                legend: {
                    show:true,
                    location:'e',
                    <?php echo $this->getLabel();?>
                },
                axes: {
                    xaxis: {
                        renderer: $.jqplot.CategoryAxisRenderer,
                        autoscale: true,
                        min:0,
                        max:6,
                        <?php echo $this->getxAxes();?>,
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