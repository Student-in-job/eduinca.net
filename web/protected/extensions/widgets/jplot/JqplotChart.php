<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class JqplotChart extends CWidget{
    public $width = 350;
    public $height = 420;
    public $caption = '';
    public $barWidth;
    public $xAxesLegend = array();
    public $labels;
    public $id = 'idChart';
    public $xMin;
    public $xMax;
    public $data = array();
    
    protected function getBarWidth()
    {
        if (isset($this->barWidth))
        {
            return 'barWidth:' . $this->barWidth;
        }
        else {
            return '';
        }
    }
    
    protected function getLabel()
    {
        $result = '';
        if (isset($this->labels))
        {
            $result = 'labels:[';
            foreach ($this->labels as $label)
            {
                $result .= '"' . $label . '",';
            }
            $result = trim($result,',');
        }
        $result .= ']';
        return $result;
    }
    
    protected function getxAxes()
    {
        $result = 'ticks:[[0,""],';
        $counter = 1;
        if (isset($this->xAxesLegend))
        {
            foreach ($this->xAxesLegend as $legend)
            {
                $result .= '[' . $counter++ . ',' . '"'. $legend . '"],';
            }
            $result .= '[' . $counter++ . ',""], [' . $counter++ . ',""]]';
        }
        return $result;
    }
    
    protected function getData()
    {
        $result = '[';
        if (isset($this->data))
        {
            
            foreach($this->data as $array){
            $result .= '[';
            foreach ($array as $key =>$value)
            {
                $result .= $value .',';
            }
            $result = trim($result, ',') . '],';}
        }
        $result = trim($result,',') .']';
        return $result;
    }
}