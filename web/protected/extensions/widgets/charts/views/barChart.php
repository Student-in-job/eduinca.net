<?php

        include 'pChart/class/pData.class.php';
        include 'pChart/class/pDraw.class.php';
        include 'pChart/class/pImage.class.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

        
        $MyData = new pData();   
        $MyData->loadPalette("pChart/palettes/blind.color",TRUE);
        
        $colors = array(
            0 => array('R'=> 75,'G' => 178, 'B' => 197),
            1 => array('R'=> 234,'G' => 162, 'B' => 40),
        );
        $counter = 0;
        
        foreach($this->data as $serie => $data)
        {
            $MyData->addPoints($data, $serie);
            $MyData->setPalette($serie, $colors[$counter++]);
        }
        //$MyData->loadPalette("pChart/palettes/light.color", TRUE);
        //$MyData->addPoints(array(150,220,300,250,420,200,300,200,100),"Server A"); 
        //$MyData->addPoints(array(140,0,340,300,320,300,200,100,50),"Server B"); 
        $MyData->setAxisName(0,"%"); 
        $MyData->addPoints($this->xAxes,"xAxes"); 
        //$MyData->setSerieDescription("Months","Month"); 
        $MyData->setAbscissa("xAxes"); 

        /* Create the floating 0 data serie */ 
        //$MyData->addPoints(array(60,80,20,40,0,50,90,30,100),"Floating 0"); 
        //$MyData->setSerieDrawable("Floating 0",FALSE); 

        /* Create the pChart object */ 
        $myPicture = new pImage(650,400,$MyData); 
        $myPicture->drawGradientArea(0,0,650,400,DIRECTION_VERTICAL,array("StartR"=>256,"StartG"=>256,"StartB"=>256,"EndR"=>200,"EndG"=>200,"EndB"=>255,"Alpha"=>100)); 
        //$myPicture->drawGradientArea(0,0,650,400,DIRECTION_HORIZONTAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>0,"EndG"=>0,"EndB"=>0,"Alpha"=>20)); 
        //$myPicture->setFontProperties(array("FontName"=>"pChart/fonts/pf_arma_five.ttf","FontSize"=>8)); 
        $myPicture->setFontProperties(array("FontName"=>"mpdf/ttfonts/DejaVuSans.ttf","FontSize"=>10)); 

        /* Draw the scale  */ 
        $myPicture->setGraphArea(50,30,600,370); 
        $myPicture->drawScale(array("CycleBackground"=>TRUE,"DrawSubTicks"=>TRUE,"GridR"=>0,"GridG"=>0,"GridB"=>0,"GridAlpha"=>10)); 

        /* Turn on shadow computing */  
        $myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10)); 

        /* Draw the chart */ 
        $settings = array("Gradient"=>TRUE,"DisplayPos"=>LABEL_POS_INSIDE,"DisplayValues"=>TRUE,"DisplayR"=>255,"DisplayG"=>255,"DisplayB"=>255,"DisplayShadow"=>TRUE,"Surrounding"=>10); 
        //$settings = array("Floating0Serie"=>"Floating 0","Draw0Line"=>TRUE,"Gradient"=>TRUE,"DisplayPos"=>LABEL_POS_INSIDE,"DisplayValues"=>TRUE,"DisplayR"=>255,"DisplayG"=>255,"DisplayB"=>255,"DisplayShadow"=>TRUE,"Surrounding"=>10);
        $myPicture->drawBarChart($settings); 
        
        /* Write the chart legend */ 
        $myPicture->drawLegend(530,39,array("Style"=>LEGEND_BOX,"Mode"=>LEGEND_VERTICAL)); 

        /* Render the picture (choose the best way) */ 
        $myPicture->render(YiiBase::getPathOfAlias("webroot") . '/images/example.' . $this->name . 'BarChart.can.png');
        
        echo '<img src = /images/example.' . $this->name . 'BarChart.can.png>';
?>