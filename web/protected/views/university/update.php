<?php
/* @var $this UniversityController */
/* @var $model University */

$this->breadcrumbs=array(
	Yii::t('university', 'universities')=>array('index'),
	$model->name=>array('view','id'=>$model->id_university),
	Yii::t('university', 'updating'),
);
/*
$this->menu=array(
	array('label'=>'List University', 'url'=>array('index')),
	array('label'=>'Create University', 'url'=>array('create')),
	array('label'=>'View University', 'url'=>array('view', 'id'=>$model->id_university)),
	array('label'=>'Manage University', 'url'=>array('admin')),
);
*/
?>

<h1>Update University <?php echo $model->id_university; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'country'=>$data, 'universityType'=>$type, 'read' => true)); ?>