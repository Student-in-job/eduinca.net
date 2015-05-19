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
<div style="width:85%">
<?php
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
?>
</div>
<div>
    <?php
        $legend = array('5','4','3','2','1','0');
        $array = array();
        foreach(array('5','4','3','2','1','0') as $index)
        {
            $array[$index] = array();
        }
        $axes = array();
        foreach($teachersInvolved as $key => $row)
        {
            foreach($row as $item => $value)
            {
                array_push($array[$item], $value);
            }
            array_push($axes, $key);
        }
        $this->widget('application.extensions.widgets.charts.BarChart', array(
                'data' => $array,
                'xAxes' => $axes,
                //'legend' => $legend,
                'title' => 'Информация об методике преподавания (студенты)',
                //'colors' => $studentsMax['keys'],
                'name' => 'draw3',
                'rotation' => 90,
                'width' => 765,
                'height' => 400,
    ));?>
</div>
<div style="width:85%">
<?php
        if(isset($teachersNotInvolved))
        {
            $this->widget('application.extensions.widgets.tables.Table', array(
                    'caption' => 'Преподаватели не участвующие в программе',
                    'header' => $header,
                    'data' => $teachersNotInvolved,
                    'labels' => $questionsTeacher,
            ));
        }
?>
</div>
<div>
    <?php
        $array = array();
        foreach(array('5','4','3','2','1','0') as $index)
        {
            $array[$index] = array();
        }
        foreach($teachersNotInvolved as $key => $row)
        {
            foreach($row as $item => $value)
            {
                array_push($array[$item], $value);
            }
        }
        $this->widget('application.extensions.widgets.charts.BarChart', array(
                'data' => $array,
                'xAxes' => $axes,
                //'legend' => $legend,
                'title' => 'Информация об методике преподавания (студенты)',
                //'colors' => $studentsMax['keys'],
                'name' => 'draw4',
                'rotation' => 90,
                'width' => 765,
                'height' => 400,
    ));?>
</div>
<div style="width:85%">  
<?php
        
        if(isset($studentsInvolved))
        {
            $this->widget('application.extensions.widgets.tables.Table', array(
                    'caption' => 'Студенты участвующие в программе',
                    'header' => $header,
                    'data' => $studentsInvolved,
                    'labels' => $questionsTeacher,
            ));
        }
?>
</div>
<div>
    <?php
        $array = array();
        foreach(array('5','4','3','2','1','0') as $index)
        {
            $array[$index] = array();
        }
        $axes = array();
        foreach($studentsInvolved as $key => $row)
        {
            foreach($row as $item => $value)
            {
                array_push($array[$item], $value);
            }
            array_push($axes, $key);
        }
        $this->widget('application.extensions.widgets.charts.BarChart', array(
                'data' => $array,
                'xAxes' => $axes,
                //'legend' => $legend,
                'title' => 'Информация об методике преподавания (студенты)',
                //'colors' => $studentsMax['keys'],
                'name' => 'draw5',
                'rotation' => 90,
                'width' => 765,
                'height' => 400,
    ));?>
</div>
<div style="width:85%"> 
    <?php
        if(isset($studentsNotInvolved))
        {
            $this->widget('application.extensions.widgets.tables.Table', array(
                    'caption' => 'Студенты не участвующие в программе',
                    'header' => $header,
                    'data' => $studentsNotInvolved,
                    'labels' => $questionsTeacher,
            ));
        }
    ?>     
</div>
<div>
    <?php
        $array = array();
        foreach(array('5','4','3','2','1','0') as $index)
        {
            $array[$index] = array();
        }
        foreach($studentsNotInvolved as $key => $row)
        {
            foreach($row as $item => $value)
            {
                array_push($array[$item], $value);
            }
        }
        $this->widget('application.extensions.widgets.charts.BarChart', array(
                'data' => $array,
                'xAxes' => $axes,
                //'legend' => $legend,
                'title' => 'Информация об методике преподавания (студенты)',
                //'colors' => $studentsMax['keys'],
                'name' => 'draw6',
                'rotation' => 90,
                'width' => 765,
                'height' => 400,
    ));?>
</div>