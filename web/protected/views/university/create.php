<?php
/* @var $this UniversityController */
/* @var $model University */

$this->breadcrumbs=array(
	Yii::t('university','universities') => array('index'),
	Yii::t('university', 'creating'),
);
/*
$this->menu=array(
	array('label'=>'List University', 'url'=>array('index')),
	array('label'=>'Manage University', 'url'=>array('admin')),
);*/
?>

<h1>Create University</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'country'=>$data, 'universityType'=>$type, 'read' => false)); ?>
