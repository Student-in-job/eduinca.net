<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    $this->breadcrumbs=array(
        
            Yii::t('site', 'analytic') => array('analytic/index'),
            Yii::t('analytic', 'education_process')
    );
    $teachers_questions = array(
                'common_q1' => Yii::t('analytic', 'common_q2'),
                'common_q2' => Yii::t('analytic', 'common_q4'),
                'common_q3' => Yii::t('analytic', 'common_q5'),
                'common_q4' => Yii::t('analytic', 'common_q6'),
                'common_q5' => Yii::t('analytic', 'common_q7'),
                'common_q6' => Yii::t('analytic', 'common_q8'),
                'common_q7' => Yii::t('analytic', 'common_q9'),
                'common_q8' => Yii::t('analytic', 'common_q10'),
                'common_q9' => Yii::t('analytic', 'common_q11'),
        );
    $students_questions = array(
                'common_q1' => Yii::t('analytic', 'common_q1'),
                'common_q2' => Yii::t('analytic', 'common_q2'),
                'common_q3' => Yii::t('analytic', 'common_q3'),
                'common_q4' => Yii::t('analytic', 'common_q4'),
                'common_q5' => Yii::t('analytic', 'common_q5'),
                'common_q6' => Yii::t('analytic', 'common_q6'),
                'common_q7' => Yii::t('analytic', 'common_q7'),
                'common_q8' => Yii::t('analytic', 'common_q8'),
                'common_q9' => Yii::t('analytic', 'common_q9'),
                'common_q10' => Yii::t('analytic', 'common_q10'),
                'common_q11' => Yii::t('analytic', 'common_q11'),
        );
    $this->widget('application.extensions.widgets.filters.Filter', array(
            'filtername' => 'educationProcess',
            'questions_students' => $students_questions,
            'questions_teachers' => $teachers_questions,
            'model' => new FilterForm(),
            'universities' => $universities,
            'type' => ANALYTIC_PROCESS,
            'years' => $years,
    )); 
?>
<div class="span-20">
<table>
    <tr>
        <td style="background:none;"><h4 style="margin:0;text-align:center;"><?php echo Yii::t('analytic', 'teachers');?></h4></td>
        <td style="background:none;"><h4 style="margin:0;text-align:center;"><?php echo Yii::t('analytic', 'students');?></h4></td>
    </tr>
    <?php
        $maxVal = (count($students)>count($teachers)) ? count($students) : count($teachers);
        $header[0] = array(Yii::t('analytic', 'educational_institution') => 1, '5 <br/> %' => 1, '4 <br/> %' => 1, '3 <br/> %' => 1, '2 <br/> %' => 1, '1 <br/> %' => 1, 'n/a <br/> %' => 1);
        for($counter=1;$counter<=$maxVal;$counter++)
        {
            echo '<tr>';
            echo '<td style="background:#ffffff;vertical-align:top">';
            list($question,$arrayValue) = each($teachers);
            if (isset($teachers[$question]))
            {
                $this->widget('application.extensions.widgets.tables.Table', array(
                        'caption' => $counter . '. ' . $teachers_questions[$question],
                        'header' => $header,
                        'data' => $teachers[$question],
                        'labels' => $universities,
                ));
            }
            echo '</td>';
            echo '<td style="background:#ffffff;vertical-align:top">';
            list($question,$arrayValue) = each($students);
            if (isset($students[$question]))
            {
                $this->widget('application.extensions.widgets.tables.Table', array(
                        'caption' => $counter . '. ' . Yii::t('analytic', $question),
                        'header' => $header,
                        'data' => $students[$question],
                        'labels' => $universities,
                ));
            }
            echo '</td>';
            echo '</tr>';
        }
    ?>
</table>
<div>
    <?php
        $axes = array();
        $legend = array();
        $height = 80 + count($teachersMax['values'])*30 + 30;
        foreach($teachers as $question => $questionValue)
        {
            array_push($axes, $teachers_questions[$question]);
        }
        $this->widget('application.extensions.widgets.charts.HorizontalBarChart', array(
                'data' => array('some' => $teachersMax['values']),
                'xAxes' => $axes,
                'width' => 850,
                'height' => $height,
                'margin_left' => 400,
                'margin_top' => 80,
                //'legend' => $legend,
                'title' => Yii::t('analytic', 'educational_institute_info_teachers'),
                'colors' => $teachersMax['keys'],
                'name' => 'draw21',
                'legend_left' => 1060,
                'axisName' => '%',
    ));?>
</div>
<br/>
<div>
    <?php
        $axes = array();
        $legend = array();
        $height = 80 + count($studentsMax['values'])*30 + 30;
        foreach($students as $question => $questionValue)
        {
            array_push($axes, Yii::t('analytic', $question));
        }
        $this->widget('application.extensions.widgets.charts.HorizontalBarChart', array(
                'data' => array('some' => $studentsMax['values']),
                //'data' => $studentsMax['values'],
                'xAxes' => $axes,
                'width' => 850,
                'height' => $height,
                'margin_left' => 400,
                'margin_top' => 80,
                //'legend' => $legend,
                'title' => Yii::t('analytic', 'educational_institute_info_students'),
                'colors' => $studentsMax['keys'],
                'name' => 'draw22',
                'legend_left' => 1060,
                'axisName' => '%',
    ));?>
</div>
</div>
<div class="span-5">
    <div class="portlet" style="margin-top: 44px;">
        <table>
            <tr>
                <td><?php echo Yii::t('analytic', 'common_answer5');?></td>
            </tr>
            <tr>
                <td><?php echo Yii::t('analytic', 'common_answer4');?></td>
            </tr>
            <tr>
                <td><?php echo Yii::t('analytic', 'common_answer3');?></td>
            </tr>
            <tr>
                <td><?php echo Yii::t('analytic', 'common_answer2');?></td>
            </tr>
            <tr>
                <td><?php echo Yii::t('analytic', 'common_answer1');?></td>
            </tr>
            <tr>
                <td><?php echo Yii::t('analytic', 'common_answer0');?></td>
            </tr>
        </table>
    </div>
</div>
<div style="clear: both"></div>