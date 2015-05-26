<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Chart extends CWidget{
    
    public $data;
    public $xAxes;
    public $legend;
    public $title;
    public $colors;
    public $name = 'draw';
    public $width = 650;
    public $height = 400;
    public $rotation = 0;
    public $margin_left = 50;
    public $margin_right = 50;
    public $margin_top = 30;
    public $margin_bottom = 30;
    public $legend_left = 0;
    public $legend_top = 0;
    public $axisName = '%';
    
    protected function InitPallete()
    {
        return array(
                    "0"=>array("R"=>0,"G"=>255,"B"=>255,"Alpha"=>100), 
                    "1"=>array("R"=>0,"G"=>255,"B"=>0,"Alpha"=>100), 
                    "2"=>array("R"=>255,"G"=>255,"B"=>0,"Alpha"=>100), 
                    "3"=>array("R"=>0,"G"=>0,"B"=>255,"Alpha"=>100), 
                    "4"=>array("R"=>255,"G"=>0,"B"=>255,"Alpha"=>100), 
                    "5"=>array("R"=>255,"G"=>0,"B"=>0,"Alpha"=>100), 
                    "6"=>array("R"=>31,"G"=>108,"B"=>141,"Alpha"=>100), 
                    "7"=>array("R"=>19,"G"=>221,"B"=>144,"Alpha"=>100),
                    "8"=>array("R"=>54,"G"=>189,"B"=>13,"Alpha"=>100),
                    "9"=>array("R"=>199,"G"=>190,"B"=>17,"Alpha"=>100),
                    "10"=>array("R"=>183,"G"=>36,"B"=>19,"Alpha"=>100),
                    "11"=>array("R"=>126,"G"=>226,"B"=>224,"Alpha"=>100),
                    "12"=>array("R"=>57,"G"=>109,"B"=>183,"Alpha"=>100),
                    "13"=>array("R"=>135,"G"=>135,"B"=>135,"Alpha"=>100),
                    "14"=>array("R"=>233,"G"=>171,"B"=>105,"Alpha"=>100),
                    "15"=>array("R"=>209,"G"=>99,"B"=>231,"Alpha"=>100),
        );
    }
    
    protected function ReturnPallete()
    {
        $colors = $this->InitPallete();
        $pallete = array();
        foreach($this->colors as $color)
        {
            array_push($pallete, $colors[$color]);
        }
        return $pallete;
    }
    
    protected function GetLegend($serie)
    {
        if(isset($this->legend[$serie]))
        {
            return $this->legend[$serie];
        }
        else
        {
            return $serie;
        }
    }
}