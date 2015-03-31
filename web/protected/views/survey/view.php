<?php
/* @var $this SurveyController */
/* @var $model Survey */

$this->breadcrumbs=array(
	Yii::t('survey','surveys')=>array('index'),
	$model->id_survey,
);

?>

<h1>View Survey #<?php echo $model->id_survey; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_survey',
		'name_ru',
		'name_en',
		'year',
		'date_till',
	),
)); ?>
