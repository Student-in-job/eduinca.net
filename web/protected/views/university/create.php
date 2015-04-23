<?php
/* @var $this UniversityController */
/* @var $model University */

$this->breadcrumbs=array(
        Yii::t('site', 'editor') => array('editor/index'),
	Yii::t('university','educational') => array('index'),
	Yii::t('university', 'creating'),
);
/*
$this->menu=array(
	array('label'=>'List University', 'url'=>array('index')),
	array('label'=>'Manage University', 'url'=>array('admin')),
);*/
?>

<!--<h3><?php echo Yii::t('university','createuniversity');?></h3>-->

<?php $this->renderPartial('_form', array('model'=>$model, 'country'=>$data, 'universityType'=>$type, 'read' => false)); ?>
