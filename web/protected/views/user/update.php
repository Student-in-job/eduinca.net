<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	Yii::t('site','settings') => array('settings/index'),
        Yii::t('site', 'users')=>array('index'),
	Yii::t('user','updating'),
);
?>

<h1>Update User <?php echo $model->id_user; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>