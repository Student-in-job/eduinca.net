<?php
/* @var $this SurveyController */
/* @var $model Survey */

$this->breadcrumbs=array(
	Yii::t('survey', 'surveys')=>array('index'),
	Yii::t('survey', 'create'),
);
?>

<!--<h3><?php echo Yii::t('survey','create_survey')?></h3>-->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>