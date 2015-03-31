<?php
/* @var $this SurveyInUniversityController */
/* @var $model SurveyInUniversity */

$this->breadcrumbs=array(
	'Survey In Universities'=>array('index'),
	$model->id_survey_in_university=>array('view','id'=>$model->id_survey_in_university),
	'Update',
);

$this->menu=array(
	array('label'=>'List SurveyInUniversity', 'url'=>array('index')),
	array('label'=>'Create SurveyInUniversity', 'url'=>array('create')),
	array('label'=>'View SurveyInUniversity', 'url'=>array('view', 'id'=>$model->id_survey_in_university)),
	array('label'=>'Manage SurveyInUniversity', 'url'=>array('admin')),
);
?>

<h1>Update SurveyInUniversity <?php echo $model->id_survey_in_university; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>