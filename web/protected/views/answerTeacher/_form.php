<?php
/* @var $this AnswerTeacherController */
/* @var $model AnswerTeacher */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'answer-teacher-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_answer'); ?>
		<?php echo $form->textField($model,'id_answer'); ?>
		<?php echo $form->error($model,'id_answer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'age'); ?>
		<?php echo $form->textField($model,'age'); ?>
		<?php echo $form->error($model,'age'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sex'); ?>
		<?php echo $form->textField($model,'sex'); ?>
		<?php echo $form->error($model,'sex'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'faculty'); ?>
		<?php echo $form->textField($model,'faculty',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'faculty'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_teach'); ?>
		<?php echo $form->textField($model,'student_teach'); ?>
		<?php echo $form->error($model,'student_teach'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'common_q1'); ?>
		<?php echo $form->textField($model,'common_q1'); ?>
		<?php echo $form->error($model,'common_q1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'common_q2'); ?>
		<?php echo $form->textField($model,'common_q2'); ?>
		<?php echo $form->error($model,'common_q2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'common_q3'); ?>
		<?php echo $form->textField($model,'common_q3'); ?>
		<?php echo $form->error($model,'common_q3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'common_q4'); ?>
		<?php echo $form->textField($model,'common_q4'); ?>
		<?php echo $form->error($model,'common_q4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'common_q5'); ?>
		<?php echo $form->textField($model,'common_q5'); ?>
		<?php echo $form->error($model,'common_q5'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'common_q6'); ?>
		<?php echo $form->textField($model,'common_q6'); ?>
		<?php echo $form->error($model,'common_q6'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'common_q7'); ?>
		<?php echo $form->textField($model,'common_q7'); ?>
		<?php echo $form->error($model,'common_q7'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'common_q8'); ?>
		<?php echo $form->textField($model,'common_q8'); ?>
		<?php echo $form->error($model,'common_q8'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'common_q9'); ?>
		<?php echo $form->textField($model,'common_q9'); ?>
		<?php echo $form->error($model,'common_q9'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'common_comment'); ?>
		<?php echo $form->textField($model,'common_comment',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'common_comment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'methodic_q1'); ?>
		<?php echo $form->textField($model,'methodic_q1'); ?>
		<?php echo $form->error($model,'methodic_q1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'methodic_q2'); ?>
		<?php echo $form->textField($model,'methodic_q2'); ?>
		<?php echo $form->error($model,'methodic_q2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'methodic_q3'); ?>
		<?php echo $form->textField($model,'methodic_q3'); ?>
		<?php echo $form->error($model,'methodic_q3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'methodic_q4'); ?>
		<?php echo $form->textField($model,'methodic_q4'); ?>
		<?php echo $form->error($model,'methodic_q4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'methodic_q5'); ?>
		<?php echo $form->textField($model,'methodic_q5'); ?>
		<?php echo $form->error($model,'methodic_q5'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'methodic_q6'); ?>
		<?php echo $form->textField($model,'methodic_q6'); ?>
		<?php echo $form->error($model,'methodic_q6'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'methodic_q7'); ?>
		<?php echo $form->textField($model,'methodic_q7'); ?>
		<?php echo $form->error($model,'methodic_q7'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'methodic_q8'); ?>
		<?php echo $form->textField($model,'methodic_q8'); ?>
		<?php echo $form->error($model,'methodic_q8'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'methodic_q9'); ?>
		<?php echo $form->textField($model,'methodic_q9'); ?>
		<?php echo $form->error($model,'methodic_q9'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'methodic_q10'); ?>
		<?php echo $form->textField($model,'methodic_q10'); ?>
		<?php echo $form->error($model,'methodic_q10'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'methodic_q11'); ?>
		<?php echo $form->textField($model,'methodic_q11'); ?>
		<?php echo $form->error($model,'methodic_q11'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'methodic_q12'); ?>
		<?php echo $form->textField($model,'methodic_q12'); ?>
		<?php echo $form->error($model,'methodic_q12'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'methodic_q13'); ?>
		<?php echo $form->textField($model,'methodic_q13'); ?>
		<?php echo $form->error($model,'methodic_q13'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'methodic_comment'); ?>
		<?php echo $form->textField($model,'methodic_comment',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'methodic_comment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'labs'); ?>
		<?php echo $form->textField($model,'labs'); ?>
		<?php echo $form->error($model,'labs'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_labs'); ?>
		<?php echo $form->textField($model,'num_labs'); ?>
		<?php echo $form->error($model,'num_labs'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'labs_comment'); ?>
		<?php echo $form->textField($model,'labs_comment',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'labs_comment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'practice'); ?>
		<?php echo $form->textField($model,'practice'); ?>
		<?php echo $form->error($model,'practice'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'practice_place'); ?>
		<?php echo $form->textField($model,'practice_place'); ?>
		<?php echo $form->error($model,'practice_place'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'practice_duration'); ?>
		<?php echo $form->textField($model,'practice_duration'); ?>
		<?php echo $form->error($model,'practice_duration'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_of_papers'); ?>
		<?php echo $form->textField($model,'num_of_papers'); ?>
		<?php echo $form->error($model,'num_of_papers'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_of_papers_theoretical'); ?>
		<?php echo $form->textField($model,'num_of_papers_theoretical'); ?>
		<?php echo $form->error($model,'num_of_papers_theoretical'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_of_papers_practical'); ?>
		<?php echo $form->textField($model,'num_of_papers_practical'); ?>
		<?php echo $form->error($model,'num_of_papers_practical'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'private_papers'); ?>
		<?php echo $form->textField($model,'private_papers'); ?>
		<?php echo $form->error($model,'private_papers'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'private_comments'); ?>
		<?php echo $form->textField($model,'private_comments',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'private_comments'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'university_id'); ?>
		<?php echo $form->textField($model,'university_id'); ?>
		<?php echo $form->error($model,'university_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'person_type_id'); ?>
		<?php echo $form->textField($model,'person_type_id'); ?>
		<?php echo $form->error($model,'person_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'involved_person_id'); ?>
		<?php echo $form->textField($model,'involved_person_id'); ?>
		<?php echo $form->error($model,'involved_person_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->