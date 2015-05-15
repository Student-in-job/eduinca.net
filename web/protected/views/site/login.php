<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('site', 'login');
$this->breadcrumbs=array(
	Yii::t('site', 'login'),
);
?>

<!--<h3><?php echo Yii::t('site', 'login'); ?></h3>-->

<p><?php echo Yii::t('site', 'loginmessage'); ?>:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
	'validateOnSubmit'=>true,
	),
)); ?>

    <p class="note"><?php echo Yii::t('site', 'requiredfields'); ?>&nbsp;<span class="required">*</span>&nbsp;<?php echo Yii::t('site', 'required')?>.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
<!--
	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>
--><br>	
	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('site', 'login')); ?>
	</div>
<br>
<?php $this->endWidget(); ?>
</div><!-- form -->
