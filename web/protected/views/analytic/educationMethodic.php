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
    <?php
        echo '<tr>';
        echo '<td style="background:#ffffff;vertical-align:top">';
        $header[0] = array('' => 1, '5 <br/> %' => 1, '4 <br/> %' => 1, '3 <br/> %' => 1, '2 <br/> %' => 1, '1 <br/> %' => 1, 'n/a <br/> %' => 1);
        if(isset($teachersInvolved))
        {
            $this->widget('application.extensions.widgets.tables.Table', array(
                    'caption' => 'Преподаватели участвующие в программе',
                    'header' => $header,
                    'data' => $teachersInvolved,
                    'labels' => $questionsTeacher,
            ));
        }
        echo '</td>';
        echo '<td style="background:#ffffff;vertical-align:top">';
        if(isset($teachersNotInvolved))
        {
            $this->widget('application.extensions.widgets.tables.Table', array(
                    'caption' => 'Преподаватели не участвующие в программе',
                    'header' => $header,
                    'data' => $teachersNotInvolved,
                    'labels' => $questionsTeacher,
            ));
        }
        echo '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td style="background:#ffffff;vertical-align:top">';
        if(isset($studentsInvolved))
        {
            $this->widget('application.extensions.widgets.tables.Table', array(
                    'caption' => 'Студенты участвующие в программе',
                    'header' => $header,
                    'data' => $studentsInvolved,
                    'labels' => $questionsTeacher,
            ));
        }
        echo '</td>';
        echo '<td style="background:#ffffff;vertical-align:top">';
        if(isset($studentsNotInvolved))
        {
            $this->widget('application.extensions.widgets.tables.Table', array(
                    'caption' => 'Студенты не участвующие в программе',
                    'header' => $header,
                    'data' => $studentsNotInvolved,
                    'labels' => $questionsTeacher,
            ));
        }
        echo '</td>';
        echo '</tr>';
    ?>
</table>            

<div>
    <?php
        $legend = array('5','4','3','2','1','0');
        /*
        foreach($students as $question => $questionValue)
        {
            array_push($axes, Yii::t('answerstudent', $question));
        }
        */
        //var_dump('start');die();
        $array = array();
        foreach(array('5','4','3','2','1','0') as $index)
        {
            $array[$index] = array();
        }
        foreach($teachersInvolved as $key => $row)
        {
            //$data = array();
            foreach($row as $item => $value)
            {
                //var_dump($item . ' => ' . $value);
                array_push($array[$item], $value);
            }
            //$array[$key] = $data;
        }
        $axes = array();
        foreach($teachersInvolved as $question => $val)
        {
            array_push($axes, $question);
        }
        //var_dump($array);die();
        $this->widget('application.extensions.widgets.charts.BarChart', array(
                'data' => $array,
                'xAxes' => $axes,
                'legend' => $legend,
                'title' => 'Информация об методике преподавания (студенты)',
                //'colors' => $studentsMax['keys'],
                'name' => 'draw3',
                'rotation' => 90,
                'width' => 850,
                'height' => 400,
    ));?>
</div>
