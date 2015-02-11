<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$this->breadcrumbs=array(
	Yii::t('analytic', 'Analytic') => array('index'),
        Yii::t('analitic', 'Total'),
);

?>

<h1>Statistic</h1>
<div>
    <?php
        $this->renderPartial('_table', array('data' => $dataTeacher, 'header' => $header, 'caption' => Yii::t('analytic', 'Teachers')));
    ?>
</div>
<div>
    <?php
        $this->renderPartial('_table', array('data' => $dataStudent, 'header' => $header, 'caption' => Yii::t('analytic', 'Students')));
    ?>
</div>