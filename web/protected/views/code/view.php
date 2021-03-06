<?php
/* @var $this CodeController */
/* @var $model Code */

$this->breadcrumbs=array(
	'Codes'=>array('index'),
	$model->id_code,
);

$this->menu=array(
	array('label'=>'List Code', 'url'=>array('index')),
	array('label'=>'Create Code', 'url'=>array('create')),
	array('label'=>'Update Code', 'url'=>array('update', 'id'=>$model->id_code)),
	array('label'=>'Delete Code', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_code),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Code', 'url'=>array('admin')),
);
?>

<h1>View Code #<?php echo $model->id_code; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_code',
		'code',
		'completed',
		'completed_date',
		'survey_in_university_id',
	),
)); ?>
