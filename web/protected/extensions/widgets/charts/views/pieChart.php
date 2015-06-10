<?php

        require_once 'pChart/class/pData.class.php';
        require_once 'pChart/class/pDraw.class.php';
        require_once 'pChart/class/pImage.class.php';
        require_once 'pChart/class/pPie.class.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

        
        $MyData = new pData();   
        //$MyData->loadPalette("pChart/palettes/blind.color",TRUE);
        
        $colors = $this->InitPallete();
        $MyData->Palette = $colors;
        
        foreach($this->data as $serie => $data)
        {
            $MyData->addPoints($data, $this->GetLegend($serie));
        }
        //$MyData->loadPalette("pChart/palettes/light.color", TRUE);
        $MyData->setAxisName(0,$this->axisName); 
        $MyData->addPoints($this->xAxes,"xAxes"); 
        //$MyData->setSerieDescription("Months","Month"); 
        $MyData->setAbscissa("xAxes");

        /* Create the pChart object */ 
        $myPicture = new pImage($this->width,$this->height,$MyData); 
        $myPicture->drawGradientArea(0,0,$this->width,$this->height,DIRECTION_VERTICAL,array("StartR"=>256,"StartG"=>256,"StartB"=>256,"EndR"=>200,"EndG"=>200,"EndB"=>255,"Alpha"=>100));
        $myPicture->setFontProperties(array("FontName"=>"mpdf/ttfonts/DejaVuSans.ttf","FontSize"=>10)); 
        $myPicture->drawText(round($this->width/2, 0),50,$this->title,array("FontSize"=>16,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE));
        
        /* Draw the scale  */ 
        //$myPicture->setGraphArea($this->margin_left, $this->margin_top ,$this->width-$this->margin_right,$this->height-$this->margin_bottom); 
        //$myPicture->drawScale(array("CycleBackground"=>TRUE,"DrawSubTicks"=>TRUE,"GridR"=>0,"GridG"=>0,"GridB"=>0,"GridAlpha"=>10, "LabelRotation"=>$this->rotation)); 

        /* Turn on shadow computing */  
        //$myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10)); 

        /* Draw the chart */ 
        //$settings = array("Gradient"=>TRUE,"DisplayPos"=>LABEL_POS_INSIDE,"DisplayValues"=>TRUE,"DisplayR"=>255,"DisplayG"=>255,"DisplayB"=>255,"DisplayShadow"=>TRUE,"Surrounding"=>10); 
        //$settings = array("Floating0Serie"=>"Floating 0","Draw0Line"=>TRUE,"Gradient"=>TRUE,"DisplayPos"=>LABEL_POS_INSIDE,"DisplayValues"=>TRUE,"DisplayR"=>255,"DisplayG"=>255,"DisplayB"=>255,"DisplayShadow"=>TRUE,"Surrounding"=>10);
        //$myPicture->drawBarChart($settings); 
        
        /* Write the chart legend */ 
        //$myPicture->drawLegend($this->legend_left,$this->legend_top,array("Style"=>LEGEND_BOX,"Mode"=>LEGEND_VERTICAL)); 
        
        $PieChart = new pPie($myPicture,$MyData); 

        /* Draw an AA pie chart */  
        $PieChart->draw2DPie($this->margin_left, $this->height/2 + $this->margin_top/4  ,array("DrawLabels"=>FALSE,"LabelStacked"=>TRUE,"Border"=>TRUE, "ValuePosition"=>PIE_VALUE_INSIDE,"Radius"=>120, "WriteValues" => PIE_VALUE_NATURAL, "LabelColor" => PIE_LABEL_COLOR_AUTO, 'ValueR'=>0, 'ValueG'=>0, 'ValueB' =>0)); 

        /* Write the legend box */  
        $myPicture->setShadow(FALSE); 
        $PieChart->drawPieLegend($this->legend_left,$this->legend_top, array("Alpha"=>20)); 
        
        /* Render the picture (choose the best way) */ 
        $myPicture->render(YiiBase::getPathOfAlias("webroot") . '/images/example.' . $this->name . 'BarChart.can.png');
        
        echo '<img src = /images/example.' . $this->name . 'BarChart.can.png>';
?>