<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->breadcrumbs=array(
	Yii::t('site', 'analytic') => array('analytic/index'),
        Yii::t('analytic', 'education_diploma')
    );

$this->widget('application.extensions.widgets.filters.Filter', array(
            'filtername' => 'educationDiploma',
            'model' => new FilterForm(),
            'universities' => $universities,
            'type' => ANALYTIC_DIPLOMA,
            'years' => $years,
    )); 

?>
<h3 style="text-align:center; line-height: 1"><?php echo Yii::t('analytic', 'papers')?></h3>

<?php
    $width = 50 + count($papersAverage)*50 + 350;
    if(count($papersAverage)>0)
    $this->widget('application.extensions.widgets.charts.BarChart', array(
            'data' => $papersAverage,
            'legend' => $universities,
            'name' => 'draw51',
            'margin_right' => 300,
            'width' => $width,
            'margin_top' => 20,
            'height' => 290,
            'legend_top' => 100,
            'legend_left' => $width - 285,
            'colors' => $this->getColorByUniversity($papersAverage, $universities),
    ));
?>
<h3 style="text-align:center; line-height: 1; margin-top: 20px"><?php echo Yii::t('analytic', 'papers_types')?></h3>
<?php    
    $legend = array(
            'papers_theoretical' => Yii::t('analytic', 'papers_theoretical'),
            'papers_practical' => Yii::t('analytic', 'papers_practical'),
    );
    $axes = array();
    foreach($paperstheoretical as $key => $row)
    {
        array_push($axes, $universities[$key]);
    }
    $width = 50 + count($paperstheoretical)*90 + 30;
    if(count($paperstheoretical)>0)
    $this->widget('application.extensions.widgets.charts.BarChart', array(
            'data' => $this->GetArrayTransform($paperstheoretical, array('papers_theoretical', 'papers_practical')),
            'legend' => $legend,
            'xAxes' => $axes,
            'rotation' => 90,
            'name' => 'draw52',
            'margin_left' => 50,
            'margin_right' => 30,
            'width' => $width,
            'height' => 560,
            'margin_bottom' => 260,
            'legend_left' => $width - 150,
            'legend_top' => 40,
            'axisName' => '%',
    ));
?>
<h3 style="text-align:center; line-height: 1; margin-top: 20px"><?php echo Yii::t('analytic', 'private_sector')?></h3>
<?php
    $data = array();
    $xAxes = array();
    foreach ($teachersPrivateSector as $key => $value)
    {
        array_push($data, $value);
        array_push($xAxes, $universities[$key]); 
    }
    if(count($teachersPrivateSector)>0)
    $this->widget('application.extensions.widgets.charts.PieChart', array(
            'data' => array('some' => $data),
            'title' => Yii::t('analytic','by_words_teachers'),
            //'legend' => $universities,
            'xAxes' => $xAxes,
            'name' => 'draw55',
            'margin_right' => 300,
            'width' => 550,
            'margin_top' => 80,
            'margin_left' => 140,
            'height' => 320,
            'legend_top' => 130,
            'legend_left' => 560 - 285,
            'colors' => $this->getColorByUniversity($teachersPrivateSector, $universities),
    ));
    $width = 50 + count($teachersPrivateSectorPercentage)*50 + 350;
    if(count($teachersPrivateSectorPercentage)>0)
    $this->widget('application.extensions.widgets.charts.BarChart', array(
            'data' => $teachersPrivateSectorPercentage,
            'title' => Yii::t('analytic','by_words_teachers'),
            'legend' => $universities,
            'name' => 'draw53',
            'margin_right' => 300,
            'width' => $width,
            'margin_top' => 80,
            'height' => 350,
            'legend_top' => 160,
            'legend_left' => $width - 285,
            'axisName' => '%',
            'colors' => $this->getColorByUniversity($teachersPrivateSectorPercentage, $universities),
    ));
    $width = 50 + count($studentsPrivateSectorPercentage)*50 + 350;
    if(count($studentsPrivateSectorPercentage)>0)
    $this->widget('application.extensions.widgets.charts.BarChart', array(
            'data' => $studentsPrivateSectorPercentage,
            'title' => Yii::t('analytic','by_words_students'),
            'legend' => $universities,
            'name' => 'draw54',
            'margin_right' => 300,
            'width' => $width,
            'margin_top' => 80,
            'height' => 350,
            'legend_top' => 160,
            'legend_left' => $width - 285,
            'axisName' => '%',
            'colors' => $this->getColorByUniversity($studentsPrivateSectorPercentage, $universities),
    ));
    
?>