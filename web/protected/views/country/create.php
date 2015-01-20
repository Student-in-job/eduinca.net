<?php
/* @var $this CountryController */
/* @var $model Country */
/* @var $form CActiveForm */
$this->breadcrumbs=array(
	Yii::t('country', 'countries') => array('index'),
	Yii::t('country', 'creating'),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model, 'read' => false));?>