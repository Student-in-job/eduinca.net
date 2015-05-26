<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    $this->breadcrumbs=array(
	Yii::t('site', 'analytic') => array('analytic/index'),
        Yii::t('analytic', 'education_labs')
    );

    $axes = array();
    //var_dump($teachers);die();
    foreach($teachers as $key => $row)
    {
        array_push($axes, $universities[$key]);
    }
    $legend = array(
            1 => Yii::t('answerteacher','labs_comment_1'),
            2 => Yii::t('answerteacher','labs_comment_2'),
            3 => Yii::t('answerteacher','labs_comment_3'),
            4 => Yii::t('answerteacher','labs_comment_4')
    );
    //var_dump($data);die();
?>
<h3 style="margin:0 !important;text-align: center"><?php echo Yii::t('analytic', 'teachers')?></h3>
<?php
    $this->widget('application.extensions.widgets.charts.HorizontalBarChart', array(
            'data' => $this->GetArrayTransform($teachers, array('1','2','3','4')),
            'xAxes' => $axes,
            'title' => Yii::t('analytic', 'labs_comment'),
            'legend' => $legend,
            'name' => 'draw41',
            'margin_left' => 550,
            'width' => 950,
            'margin_top' => 80,
            'height' => 700,
            'margin_bottom' => 100,
            'legend_left' => 200,
            'legend_top' => 620,
    ));
?>
<h3 style="margin:0 !important;text-align: center"><?php echo Yii::t('analytic', 'students')?></h3>
<?php
    $axes = array();
    foreach($students as $key => $row)
    {
        array_push($axes, $universities[$key]);
    }
    $legend = array(
            1 => Yii::t('answerstudent','labs_comment_1'),
            2 => Yii::t('answerstudent','labs_comment_2'),
            3 => Yii::t('answerstudent','labs_comment_3'),
            4 => Yii::t('answerstudent','labs_comment_4')
    );
    $this->widget('application.extensions.widgets.charts.HorizontalBarChart', array(
            'data' => $this->GetArrayTransform($students, array('1','2','3','4')),
            'xAxes' => $axes,
            'title' => Yii::t('analytic', 'labs_comment'),
            'legend' => $legend,
            'name' => 'draw42',
            'margin_left' => 550,
            'width' => 950,
            'margin_top' => 80,
            'height' => 700,
            'margin_bottom' => 100,
            'legend_left' => 200,
            'legend_top' => 620,
    ));
?>
<h3 style="margin:0 !important;text-align: center"><?php echo Yii::t('analytic', 'practice_teachers')?></h3>
<?php
    $axes = array();
    foreach($practice_teachers as $key => $row)
    {
        array_push($axes, $universities[$key]);
    }
    $legend = array(
            1 => Yii::t('answer', 'yes'),
            0 => Yii::t('answer', 'no'),
    );
    $this->widget('application.extensions.widgets.charts.HorizontalBarChart', array(
            'data' => $this->GetArrayTransform($practice_teachers, array('1','0')),
            'xAxes' => $axes,
            'title' => Yii::t('analytic', 'practice_teachers'),
            'legend' => $legend,
            'name' => 'draw43',
            'margin_left' => 550,
            'width' => 950,
            'margin_top' => 80,
            'height' => 420,
            //'margin_bottom' => 100,
            //'legend_left' => 200,
            //'legend_top' => 620,
    ));
?>
<h3 style="margin:0 !important;text-align: center"><?php echo Yii::t('analytic', 'practice_students')?></h3>
<?php
    $axes = array();
    foreach($students as $key => $row)
    {
        array_push($axes, $universities[$key]);
    }
    $this->widget('application.extensions.widgets.charts.HorizontalBarChart', array(
            'data' => $this->GetArrayTransform($practice_students, array('1','0')),
            'xAxes' => $axes,
            'title' => Yii::t('analytic', 'practice_teachers'),
            'legend' => $legend,
            'name' => 'draw44',
            'margin_left' => 550,
            'width' => 950,
            'margin_top' => 80,
            'height' => 450,
            //'margin_bottom' => 100,
            //'legend_left' => 200,
            //'legend_top' => 620,
    ));
?>
<h3 style="margin:0 !important;text-align: center"><?php echo Yii::t('analytic', 'practice_duration');?></h3>
<?php
    $legend = array();
    foreach ($practice_duration_teachers as $key => $row)
    {
        $legend[$key] = $universities[$key];
    }
    $this->widget('application.extensions.widgets.charts.BarChart', array(
            'data' => $practice_duration_teachers,
            //'xAxes' => $axes,
            'title' => Yii::t('analytic', 'practice_duration_teachers'),
            'legend' => $legend,
            'name' => 'draw45',
            'margin_right' => 550,
            'width' => 950,
            'margin_top' => 80,
            'height' => 350,
            'legend_top' => 100,
            'axisName' => 'дней',
    ));
    $legend = array();
    foreach ($practice_duration_students as $key => $row)
    {
        $legend[$key] = $universities[$key];
    }
    $this->widget('application.extensions.widgets.charts.BarChart', array(
            'data' => $practice_duration_students,
            //'xAxes' => $axes,
            'title' => Yii::t('analytic', 'practice_duration_students'),
            'legend' => $legend,
            'name' => 'draw46',
            'margin_right' => 550,
            'width' => 950,
            'margin_top' => 80,
            'height' => 350,
            'legend_top' => 100,
            'axisName' => 'дней',
    ));
?>