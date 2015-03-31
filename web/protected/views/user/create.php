<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	Yii::t('site','settings') => array('settings/index'),
        Yii::t('site', 'users')=>array('index'),
	Yii::t('user', 'create_user'),
);
?>

<h1><?php echo Yii::t('site','user');?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>