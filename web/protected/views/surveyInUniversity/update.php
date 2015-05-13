<?php
/* @var $this SurveyInUniversityController */
/* @var $model SurveyInUniversity */

$this->breadcrumbs=array(
	'Survey In Universities'=>array('index'),
	$model->id_survey_in_university=>array('view','id'=>$model->id_survey_in_university),
	'Update',
);
?>

<!--<h3>Update SurveyInUniversity <?php echo $model->id_survey_in_university; ?></h3>-->

<?php
    $this->renderPartial('_form', array(
            'model'=>$model,
            'university' => $university,
            'user' => $user,
    )); ?>