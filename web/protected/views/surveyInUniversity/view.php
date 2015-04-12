<?php
/* @var $this SurveyInUniversityController */
/* @var $model SurveyInUniversity */

$this->breadcrumbs=array(
	'Survey In Universities'=>array('index'),
	$model->id_survey_in_university,
);
?>

<h1>View SurveyInUniversity #<?php echo $model->id_survey_in_university; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_survey_in_university',
		'survey_id',
		'university_id',
		'user_id',
		'university_type_id',
		'teachers_num',
		'students_num',
		'involved_teachers',
		'involved_students',
	),
)); ?>
