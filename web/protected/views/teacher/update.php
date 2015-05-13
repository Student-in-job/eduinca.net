<?php
/* @var $this AnswerTeacherController */
/* @var $model AnswerTeacher */

$this->breadcrumbs=array(
	Yii::t('answerteacher','answerteacher') => array('/statistics/index'),
	Yii::t('answerteacher','answerteachers') => array('answer/index', 'person' => 1),
	Yii::t('answerteacher','update'),
);
/*
$this->menu=array(
	array('label'=>'List AnswerTeacher', 'url'=>array('index')),
	array('label'=>'Create AnswerTeacher', 'url'=>array('create')),
	array('label'=>'View AnswerTeacher', 'url'=>array('view', 'id'=>$model->id_answer)),
	array('label'=>'Manage AnswerTeacher', 'url'=>array('admin')),
);*/
?>

<!--<h3><?php echo Yii::t('answerteacher', 'interview');?></h3>-->

<?php $this->renderPartial('_form', array(
                                'model'=>$model,
                                'view' => $view,
                                'university' => $university)); ?>