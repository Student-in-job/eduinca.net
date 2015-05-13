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
foreach($this->data as $key => $data)
{
    $MyData->addPoints($data, $key);
    //$MyData->setPalette($this->legend[$key], $colors[$counter++]);
}
 //$MyData->setSerieDrawable("Hits2",FALSE); 
$MyData->addPoints($this->xAxes,"xAxes");
//$MyData->setSerieDescription("Months","Month"); 
$MyData->setAbscissa("xAxes");
//$MyData->setAbscissaName("Browsers");

/* Create the pChart object */ 
$myPicture = new pImage(1050,500,$MyData); 
$myPicture->drawGradientArea(0,0,1050,500,DIRECTION_HORIZONTAL,array("StartR"=>200,"StartG"=>200,"StartB"=>200,"EndR"=>256,"EndG"=>256,"EndB"=>256,"Alpha"=>100));
$myPicture->setFontProperties(array("FontName"=>"mpdf/ttfonts/DejaVuSans.ttf","FontSize"=>10)); 

$myPicture->drawText(495,50,$this->title,array("FontSize"=>16,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE));
/* Draw the chart scale */  
$myPicture->setGraphArea(750,80,1000,470);
$AxisBoundaries = array(0=>array("Min"=>0,"Max"=>100));
$myPicture->drawScale(array("Mode"=>SCALE_MODE_MANUAL,"ManualScale"=>$AxisBoundaries,"CycleBackground"=>TRUE,"GridR"=>0,"GridG"=>0,"GridB"=>0,"GridAlpha"=>10,"Pos"=>SCALE_POS_TOPBOTTOM,)); 

/* Turn on shadow computing */  
$myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10)); 

$Palette = $this->ReturnPallette();


/* Draw the chart */  
$myPicture->drawBarChart(array("DisplayPos"=>LABEL_POS_INSIDE,"DisplayValues"=>TRUE,"Rounded"=>TRUE,"Surrounding"=>30,"OverrideColors"=>$Palette,"Orientation"=>ORIENTATION_VERTICAL)); 


 
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