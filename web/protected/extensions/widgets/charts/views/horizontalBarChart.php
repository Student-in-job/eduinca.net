<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates 
 * and open the template in the editor.
 */

require_once 'pChart/class/pData.class.php';
require_once 'pChart/class/pDraw.class.php';
require_once 'pChart/class/pImage.class.php';

/* Create and populate the pData object */ 
$MyData = new pData();
//$MyData->loadPalette("pChart/palettes/light.color",TRUE);
$colors = $this->InitPallete();
$counter = 0;
foreach($this->data as $serie => $data)
{
    $MyData->addPoints($data, $this->GetLegend($serie));
    $MyData->setPalette($this->GetLegend($serie), $colors[$counter++]);
}

 //$MyData->setSerieDrawable("Hits2",FALSE); 
$MyData->addPoints($this->xAxes,"xAxes");
//$MyData->setSerieDescription("Months","Month"); 
$MyData->setAbscissa("xAxes");

//$MyData->setAbscissaName("Browsers");

/* Create the pChart object */ 
$myPicture = new pImage($this->width,$this->height,$MyData); 
$myPicture->drawGradientArea(0,0,$this->width,$this->height,DIRECTION_HORIZONTAL,array("StartR"=>200,"StartG"=>200,"StartB"=>200,"EndR"=>256,"EndG"=>256,"EndB"=>256,"Alpha"=>100));
$myPicture->setFontProperties(array("FontName"=>"mpdf/ttfonts/DejaVuSans.ttf","FontSize"=>10)); 

$myPicture->drawText(round($this->width/2, 0),50,$this->title,array("FontSize"=>16,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE));
/* Draw the chart scale */  
$myPicture->setGraphArea($this->margin_left, $this->margin_top ,$this->width-$this->margin_right,$this->height-$this->margin_bottom);
$AxisBoundaries = array(0=>array("Min"=>0,"Max"=>100));
$myPicture->drawScale(array("Mode"=>SCALE_MODE_MANUAL,"ManualScale"=>$AxisBoundaries,"CycleBackground"=>TRUE,"GridR"=>0,"GridG"=>0,"GridB"=>0,"GridAlpha"=>10,"Pos"=>SCALE_POS_TOPBOTTOM,)); 

/* Turn on shadow computing */  
$myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10)); 

if (!is_null($this->colors))
    $Palette = $this->ReturnPallete();
else
    $Palette = null;
    

/* Draw the chart */  
$myPicture->drawBarChart(array("DisplayPos"=>LABEL_POS_INSIDE,"DisplayValues"=>TRUE,"Rounded"=>TRUE,"Surrounding"=>30,"OverrideColors"=>$Palette,"Orientation"=>ORIENTATION_VERTICAL)); 

$myPicture->drawLegend($this->legend_left,$this->legend_top,array("Style"=>LEGEND_BOX,"Mode"=>LEGEND_VERTICAL)); 
 
//$myPicture->setGraphArea(150,290,800,530);
//$MyData->setSerieDrawable("Hits",FALSE); 
//$MyData->setSerieDrawable("Hits2",TRUE); 
//$myPicture->drawScale(array("CycleBackground"=>TRUE,"GridR"=>0,"GridG"=>0,"GridB"=>0,"GridAlpha"=>10,"Pos"=>SCALE_POS_TOPBOTTOM)); 
//$myPicture->drawBarChart(array("DisplayPos"=>LABEL_POS_INSIDE,"DisplayValues"=>TRUE,"Rounded"=>TRUE,"Surrounding"=>30,/*,"OverrideColors"=>$Palette*/"Orientation"=>ORIENTATION_VERTICAL)); 
 
 /* Write the legend */  
 //$myPicture->drawLegend(530,350,array("Style"=>LEGEND_BOX,"Mode"=>LEGEND_VERTICAL)); 

 /* Render the picture (choose the best way) */ 
 $myPicture->render(YiiBase::getPathOfAlias("webroot") . '/images/example.'. $this->name . 'HBarChart.can.png');
        
echo '<img src = /images/example.' . $this->name . 'HBarChart.can.png>';
?>