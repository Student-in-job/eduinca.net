<?php
/* @var $this SurveyController */
/* @var $model Survey */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'survey-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Yii::t('site', 'requiredfields');?> <span class="required">*</span> <?php echo Yii::t('site', 'required')?>.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name_ru'); ?>
		<?php echo $form->textField($model,'name_ru',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'name_ru'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name_en'); ?>
		<?php echo $form->textField($model,'name_en',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'name_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year'); ?>
                <?php
                    $years = array();
                    for($increment = 0; $increment<10; $increment++)
                    {
                        $year = date('Y')-1+$increment;
                        $years[$year] = $year;
                    }
                ?>
		<?php echo $form->dropDownList($model,'year',$years); ?>
		<?php echo $form->error($model,'year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_till'); ?>
		<?php //echo $form->textField($model,'date_till'); ?>
                <?php
                    $this->widget('application.extensions.YiiDateTimePicker.jqueryDateTime',array(
                            'model' => $model,
                            'attribute' => 'date_till',
                            'options' => array(
                                    'lang' => Yii::app()->language,
                                    Yii::app()->language => array(
                                            'months' => Yii::t('survey', 'months'),
                                            'dayOfWeek' => Yii::t('survey', 'days_of_week'),
                                    ),
                                    'timepicker' => false,
                                    'closeOnDateSelect' => true,
                                    'format' => 'Y-m-d',
                                    'minDate' => 0,
                            ),
                    ));
                ?>
		<?php echo $form->error($model,'date_till'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('survey','create') : Yii::t('survey','save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->