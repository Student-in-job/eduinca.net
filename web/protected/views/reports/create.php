<?php
/* @var $this ReportsController */

$this->breadcrumbs=array(
	Yii::t('site', 'reports') => array('index'),
	Yii::t('reports', 'create'),
);
$this->renderPartial('_form', array(
        'model' => $model,
        'years' => $years,
        'countries' => $countries,
        'teachers_questions' => $teachers_questions,
        'students_questions' => $students_questions,
        'methodic' => $methodic,
));
