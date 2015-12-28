<?php
/* @var $this ReportsController */
/* @var $model Reports */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reports-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php echo Yii::t('site', 'requiredfields');?> <span class="required">*</span> <?php echo Yii::t('site', 'required')?>.</p>

	<?php echo $form->errorSummary($model); ?>
        <?php echo $form->hiddenField($model, 'created_date', array('value' => date('Y-m-d'))); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year'); ?>
		<?php echo $form->dropDownList($model,'year', $years); ?>
		<?php echo $form->error($model,'year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'countries'); ?>
		<?php echo $form->checkBoxList($model,'countries',$countries); ?>
		<?php echo $form->error($model,'countries'); ?>
	</div>
        
	<div class="row">
            <?php echo $form->labelEx($model,'chapter2'); ?>
            <table>
                <thead>
                    <tr>
                        <th style="text-align:center;font-weight:bold"><?php echo Yii::t('answer','teachers');?></th>
                        <th style="text-align:center;font-weight:bold"><?php echo Yii::t('answer','students');?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $form->checkBoxList($model,'teachers_questions',$teachers_questions); ?></td>
                        <td><?php echo $form->checkBoxList($model,'students_questions',$students_questions); ?></td>
                    </tr>
                </tbody>
            </table>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'chapter3'); ?>
		<?php echo $form->checkBoxList($model,'chapter3',$methodic); ?>
		<?php echo $form->error($model,'chapter3'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('site', 'create')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
