<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->breadcrumbs=array(
	Yii::t('site', 'analytic'),
);
?>
<ol style="padding-left:50px;list-style: decimal !important">
    <li><?php echo CHtml::link(Yii::t('analytic', 'common'), array('common')); ?></li>
    <li><?php echo CHtml::link(Yii::t('analytic', 'education_process'), array('educationProcess')); ?></li>
    <li><?php echo CHtml::link(Yii::t('analytic', 'education_methodic'), array('educationMethodic')); ?></li>
    <li><?php echo CHtml::link(Yii::t('analytic', 'test'), array('test')); ?></li>
</ol>
<br/><br/>
<!--<h1>Statistic</h1>-->
<ul>
    <li><?php //echo CHtml::link('Total', array('view', 'type' => 1)); ?></li>
    <li><?php echo CHtml::link('Methodic', array('view', 'type' => 2)); ?></li>
    <li><?php echo CHtml::link('Frequency', array('view', 'type' => 3)); ?></li>
    <li><?php echo CHtml::link('HBars', array('view', 'type' => 4)); ?></li>
    <li><?php echo CHtml::link('Papers', array('view', 'type' => 5)); ?></li>
</ul>