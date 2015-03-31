<?php
/* @var $this SettingsController */

$this->breadcrumbs=array(
	Yii::t('site','settings'),
);

$this->menu=array(
	array('label'=>Yii::t('site', 'users'), 'url'=>array('user/index')),
	//array('label'=>'Manage Survey', 'url'=>array('admin')),
);

?>