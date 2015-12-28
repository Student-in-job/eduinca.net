<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once Yii::app()->basePath . '/extensions/widgets/charts/Chart.php';
/**
 * Description of HorizontalBarChart
 *
 * @author DEVELOPER
 */
class HorizontalBarChart extends Chart{
    
    protected $_direction = DIRECTION_HORIZONTAL;
    protected $_prefix = 'HBarChart';
    
    protected function DrawScale()
    {
        $AxisBoundaries = array(0=>array("Min"=>0,"Max"=>100));
        $this->_picture->drawScale(array(
                "Mode"=>SCALE_MODE_MANUAL,
                "ManualScale"=>$AxisBoundaries,
                "CycleBackground"=>TRUE,
                "GridR"=>0,
                "GridG"=>0,
                "GridB"=>0,
                "GridAlpha"=>10,
                "Pos"=>SCALE_POS_TOPBOTTOM
        ));
    }
    
    protected function DrawLegend()
    {
        /* Write the chart legend */ 
        $this->_picture->drawLegend($this->legend_left,$this->legend_top,array("Style"=>LEGEND_BOX,"Mode"=>LEGEND_VERTICAL)); 
    }
    
    protected function DrawChart()
    {
        if (!is_null($this->colors))
            $Palette = $this->ReturnPallete();
        else
            $Palette = null;
        /* Draw the chart */ 
        $settings = array(
                "DisplayPos"=>LABEL_POS_INSIDE,
                "DisplayValues"=>TRUE,
                "Rounded"=>TRUE,
                "Surrounding"=>30,
                "OverrideColors"=>$Palette,
                "Orientation"=>ORIENTATION_VERTICAL,
                "DisplayR"=>0,
                "DisplayG"=>0,
                "DisplayB"=>0
        );
        $this->_picture->drawBarChart($settings); 
    }
    
}
