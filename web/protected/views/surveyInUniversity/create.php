<?php
/* @var $this SurveyInUniversityController */
/* @var $model SurveyInUniversity */

$this->breadcrumbs=array(
	'Survey In Universities'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SurveyInUniversity', 'url'=>array('index')),
	array('label'=>'Manage SurveyInUniversity', 'url'=>array('admin')),
);
?>

<h1>Create SurveyInUniversity</h1>



<?php
    //var_dump($user);
    $this->renderPartial('_form', array(
            'model'=>$model,
            'university' => $university,
            'user' => $user,
    )); ?>