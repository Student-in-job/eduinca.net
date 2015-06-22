<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->breadcrumbs=array(
	Yii::t('analytic', 'analytic'),
);
?>
<ol style="padding-left:50px;list-style: decimal !important">
    <li><?php echo CHtml::link(Yii::t('analytic', 'common'), array('common')); ?></li>
    <li><?php echo CHtml::link(Yii::t('analytic', 'education_process'), array('educationProcess')); ?></li>
    <li><?php echo CHtml::link(Yii::t('analytic', 'education_methodic'), array('educationMethodic')); ?></li>
    <li><?php echo CHtml::link(Yii::t('analytic', 'education_labs'), array('educationLabs')); ?></li>
    <li><?php echo CHtml::link(Yii::t('analytic', 'education_diploma'), array('educationDiploma')); ?></li>
</ol>