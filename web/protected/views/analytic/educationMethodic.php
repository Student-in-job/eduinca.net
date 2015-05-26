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
<div style="width:65%">
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
        $legend = array('0' => 'n/a');
        $axes = array();
        foreach($teachersInvolved as $key => $row)
        {
            array_push($axes, Yii::t('analytic',$key));
        }
        $this->widget('application.extensions.widgets.charts.BarChart', array(
                'data' => $this->GetArrayTransform($teachersInvolved),
                'xAxes' => $axes,
                'legend' => $legend,
                'title' => 'Информация об методике преподавания (студенты)',
                //'colors' => $studentsMax['keys'],
                'name' => 'draw31',
                'rotation' => 90,
                'width' => 765,
                'height' => 750,
                'margin_bottom' => 350,
    ));?>
</div>
<div style="width:65%">
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
        $this->widget('application.extensions.widgets.charts.BarChart', array(
                'data' => $this->GetArrayTransform($teachersNotInvolved),
                'xAxes' => $axes,
                'legend' => $legend,
                'title' => 'Информация об методике преподавания (студенты)',
                //'colors' => $studentsMax['keys'],
                'name' => 'draw32',
                'rotation' => 90,
                'width' => 765,
                'height' => 750,
                'margin_bottom' => 350,
    ));?>
</div>
<div style="width:65%">  
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
        $axes = array();
        foreach($studentsInvolved as $key => $row)
        {
            array_push($axes, Yii::t('analytic',$key));
        }
        $this->widget('application.extensions.widgets.charts.BarChart', array(
                'data' => $this->GetArrayTransform($studentsInvolved),
                'xAxes' => $axes,
                'legend' => $legend,
                'title' => 'Информация об методике преподавания (студенты)',
                //'colors' => $studentsMax['keys'],
                'name' => 'draw33',
                'rotation' => 90,
                'width' => 765,
                'height' => 750,
                'margin_bottom' => 350,
    ));?>
</div>
<div style="width:65%"> 
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
        $this->widget('application.extensions.widgets.charts.BarChart', array(
                'data' => $this->GetArrayTransform($studentsNotInvolved),
                'xAxes' => $axes,
                //'legend' => $legend,
                'title' => 'Информация об методике преподавания (студенты)',
                //'colors' => $studentsMax['keys'],
                'name' => 'draw34',
                'rotation' => 90,
                'width' => 765,
                'height' => 750,
                'margin_bottom' => 350,
    ));?>
</div>