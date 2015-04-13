<?php
/* @var $this CountryController */
/* @var $model Country */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'country-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	//'enableAjaxValidation' => true,
)); ?>
        
	<p class="note">
            <?php echo Yii::t('site', 'requiredfields');?>
            &nbsp;<span class="required">*</span>&nbsp;
            <?php echo Yii::t('site', 'required');?>
        </p>
        
            
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_country'); ?>
		<?php echo $form->textField($model,'id_country', array('readonly' => $read)); ?>
		<?php echo $form->error($model,'id_country'); ?>
	</div>

<!--	<div class="row">
		<?php //echo $form->labelEx($model, 'code'); ?>
		<?php //echo $form->textField($model,'code',array('size'=>20,'maxlength'=>20)); ?>
		<?php //echo $form->error($model,'code'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'name_ru'); ?>
		<?php echo $form->textField($model,'name_ru',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'name_ru'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'name_en'); ?>
		<?php echo $form->textField($model,'name_en',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'name_en'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('site', 'create') : Yii::t('site', 'save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->