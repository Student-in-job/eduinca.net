<?php
/* @var $this SurveyInUniversityController */
/* @var $model SurveyInUniversity */

$this->breadcrumbs=array(
	'Survey In Universities'=>array('index'),
	$model->id_survey_in_university,
);

$this->menu=array(
	array('label'=>'List SurveyInUniversity', 'url'=>array('index')),
	array('label'=>'Create SurveyInUniversity', 'url'=>array('create')),
	array('label'=>'Update SurveyInUniversity', 'url'=>array('update', 'id'=>$model->id_survey_in_university)),
	array('label'=>'Delete SurveyInUniversity', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_survey_in_university),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SurveyInUniversity', 'url'=>array('admin')),
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
