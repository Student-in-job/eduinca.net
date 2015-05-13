<?php
/* @var $this CountryController */
/* @var $model Country */

$this->breadcrumbs=array(
        Yii::t('site', 'editor') => array('editor/index'),
	Yii::t('country', 'countries') => array('index'),
	$model->getAttribute('name_'  . Yii::app()->language),
);
?>

<!--<h1>View Country #<?php //echo $model->id_country; ?></h1>-->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_country',
		//'code',
		'name_' . Yii::app()->language,
	),
)); ?>

<?php //echo CHtml::link(Yii::t('site','back'),array('index')); ?>