<?php
/* @var $this SurveyInUniversityController */
/* @var $model SurveyInUniversity */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'survey-in-university-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'survey_id'); ?>
		<?php echo $form->hiddenField($model,'survey_id'); ?>
		<?php //echo $form->error($model,'survey_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'university_id'); ?>
		<?php echo $form->dropDownlist($model,'university_id', $university); ?>
		<?php echo $form->error($model,'university_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->dropDownlist($model,'user_id', $user); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'university_type_id'); ?>
		<?php echo $form->hiddenField($model,'university_type_id'); ?>
		<?php //echo $form->error($model,'university_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'teachers_num'); ?>
		<?php echo $form->textField($model,'teachers_num'); ?>
		<?php echo $form->error($model,'teachers_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'students_num'); ?>
		<?php echo $form->textField($model,'students_num'); ?>
		<?php echo $form->error($model,'students_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'involved_teachers'); ?>
		<?php echo $form->textField($model,'involved_teachers'); ?>
		<?php echo $form->error($model,'involved_teachers'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'involved_students'); ?>
		<?php echo $form->textField($model,'involved_students'); ?>
		<?php echo $form->error($model,'involved_students'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->