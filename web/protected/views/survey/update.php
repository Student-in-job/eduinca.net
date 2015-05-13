<?php
/* @var $this SurveyController */
/* @var $model Survey */

$this->breadcrumbs=array(
	Yii::t('survey','surveys')=>array('index'),
	//$model->id_survey=>array('view','id'=>$model->id_survey),
	Yii::t('survey','edit'),
);

?>

<!--<h3><?php echo Yii::t('survey', 'update_survey');?> <?php echo $model->id_survey; ?></h3>-->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>