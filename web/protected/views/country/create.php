<?php
/* @var $this CountryController */
/* @var $model Country */
/* @var $form CActiveForm */
$this->breadcrumbs=array(
        Yii::t('site', 'editor') => array('editor/index'),
	Yii::t('country', 'countries') => array('index'),
	Yii::t('country', 'creating'),
);
?>
<!--<h3><?php echo Yii::t('country', 'createcountry');?></h3>-->
<?php $this->renderPartial('_form', array('model'=>$model, 'read' => false));?>