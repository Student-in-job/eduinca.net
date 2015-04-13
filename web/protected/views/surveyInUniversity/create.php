<?php
/* @var $this SurveyInUniversityController */
/* @var $model SurveyInUniversity */

$this->breadcrumbs=array(
	'Survey In Universities'=>array('index'),
	'Create',
);
?>

<h1>Create SurveyInUniversity</h1>

<?php
    $this->renderPartial('_form', array(
            'model'=>$model,
            'university' => $university,
            'user' => $user,
    )); ?>