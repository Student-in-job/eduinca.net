<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs=array(
	'Students'=>array('index'),
	$model->id_answer=>array('view','id'=>$model->id_answer),
	'Update',
);

/*
$this->menu=array(
	array('label'=>'List Student', 'url'=>array('index')),
	array('label'=>'Create Student', 'url'=>array('create')),
	array('label'=>'View Student', 'url'=>array('view', 'id'=>$model->id_answer)),
	array('label'=>'Manage Student', 'url'=>array('admin')),
);
*/
?>

<!--<h3>Update Student <?php echo $model->id_answer; ?></h3>-->

<?php $this->renderPartial('_form', array(
                                'model'=>$model,
                                'view' => $view,
                                'university' => $university)); ?>