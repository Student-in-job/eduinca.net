<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs=array(
	Yii::t('answerteacher','answerteacher') => array('/statistics/index'),
	Yii::t('answerstudents','answerstudents') => array('answer/index', 'person' => 2),
	Yii::t('answerteacher','update'),
);

/*
$this->menu=array(
	array('label'=>'List Student', 'url'=>array('index')),
	array('label'=>'Create Student', 'url'=>array('create')),
	array('label'=>'View Student', 'url'=>array('view', 'id'=>$model->id_answer)),
	array('label'=>'Manage Student', 'url'=>array('admin')),
);
*/
?>

<!--<h3>Update Student <?php echo $model->id_answer; ?></h3>-->

<?php $this->renderPartial('_form', array(
                                'model'=>$model,
                                'view' => $view,
                                'university' => $university)); ?>