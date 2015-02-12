<?php

/* 
 * To change tose License Headers in Project Properties.
 * To change this  file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->breadcrumbs=array(
	Yii::t('analytic', 'Analytic') => array('index'),
        Yii::t('analitic', 'Total'),
);
?>

<h1>Statistic</h1>
<script class="include" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/jquery.jqplot.js"></script>
<script class="include" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/plugins/jqplot.barRenderer.js"></script>
<script class="include" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/plugins/jqplot.categoryAxisRenderer.js"></script>
<?php
    $outputString = '[[5,1], [1,2], [3,3], [4,4]], [[4,1], [7,2], [1,3], [2,4]]';

    $this->renderPartial('_hBar', array('data' => $outputString));
