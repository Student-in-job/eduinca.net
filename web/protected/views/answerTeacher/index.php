<?php
/* @var $this AnswerTeacherController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Answer Teachers',
);

$this->menu=array(
	array('label'=>'Create AnswerTeacher', 'url'=>array('answerteacher/create')),
	array('label'=>'Create AnswerStudent', 'url'=>array('answerstudent/admin')),
);
?>

<h1>Answer Teachers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
