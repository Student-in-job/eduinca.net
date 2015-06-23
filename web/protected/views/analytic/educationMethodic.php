<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$this->breadcrumbs=array(
        
	Yii::t('site', 'analytic') => array('analytic/index'),
        Yii::t('analytic', 'education_methodic')
);
$questions = array(
        'methodic_q1' => Yii::t('analytic', 'methodic_q1'),
        'methodic_q2' => Yii::t('analytic', 'methodic_q2'),
        'methodic_q3' => Yii::t('analytic', 'methodic_q3'),
        'methodic_q4' => Yii::t('analytic', 'methodic_q4'),
        'methodic_q5' => Yii::t('analytic', 'methodic_q5'),
        'methodic_q6' => Yii::t('analytic', 'methodic_q6'),
        'methodic_q7' => Yii::t('analytic', 'methodic_q7'),
        'methodic_q8' => Yii::t('analytic', 'methodic_q8'),
        'methodic_q9' => Yii::t('analytic', 'methodic_q9'),
        'methodic_q10' => Yii::t('analytic', 'methodic_q10'),
        'methodic_q11' => Yii::t('analytic', 'methodic_q11'),
        'methodic_q12' => Yii::t('analytic', 'methodic_q12'),
        'methodic_q13' => Yii::t('analytic', 'methodic_q13'),
);
$labels = array();
foreach($questions as $key => $value)
{
    $labels[$key] = '';
}
$this->widget('application.extensions.widgets.filters.Filter', array(
            'filtername' => 'educationMethodic',
            'questions' => $questions,
            'model' => $filter,
            'universities' => $universities,
            'type' => ANALYTIC_METHODIC,
            'years' => $years,
    )); 
$width = 50+count($teachersInvolved)*65+50;
?>
<div class="span-20">
<div style="width:65%;float:left;">
    <?php
        $header[0] = array('' => 1, '5 <br/> %' => 1, '4 <br/> %' => 1, '3 <br/> %' => 1, '2 <br/> %' => 1, '1 <br/> %' => 1);
        if(isset($teachersInvolved))
        {
            $this->widget('application.extensions.widgets.tables.Table', array(
                    'caption' => Yii::t('analytic', 'teachers') . ' (' . Yii::t('analytic', 'participated') . ')',
                    'header' => $header,
                    'data' => $teachersInvolved,
                    'labels' => $questions,
            ));
        }
    ?>
</div>
<div style="width:25%;float:left;">
    <?php
        if(isset($teachersNotInvolved))
        {
            $this->widget('application.extensions.widgets.tables.Table', array(
                    'caption' => '(' . Yii::t('analytic', 'notparticipated') . ')',
                    'header' => $header,
                    'data' => $teachersNotInvolved,
                    'labels' => $labels,
            ));
        }
    ?>
</div>
<div>
    <?php
        $legend = array('0' => 'n/a');
        $axes = array();
        foreach($teachersInvolved as $key => $row)
        {
            array_push($axes, Yii::t('analytic',$key));
        }
        $this->widget('application.extensions.widgets.charts.BarChart', array(
                'data' => $this->GetArrayTransform($teachersInvolved, array('5','4','3','2','1')),
                'xAxes' => $axes,
                'legend' => $legend,
                'title' => Yii::t('analytic', 'teachers') . ' (' . Yii::t('analytic', 'participated') . ')',
                //'colors' => $studentsMax['keys'],
                'name' => 'draw31',
                'rotation' => 90,
                'width' => $width,
                'height' => 750,
                'margin_bottom' => 350,
                'margin_top' => 60,
                'axisName' => '%',
    ));?>
</div>
<div>
    <?php
        $this->widget('application.extensions.widgets.charts.BarChart', array(
                'data' => $this->GetArrayTransform($teachersNotInvolved, array('5','4','3','2','1')),
                'xAxes' => $axes,
                'legend' => $legend,
                'title' => Yii::t('analytic', 'teachers') . ' (' . Yii::t('analytic', 'notparticipated') . ')',
                //'colors' => $studentsMax['keys'],
                'name' => 'draw32',
                'rotation' => 90,
                'width' => $width,
                'height' => 750,
                'margin_bottom' => 350,
                'margin_top' => 60,
                'axisName' => '%',
    ));?>
</div>
<div style="width:65%;float:left;">  
    <?php
        if(isset($studentsInvolved))
        {
            $this->widget('application.extensions.widgets.tables.Table', array(
                    'caption' => Yii::t('analytic', 'students') . ' (' . Yii::t('analytic', 'participated') . ')',
                    'header' => $header,
                    'data' => $studentsInvolved,
                    'labels' => $questions,
            ));
        }
    ?>
</div>
<div style="width:25%;float:left;"> 
    <?php
        if(isset($studentsNotInvolved))
        {
            $this->widget('application.extensions.widgets.tables.Table', array(
                    'caption' => '(' . Yii::t('analytic', 'notparticipated') . ')',
                    'header' => $header,
                    'data' => $studentsNotInvolved,
                    'labels' => $labels,
            ));
        }
    ?>     
</div>
<div>
    <?php
        $axes = array();
        foreach($studentsInvolved as $key => $row)
        {
            array_push($axes, Yii::t('analytic',$key));
        }
        $this->widget('application.extensions.widgets.charts.BarChart', array(
                'data' => $this->GetArrayTransform($studentsInvolved, array('5','4','3','2','1')),
                'xAxes' => $axes,
                'legend' => $legend,
                'title' => Yii::t('analytic', 'teachers') . ' (' . Yii::t('analytic', 'participated') . ')',
                //'colors' => $studentsMax['keys'],
                'name' => 'draw33',
                'rotation' => 90,
                'width' => $width,
                'height' => 750,
                'margin_bottom' => 350,
                'margin_top' => 60,
                'axisName' => '%',
    ));?>
</div>
<div>
    <?php
        $array = array();
        $this->widget('application.extensions.widgets.charts.BarChart', array(
                'data' => $this->GetArrayTransform($studentsNotInvolved, array('5','4','3','2','1')),
                'xAxes' => $axes,
                //'legend' => $legend,
                'title' => Yii::t('analytic', 'teachers') . ' (' . Yii::t('analytic', 'notparticipated') . ')',
                //'colors' => $studentsMax['keys'],
                'name' => 'draw34',
                'rotation' => 90,
                'width' => $width,
                'height' => 750,
                'margin_bottom' => 350,
                'margin_top' => 60,
                'axisName' => '%',
    ));?>
</div>
</div>
<div class="span-5">
<div class="portlet">
    <table>
        <tr>
            <td><?php echo Yii::t('analytic', 'methodic_answer5');?></td>
        </tr>
        <tr>
            <td><?php echo Yii::t('analytic', 'methodic_answer4');?></td>
        </tr>
        <tr>
            <td><?php echo Yii::t('analytic', 'methodic_answer3');?></td>
        </tr>
        <tr>
            <td><?php echo Yii::t('analytic', 'methodic_answer2');?></td>
        </tr>
        <tr>
            <td><?php echo Yii::t('analytic', 'methodic_answer1');?></td>
        </tr>
    </table>
</div>
</div>
<div style="clear: both;">