<?php
/* @var $this AnswerTeacherController */
/* @var $model AnswerTeacher */

$this->breadcrumbs=array(
	'Answer Teachers'=>array('index'),
	'Create',
);

/*$this->menu=array(
	array('label'=>'List AnswerTeacher', 'url'=>array('index')),
	array('label'=>'Manage AnswerTeacher', 'url'=>array('admin')),
);*/
?>

<h1>Create AnswerTeacher</h1>

<?php $this->renderPartial('_form', array(
                                'model'=>$model,
                                'view' => false,
                                'involved' => $involved,
                                'university' => $university,
                                'year' => 2014)); ?>