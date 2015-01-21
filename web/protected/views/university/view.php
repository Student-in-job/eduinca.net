<?php
/* @var $this UniversityController */
/* @var $model University */

$this->breadcrumbs=array(
	Yii::t('university', 'universities')=>array('index'),
	$model->name,
);
/*
$this->menu=array(
	array('label'=>'List University', 'url'=>array('index')),
	array('label'=>'Create University', 'url'=>array('create')),
	array('label'=>'Update University', 'url'=>array('update', 'id'=>$model->id_university)),
	array('label'=>'Delete University', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_university),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage University', 'url'=>array('admin')),
);
 */
?>

<h1>View University #<?php echo $model->id_university; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_university',
		'code',
		'name',
		array('name' => 'university_type_id', 'value' => $type[$model->university_type_id]),
		array('name' => 'country_id','value' => $country[$model->country_id])
	),
)); ?>

<?php echo CHtml::link(Yii::t('site','back'),array('index'))?>