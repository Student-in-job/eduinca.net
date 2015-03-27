<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$this->breadcrumbs=array(
	Yii::t('analytic', 'Analytic') => array('index'),
        Yii::t('analitic', 'Papers'),
);

$data = array_merge($dataN,$dataY);
$index = 0;
foreach($data as $key => $value)
{
    $title = $key;
    $yes = (array_key_exists($key, $dataY))? $dataY[$key] : 0;
    $no = (array_key_exists($key, $dataN))? $dataN[$key] : 0;
    $outputString = '[\'' . Yii::t('analytic', 'yes') . '\',' . $yes . '],[\'' . Yii::t('analytic', 'no') . '\',' . $no . ']';
    //var_dump($outputString);
    $this->renderPartial('_pieChart', array('data' => $outputString, 'id' => 'id' . $index, 'title' => $key));
    $index++;
}
?>

<script class="include" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/jquery.jqplot.js"></script>
<script class="include" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/plugins/jqplot.pieRenderer.js"></script>
