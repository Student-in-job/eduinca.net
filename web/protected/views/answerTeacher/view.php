<?php
/* @var $this AnswerTeacherController */
/* @var $model AnswerTeacher */

$this->breadcrumbs=array(
	'Answer Teachers'=>array('index'),
	$model->id_answer,
);

$this->menu=array(
	array('label'=>'List AnswerTeacher', 'url'=>array('index')),
	array('label'=>'Create AnswerTeacher', 'url'=>array('create')),
	array('label'=>'Update AnswerTeacher', 'url'=>array('update', 'id'=>$model->id_answer)),
	array('label'=>'Delete AnswerTeacher', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_answer),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AnswerTeacher', 'url'=>array('admin')),
);
?>

<h1>View AnswerTeacher #<?php echo $model->id_answer; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_answer',
		'code',
		'age',
		'sex',
		'faculty',
		'student_teach',
		'common_q1',
		'common_q2',
		'common_q3',
		'common_q4',
		'common_q5',
		'common_q6',
		'common_q7',
		'common_q8',
		'common_q9',
		'common_comment',
		'methodic_q1',
		'methodic_q2',
		'methodic_q3',
		'methodic_q4',
		'methodic_q5',
		'methodic_q6',
		'methodic_q7',
		'methodic_q8',
		'methodic_q9',
		'methodic_q10',
		'methodic_q11',
		'methodic_q12',
		'methodic_q13',
		'methodic_comment',
		'labs',
		'num_labs',
		'labs_comment',
		'practice',
		'practice_place',
		'practice_duration',
		'num_of_papers',
		'num_of_papers_theoretical',
		'num_of_papers_practical',
		'private_papers',
		'private_comments',
		'university_id',
		'person_type_id',
		'involved_person_id',
	),
)); ?>
