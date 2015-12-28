<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'pChart/class/pData.class.php';
require_once 'pChart/class/pDraw.class.php';
require_once 'pChart/class/pImage.class.php';
require_once 'pChart/class/pPie.class.php';

class Chart extends CWidget{
    
    protected $_data;
    protected $_picture;
    protected $_direction;
    protected $_prefix;
    protected $_filename;
    
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
    public $axisName = '';
    public $chartNum = 1;
    public $additionalLegendData;
    public $additionalColors;
        
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
    
    protected function ReturnPallete($additional = false)
    {
        $colors = $this->InitPallete();
        $pallete = array();
        if($additional)
        {
            foreach($this->additionalColors as $color)
            {
                array_push($pallete, $colors[$color]);
            }
        }
        else
        {
            foreach($this->colors as $color)
            {
                array_push($pallete, $colors[$color]);
            }
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
    
    protected function SetData()
    {
        if (!is_null($this->colors))
            $colors = $this->ReturnPallete();
        else
            $colors = $this->InitPallete();

        $this->_data->Palette = $colors;
        foreach($this->data as $serie => $data)
        {
            $this->_data->addPoints($data, $this->GetLegend($serie));
        }
        //$MyData->loadPalette("pChart/palettes/light.color", TRUE);
        $this->_data->setAxisName(0,$this->axisName); 
        $this->_data->addPoints($this->xAxes,"xAxes"); 
        $this->_data->setAbscissa("xAxes");
    }
    
    protected function DrawScale()
    {
        $this->_picture->drawScale(array(
                "CycleBackground"=>TRUE,
                "DrawSubTicks"=>TRUE,
                "GridR"=>0,
                "GridG"=>0,
                "GridB"=>0,
                "GridAlpha"=>10,
                "LabelRotation"=>$this->rotation
        ));
    }
    
    protected function DrawAreaAndTitle()
    {
         /* Create the pChart object */
        $this->_picture = new pImage($this->width,$this->height, $this->_data);
        $this->_picture->drawGradientArea(0, 0, $this->width, $this->height,  $this->_direction, array(
                "StartR"=>256,
                "StartG"=>256,
                "StartB"=>256,
                "EndR"=>200,
                "EndG"=>200,
                "EndB"=>255,
                "Alpha"=>100
        ));
        /* Set Font*/
        $this->_picture->setFontProperties(array(
                "FontName" => "mpdf/ttfonts/DejaVuSans.ttf",
                "FontSize" => 10
        )); 
        
        $this->_picture->drawText(round($this->width/2, 0),50,$this->title,array("FontSize"=>16,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE));
        
        /* Draw the scale  */ 
        $this->_picture->setGraphArea($this->margin_left, $this->margin_top ,$this->width-$this->margin_right,$this->height-$this->margin_bottom); 
        $this->DrawScale(); 

        /* Turn on shadow computing */  
        $this->_picture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10));
    }
    
    protected function DrawLegend(){}
    
    protected function DrawChart(){}
        
    public function GenerateChart()
    {
        $this->_filename = YiiBase::getPathOfAlias("webroot") . '/images/' . $this->name . '.' . $this->_prefix . '.png';
        if (file_exists($this->_filename))
            unlink($this->_filename);
        if ($this->legend_left == 0)
            $this->legend_left = $this->width - $this->margin_right;
        if($this->legend_top == 0)
            $this->legend_top = $this->margin_top + 63;
        
        $this->_data = new pData();
        
        $this->SetData();
        $this->DrawAreaAndTitle();
        $this->DrawChart();
        if (isset($this->additionalLegendData))
        {
            $pData = new pData();
            if (!is_null($this->additionalColors))
                $colors = $this->ReturnPallete(TRUE);
            else
                $colors = $this->InitPallete();

            $pData->Palette = $colors;
            if(count($this->additionalLegendData)>0)
            {
                foreach($this->additionalLegendData as $serie => $data)
                {
                    $pData->addPoints($data, $this->GetLegend($serie));
                }
                $this->_picture->setDataSet($pData);
                $this->DrawLegend();
            }
        }
        else
        {
            $this->DrawLegend();
        }
        /* Render the picture (choose the best way) */
        $this->_picture->render($this->_filename);
    }
    
    public function run()
    {
        $this->render('chart');
    }
    
    public function PrintChart()
    {
        $this->GenerateChart();
        return '<img src="/images/' . $this->name . '.' . $this->_prefix . '.png" />';
    }
}