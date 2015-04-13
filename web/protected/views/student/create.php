<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs=array(
	'Students'=>array('answer/index'),
	'Create',
);

/*
$this->menu=array(
	array('label'=>'List Student', 'url'=>array('index')),
	array('label'=>'Manage Student', 'url'=>array('admin')),
);*/
?>

<h1><?php echo Yii::t('answerstudent', 'interview');?></h1>

<?php $this->renderPartial('_form', array(
                                'model'=>$model,
                                'view' => false,
                                'university' => $university)); ?>