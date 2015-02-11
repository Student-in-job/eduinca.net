<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->breadcrumbs=array(
	Yii::t('analytic', 'Analytic'),
);
?>

<h1>Statistic</h1>
<ul>
    <li><?php echo CHtml::link('Total', array('view', 'type' => 1)); ?></li>
</ul>