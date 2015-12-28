<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once Yii::app()->basePath . '/extensions/widgets/charts/Chart.php';

class BarChart extends Chart
{
    protected $_direction = DIRECTION_VERTICAL;
    protected $_prefix = 'BarChart';

    protected function DrawLegend()
    {
        /* Write the chart legend */ 
        $this->_picture->drawLegend($this->legend_left,$this->legend_top,array("Style"=>LEGEND_BOX,"Mode"=>LEGEND_VERTICAL)); 
    }
    
    protected function DrawChart() {
        /* Draw the chart */ 
        $settings = array(
                "Gradient"=>TRUE,
                "DisplayPos"=>LABEL_POS_INSIDE,
                "DisplayValues"=>TRUE,
                "DisplayR"=>0,
                "DisplayG"=>0,
                "DisplayB"=>0,
                "DisplayShadow"=>TRUE,
                "Surrounding"=>10
        );
        $this->_picture->drawBarChart($settings); 
    }
}
