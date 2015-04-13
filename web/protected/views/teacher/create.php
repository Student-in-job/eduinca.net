<?php
/* @var $this AnswerTeacherController */
/* @var $model AnswerTeacher */

$this->breadcrumbs=array(
	'Answer Teachers'=>array('answer/index'),
	'Create',
);

/*$this->menu=array(
	array('label'=>'List AnswerTeacher', 'url'=>array('index')),
	array('label'=>'Manage AnswerTeacher', 'url'=>array('admin')),
);*/
?>

<h1><?php echo Yii::t('answerteacher', 'interview');?></h1>

<?php $this->renderPartial('_form', array(
                                'model'=>$model,
                                'view' => false,
                                'university' => $university)); ?>