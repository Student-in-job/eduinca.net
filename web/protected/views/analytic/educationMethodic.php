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
?>
<table>
    <tr>
        <td style="background:none;"><h4 style="margin:0;text-align:center;"><?php echo Yii::t('analytic', 'teachers');?></h4></td>
        <td style="background:none;"><h4 style="margin:0;text-align:center;"><?php echo Yii::t('analytic', 'students');?></h4></td>
    </tr>
    <?php
        $counter = 1;
        $header[0] = array(Yii::t('analytic', 'educational_institution') => 1, '5 <br/> %' => 1, '4 <br/> %' => 1, '3 <br/> %' => 1, '2 <br/> %' => 1, '1 <br/> %' => 1, 'n/a <br/> %' => 1);
        foreach($students as $question => $arrayValues)
        {
            echo '<tr>';
            echo '<td style="background:#ffffff;vertical-align:top">';
            if (isset($teachers[$question]))
            {
                $this->widget('application.extensions.widgets.tables.Table', array(
                        'caption' => $counter . '. ' . Yii::t('answerteacher', $question),
                        'header' => $header,
                        'data' => $teachers[$question],
                        'labels' => $universities,
                ));
            }
            echo '</td>';
            echo '<td style="background:#ffffff;vertical-align:top">';
            if (isset($students[$question]))
            {
                $this->widget('application.extensions.widgets.tables.Table', array(
                        'caption' => $counter . '. ' . Yii::t('answerstudent', $question),
                        'header' => $header,
                        'data' => $students[$question],
                        'labels' => $universities,
                ));
            }
            echo '</td>';
            echo '</tr>';
            $counter++;
        }
    ?>
</table>
<div>
    <?php
        $axes = array();
        $legend = array();
        foreach($teachers as $question => $questionValue)
        {
            array_push($axes, Yii::t('answerteacher', $question));
        }
        $this->widget('application.extensions.widgets.charts.HorizontalBarChart', array(
                'data' => array('some' => $teachersMax['values']),
                'xAxes' => $axes,
                //'legend' => $legend,
                'title' => 'Информация о методике преподавания (преподаватели)',
                'colors' => $teachersMax['keys'],
                'name' => 'draw1',
    ));?>
</div>
<br/>
<div>
    <?php
        $axes = array();
        $legend = array();
        foreach($students as $question => $questionValue)
        {
            array_push($axes, Yii::t('answerstudent', $question));
        }
        $this->widget('application.extensions.widgets.charts.HorizontalBarChart', array(
                'data' => array('some' => $studentsMax['values']),
                'xAxes' => $axes,
                //'legend' => $legend,
                'title' => 'Информация об методике преподавания (студенты)',
                'colors' => $studentsMax['keys'],
                'name' => 'draw2',
    ));?>
</div>
