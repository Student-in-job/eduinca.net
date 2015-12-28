<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once Yii::app()->basePath . '/extensions/widgets/charts/Chart.php';

class PieChart extends Chart
{
    protected $_direction = DIRECTION_HORIZONTAL;
    protected $_prefix = 'PieChart';
    protected $_chart;


    protected function DrawScale() {}
    
    protected function DrawLegend() {
        $this->_chart->drawPieLegend($this->legend_left,$this->legend_top, array("Alpha"=>20));
    }
    
    protected function DrawChart() {
        $this->_chart = new pPie($this->_picture, $this->_data); 

        /* Draw an AA pie chart */  
        $this->_chart->draw2DPie($this->margin_left, $this->height/2 + $this->margin_top/4  ,array("DrawLabels"=>FALSE,"LabelStacked"=>TRUE,"Border"=>TRUE, "ValuePosition"=>PIE_VALUE_INSIDE,"Radius"=>120, "WriteValues" => PIE_VALUE_NATURAL, "LabelColor" => PIE_LABEL_COLOR_AUTO, 'ValueR'=>0, 'ValueG'=>0, 'ValueB' =>0)); 

        /* Write the legend box */  
        $this->_picture->setShadow(FALSE); 
    }
}