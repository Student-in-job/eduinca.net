<?php
/* @var $this SettingsController */
/* @var $model Settings */
/* @var $form CActiveForm */

$this->breadcrumbs = array(
        Yii::t('site', 'settings') => array('settings/index'),
);

$this->menu = array(
	array('label' => Yii::t('settings', 'changepassword'), 'url' => array('update')),
        array('label' => Yii::t('user','create_user'), 'url' => array('user/create')),
	array('label' => Yii::t('user','manage_user'), 'url' => array('user/admin')),
);
?>

<h4>Екатерина Голубина</h4>
Администратор