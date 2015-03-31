<?php
/* @var $this CodeController */
/* @var $model Code */

$this->breadcrumbs=array(
	'Codes'=>array('index'),
	$model->id_code=>array('view','id'=>$model->id_code),
	'Update',
);

$this->menu=array(
	array('label'=>'List Code', 'url'=>array('index')),
	array('label'=>'Create Code', 'url'=>array('create')),
	array('label'=>'View Code', 'url'=>array('view', 'id'=>$model->id_code)),
	array('label'=>'Manage Code', 'url'=>array('admin')),
);
?>

<h1>Update Code <?php echo $model->id_code; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>