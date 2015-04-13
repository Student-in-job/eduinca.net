<?php
/* @var $this CountryController */
/* @var $model Country */

$this->breadcrumbs=array(
        Yii::t('site', 'editor') => array('editor/index'),
	'Countries'=>array('index'),
	$model->name,
);

/*$this->menu=array(
	array('label'=>'List Country', 'url'=>array('index')),
	array('label'=>'Create Country', 'url'=>array('create')),
	array('label'=>'Update Country', 'url'=>array('update', 'id'=>$model->id_country)),
	array('label'=>'Delete Country', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_country),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Country', 'url'=>array('admin')),
);*/
?>

<h1>View Country #<?php echo $model->id_country; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_country',
		'code',
		'name',
	),
)); ?>

<?php echo CHtml::link(Yii::t('site','back'),array('index'))?>