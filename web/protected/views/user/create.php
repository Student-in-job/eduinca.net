<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	Yii::t('site','settings') => array('settings/index'),
        Yii::t('site', 'users') => array('index'),
	Yii::t('user', 'create_user'),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>