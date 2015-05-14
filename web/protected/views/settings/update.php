<?php
/* @var $this SettingsController */
/* @var $model Settings */

$this->breadcrumbs=array(
    Yii::t('site', 'settings') => array('settings/index'),
	Yii::t('settings', 'changepassword'),	
);
?>
<?php $this->renderPartial('_form', array('model'=>$model, 'read' => true)); ?>