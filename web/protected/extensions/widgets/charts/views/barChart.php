<?php

        require_once 'pChart/class/pData.class.php';
        require_once 'pChart/class/pDraw.class.php';
        require_once 'pChart/class/pImage.class.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

        
        $MyData = new pData();   
        $MyData->loadPalette("pChart/palettes/blind.color",TRUE);
        
        if (isset($this->colors))
        {
        $colors = array(
            0 => array('R'=> 75,'G' => 178, 'B' => 197),
            1 => array('R'=> 234,'G' => 162, 'B' => 40),
        );
        }
        else
        {
            $colors = $this->InitPallete();
        }
        $counter = 0;
        //var_dump($this->data);die();
        foreach($this->data as $serie => $data)
        {
            $MyData->addPoints($data, $serie);
            $MyData->setPalette($serie, $colors[$counter++]);
        }
        //$MyData->loadPalette("pChart/palettes/light.color", TRUE);
        $MyData->setAxisName(0,"%"); 
        $MyData->addPoints($this->xAxes,"xAxes"); 
        //$MyData->setSerieDescription("Months","Month"); 
        $MyData->setAbscissa("xAxes");

        /* Create the pChart object */ 
        $myPicture = new pImage($this->width,$this->height,$MyData); 
        $myPicture->drawGradientArea(0,0,$this->width,$this->height,DIRECTION_VERTICAL,array("StartR"=>256,"StartG"=>256,"StartB"=>256,"EndR"=>200,"EndG"=>200,"EndB"=>255,"Alpha"=>100));
        $myPicture->setFontProperties(array("FontName"=>"mpdf/ttfonts/DejaVuSans.ttf","FontSize"=>10)); 

        /* Draw the scale  */ 
        $myPicture->setGraphArea(50,30,$this->width-50,$this->height-30); 
        $myPicture->drawScale(array("CycleBackground"=>TRUE,"DrawSubTicks"=>TRUE,"GridR"=>0,"GridG"=>0,"GridB"=>0,"GridAlpha"=>10, "LabelRotation"=>$this->rotation)); 

        /* Turn on shadow computing */  
        $myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10)); 

        /* Draw the chart */ 
        $settings = array("Gradient"=>TRUE,"DisplayPos"=>LABEL_POS_INSIDE,"DisplayValues"=>TRUE,"DisplayR"=>255,"DisplayG"=>255,"DisplayB"=>255,"DisplayShadow"=>TRUE,"Surrounding"=>10); 
        //$settings = array("Floating0Serie"=>"Floating 0","Draw0Line"=>TRUE,"Gradient"=>TRUE,"DisplayPos"=>LABEL_POS_INSIDE,"DisplayValues"=>TRUE,"DisplayR"=>255,"DisplayG"=>255,"DisplayB"=>255,"DisplayShadow"=>TRUE,"Surrounding"=>10);
        $myPicture->drawBarChart($settings); 
        
        /* Write the chart legend */ 
        $myPicture->drawLegend($this->width-70,39,array("Style"=>LEGEND_BOX,"Mode"=>LEGEND_VERTICAL)); 

        /* Render the picture (choose the best way) */ 
        $myPicture->render(YiiBase::getPathOfAlias("webroot") . '/images/example.' . $this->name . 'BarChart.can.png');
        
        echo '<img src = /images/example.' . $this->name . 'BarChart.can.png>';
?>