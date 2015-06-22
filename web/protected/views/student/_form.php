<?php
/* @var $this StudentController */
/* @var $model Student */
/* @var $form CActiveForm */
?>

<style type="text/css">
table tbody tr td {vertical-align: middle;}
table td, table tbody tr, table tbody tr td {background:none;}
</style>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">
            <?php echo Yii::t('site', 'requiredfields');?>  
            &nbsp;<span class="required">*</span>&nbsp;
            <?php echo Yii::t('site', 'required');?>
        </p>

        <div class="row">
                <?php $model->person_type_id = 2?>
                <?php echo $form->hiddenField($model,'person_type_id'); ?>
                <?php echo $form->hiddenField($model,'involved_person_id'); ?>
                <?php echo $form->error($model,'involved_person_id'); ?>
                <?php echo $form->hiddenField($model,'id_answer'); ?>
                <?php echo $form->error($model,'id_answer');?>
        </div>

	<?php echo $form->errorSummary($model); ?>

        <div>
            <table>
                <!--<tr><td colspan="2"><h4><?php echo Yii::t('answerstudent', 'header');?></h4></td></tr>-->
                <tr>
                    <td>
                        <?php echo $form->labelEx($model,'year'); ?>
                        <?php echo $form->textField($model,'year', array('readonly' => 'true')); ?>                        
                    </td>
                    <td>
                        <?php echo $form->labelEx($model,'university_id'); ?>
                        <?php echo $form->hiddenField($model, 'university_id');?>
                        <?php echo CHtml::textField('n', $university[$model->university_id], array('disabled' => 'true', 'style' => 'width:500px')); ?>
                        <?php echo $form->error($model,'university_id'); ?>
                    </td>
                </tr>   
                <tr>
                    <td>
                        <?php echo $form->labelEx($model,'involved_person_id'); ?>
                        <?php echo $form->textField($model,'involved_name', array('readonly' => 'true')); ?>
                        
                    </td>
                    <td>
                        <?php echo $form->labelEx($model,'code'); ?>
                        <?php echo $form->textField($model,'code',array('size'=>20,'maxlength'=>20)); ?>
                        <?php echo $form->error($model,'code'); ?>
                    </td>
                </tr>
            </table>
        </div>

	<div class="row">
		<?php $req = $model->isAttributeRequired('age')?' *': '';?>
		<?php echo CHtml::label('1. ' . Yii::t('answerteacher','age') . $req,'');?>
		<?php echo $form->textField($model,'age'); ?>
		<?php echo $form->error($model,'age'); ?>
	</div>

	<div class="row">
		<?php $req = $model->isAttributeRequired('sex')?' *': '';?>
		<?php echo CHtml::label('2. ' . Yii::t('answerstudent','sex') . $req,'');?>
	</div>

        <table style="width: 250px;">
            <tr>
                <td><?php echo $form->radioButton($model, 'sex', array('value' => '1', 'uncheckValue' => null)); echo Yii::t('answer', 'man')?></td>
                <td><?php echo $form->radioButton($model, 'sex', array('value' => '0', 'uncheckValue' => null)); echo Yii::t('answer', 'woman');?></td>
            </tr>
        </table><?php echo $form->error($model,'sex'); ?>

	<div class="row">
		<?php $req = $model->isAttributeRequired('faculty')?' *': '';?>
		<?php echo CHtml::label('3. ' . Yii::t('answerstudent','faculty') . $req,'');?>
		<?php echo $form->textField($model,'faculty',array('size'=>60,'maxlength'=>100, 'style' => 'width:450px;')); ?>
		<?php echo $form->error($model,'faculty'); ?>
	</div>

	<div class="row">
		<?php $req = $model->isAttributeRequired('speciality')?' *': '';?>
		<?php echo CHtml::label('4. ' . Yii::t('answerstudent','speciality') . $req,'');?>
		<?php echo $form->textField($model,'speciality',array('size'=>60,'maxlength'=>100, 'style' => 'width:450px;')); ?>
		<?php echo $form->error($model,'speciality'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::label('5. ' . Yii::t('answerstudent','diploma'),'');?>
                <div style="padding-left: 15px;">
                <?php echo $form->radioButton($model,'diploma', array('value' => '1', 'uncheckValue' => null)); echo '   ' . Yii::t('answerstudent','diploma1');?>
                <br/>
                <?php echo $form->radioButton($model,'diploma', array('value' => '2', 'uncheckValue' => null)); echo '   ' . Yii::t('answerstudent','diploma2');?>
                <br/>
                <?php echo $form->radioButton($model,'diploma', array('value' => '3', 'uncheckValue' => null)); echo '   ' . Yii::t('answerstudent','diploma3');?>
                <br/>
                <?php echo $form->radioButton($model,'diploma', array('value' => '4', 'uncheckValue' => null)); echo '   ' . Yii::t('answerstudent','diploma4');?>
                <?php echo $form->error($model,'diploma'); ?>
	</div>

        <div class="row">
                <?php echo CHtml::label('6. ' . Yii::t('answerstudent','study'),'');?>
        </div>
        
        <table style="max-width: 300px;">
            <tr>
                <td>
                    <?php echo $form->labelEx($model,'study_from'); ?>
                    <?php $this->widget('CMaskedTextField', array(
                        'mask' => '99/9999',
                        'placeholder' => 'x',
                        //'completed' => 'function(){alert(1);}',
                        'model' => $model,
                        'name' => 'Student[study_from]',
                        'value' => $model->study_from,
                        'htmlOptions' => array('style' => 'width: 90px;'),
                    ));?>
                </td>
                <td>
                    <?php echo $form->labelEx($model,'study_till'); ?>
                    <?php $this->widget('CMaskedTextField', array(
                        'mask' => '99/9999',
                        'placeholder' => 'x',
                        //'completed' => 'function(){alert(1);}',
                        'model' => $model,
                        'name' => 'Student[study_till]',
                        'value' => $model->study_till,
                        'htmlOptions' => array('style' => 'width: 90px;'),
                    ));?>
                </td>
            </tr>
        </table>
		<?php echo $form->error($model,'study_from'); ?>
                <?php echo $form->error($model,'study_till'); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'course'); ?>
		<?php echo $form->radioButton($model,'course', array('value' => '1', 'uncheckValue' => null)); echo '   ' . Yii::t('answerstudent','course1');?>
                <?php echo $form->radioButton($model,'course', array('value' => '2', 'uncheckValue' => null)); echo '   ' . Yii::t('answerstudent','course2');?>
                <?php echo $form->radioButton($model,'course', array('value' => '3', 'uncheckValue' => null)); echo '   ' . Yii::t('answerstudent','course3');?>
                <?php echo $form->radioButton($model,'course', array('value' => '4', 'uncheckValue' => null)); echo '   ' . Yii::t('answerstudent','course4');?>
		<?php echo $form->error($model,'course'); ?>
	</div>
            
        <div class='row'>
                <?php echo CHtml::label('8. ' . Yii::t('answerstudent','common'),'');?>
        </div>

	<table class='table-bordered'>
            <thead>
                <tr>
                    <td style="width: 650px"></td>
                    <td><?php echo Yii::t('answerstudent', 'common_answer5');?></td>
                    <td><?php echo Yii::t('answerstudent', 'common_answer4');?></td>
                    <td><?php echo Yii::t('answerstudent', 'common_answer3');?></td>
                    <td><?php echo Yii::t('answerstudent', 'common_answer2');?></td>
                    <td><?php echo Yii::t('answerstudent', 'common_answer1');?></td>
                    <td><?php echo Yii::t('answerstudent', 'common_answer0');?></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $form->labelEx($model,'common_q1'); ?></td>
                    <td><?php echo $form->radioButton($model, 'common_q1', array('value' => '5', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q1', array('value' => '4', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q1', array('value' => '3', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q1', array('value' => '2', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q1', array('value' => '1', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q1', array('value' => '0', 'uncheckValue' => null));?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'common_q2'); ?></td>
                    <td><?php echo $form->radioButton($model, 'common_q2', array('value' => '5', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q2', array('value' => '4', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q2', array('value' => '3', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q2', array('value' => '2', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q2', array('value' => '1', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q2', array('value' => '0', 'uncheckValue' => null));?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'common_q3'); ?></td>
                    <td><?php echo $form->radioButton($model, 'common_q3', array('value' => '5', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q3', array('value' => '4', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q3', array('value' => '3', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q3', array('value' => '2', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q3', array('value' => '1', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q3', array('value' => '0', 'uncheckValue' => null));?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'common_q4'); ?></td>
                    <td><?php echo $form->radioButton($model, 'common_q4', array('value' => '5', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q4', array('value' => '4', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q4', array('value' => '3', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q4', array('value' => '2', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q4', array('value' => '1', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q4', array('value' => '0', 'uncheckValue' => null));?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'common_q5'); ?></td>
                    <td><?php echo $form->radioButton($model, 'common_q5', array('value' => '5', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q5', array('value' => '4', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q5', array('value' => '3', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q5', array('value' => '2', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q5', array('value' => '1', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q5', array('value' => '0', 'uncheckValue' => null));?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'common_q6'); ?></td>
                    <td><?php echo $form->radioButton($model, 'common_q6', array('value' => '5', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q6', array('value' => '4', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q6', array('value' => '3', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q6', array('value' => '2', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q6', array('value' => '1', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q6', array('value' => '0', 'uncheckValue' => null));?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'common_q7'); ?></td>
                    <td><?php echo $form->radioButton($model, 'common_q7', array('value' => '5', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q7', array('value' => '4', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q7', array('value' => '3', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q7', array('value' => '2', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q7', array('value' => '1', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q7', array('value' => '0', 'uncheckValue' => null));?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'common_q8'); ?></td>
                    <td><?php echo $form->radioButton($model, 'common_q8', array('value' => '5', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q8', array('value' => '4', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q8', array('value' => '3', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q8', array('value' => '2', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q8', array('value' => '1', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q8', array('value' => '0', 'uncheckValue' => null));?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'common_q9'); ?></td>
                    <td><?php echo $form->radioButton($model, 'common_q9', array('value' => '5', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q9', array('value' => '4', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q9', array('value' => '3', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q9', array('value' => '2', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q9', array('value' => '1', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q9', array('value' => '0', 'uncheckValue' => null));?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'common_q10'); ?></td>
                    <td><?php echo $form->radioButton($model, 'common_q10', array('value' => '5', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q10', array('value' => '4', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q10', array('value' => '3', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q10', array('value' => '2', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q10', array('value' => '1', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q10', array('value' => '0', 'uncheckValue' => null));?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'common_q11'); ?></td>
                    <td><?php echo $form->radioButton($model, 'common_q11', array('value' => '5', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q11', array('value' => '4', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q11', array('value' => '3', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q11', array('value' => '2', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q11', array('value' => '1', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'common_q11', array('value' => '0', 'uncheckValue' => null));?></td>
                </tr>
            </tbody>
        </table>

	<div class="row">
		<?php echo $form->labelEx($model,'common_comment'); ?>
		<?php echo $form->textField($model,'common_comment',array('size'=>60,'maxlength'=>250, 'style' => 'width:100%;')); ?>
		<?php echo $form->error($model,'common_comment'); ?>
	</div>

        <div class='row'>
                <?php echo CHtml::label('9. ' . Yii::t('answerstudent','methodic'),'');?>
        </div>    
            
	<table class='table-bordered'>
            <thead>
                <tr>
                    <td style="width: 650px"></td>
                    <td><?php echo Yii::t('answerstudent', 'methodic_answer5');?></td>
                    <td><?php echo Yii::t('answerstudent', 'methodic_answer4');?></td>
                    <td><?php echo Yii::t('answerstudent', 'methodic_answer3');?></td>
                    <td><?php echo Yii::t('answerstudent', 'methodic_answer2');?></td>
                    <td><?php echo Yii::t('answerstudent', 'methodic_answer1');?></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $form->labelEx($model,'methodic_q1'); ?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q1', array('value' => '5', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q1', array('value' => '4', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q1', array('value' => '3', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q1', array('value' => '2', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q1', array('value' => '1', 'uncheckValue' => null));?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'methodic_q2'); ?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q2', array('value' => '5', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q2', array('value' => '4', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q2', array('value' => '3', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q2', array('value' => '2', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q2', array('value' => '1', 'uncheckValue' => null));?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'methodic_q3'); ?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q3', array('value' => '5', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q3', array('value' => '4', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q3', array('value' => '3', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q3', array('value' => '2', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q3', array('value' => '1', 'uncheckValue' => null));?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'methodic_q4'); ?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q4', array('value' => '5', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q4', array('value' => '4', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q4', array('value' => '3', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q4', array('value' => '2', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q4', array('value' => '1', 'uncheckValue' => null));?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'methodic_q5'); ?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q5', array('value' => '5', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q5', array('value' => '4', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q5', array('value' => '3', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q5', array('value' => '2', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q5', array('value' => '1', 'uncheckValue' => null));?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'methodic_q6'); ?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q6', array('value' => '5', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q6', array('value' => '4', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q6', array('value' => '3', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q6', array('value' => '2', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q6', array('value' => '1', 'uncheckValue' => null));?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'methodic_q7'); ?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q7', array('value' => '5', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q7', array('value' => '4', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q7', array('value' => '3', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q7', array('value' => '2', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q7', array('value' => '1', 'uncheckValue' => null));?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'methodic_q8'); ?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q8', array('value' => '5', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q8', array('value' => '4', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q8', array('value' => '3', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q8', array('value' => '2', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q8', array('value' => '1', 'uncheckValue' => null));?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'methodic_q9'); ?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q9', array('value' => '5', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q9', array('value' => '4', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q9', array('value' => '3', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q9', array('value' => '2', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q9', array('value' => '1', 'uncheckValue' => null));?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'methodic_q10'); ?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q10', array('value' => '5', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q10', array('value' => '4', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q10', array('value' => '3', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q10', array('value' => '2', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q10', array('value' => '1', 'uncheckValue' => null));?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'methodic_q11'); ?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q11', array('value' => '5', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q11', array('value' => '4', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q11', array('value' => '3', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q11', array('value' => '2', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q11', array('value' => '1', 'uncheckValue' => null));?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'methodic_q12'); ?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q12', array('value' => '5', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q12', array('value' => '4', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q12', array('value' => '3', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q12', array('value' => '2', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q12', array('value' => '1', 'uncheckValue' => null));?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'methodic_q13'); ?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q13', array('value' => '5', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q13', array('value' => '4', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q13', array('value' => '3', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q13', array('value' => '2', 'uncheckValue' => null));?></td>
                    <td><?php echo $form->radioButton($model, 'methodic_q13', array('value' => '1', 'uncheckValue' => null));?></td>
                </tr>
            </tbody>
         </table>

	<div class="row">
		<?php echo $form->labelEx($model,'methodic_comment'); ?>
		<?php echo $form->textField($model,'methodic_comment',array('size'=>60,'maxlength'=>250, 'style'=>'width:100%')); ?>
		<?php echo $form->error($model,'methodic_comment'); ?>
	</div>

	<div class="row">
		<?php $req = $model->isAttributeRequired('labs')?' *': '';?>
		<?php echo CHtml::label('10. ' . Yii::t('answerstudent','labs') . $req,'');?>
        </div>
        <table style="width: 200px;">
            <tr>
                <td><?php echo $form->radioButton($model, 'labs', array('value' => '1', 'uncheckValue' => null)); echo Yii::t('answer', 'yes'); ?></td>
                <td><?php echo $form->radioButton($model, 'labs', array('value' => '0', 'uncheckValue' => null)); echo Yii::t('answer', 'no'); ?></td>
            </tr>
        </table>

	<div class="row">
		<?php $req = $model->isAttributeRequired('num_labs')?' *': '';?>
		<?php echo CHtml::label('11. ' . Yii::t('answerstudent','num_labs') . $req,'');?>
		<?php echo $form->textField($model,'num_labs'); ?>
		<?php echo $form->error($model,'num_labs'); ?>
	</div>

        <div class="row">
		<?php $req = $model->isAttributeRequired('labs_comment')?' *': '';?>
		<?php echo CHtml::label('12. ' . Yii::t('answerstudent','labs_comment') . $req,'');?>
        </div>
        <div style="margin-left: 25px;">
                <?php echo Yii::t('answerstudent','labs_comment_q'); ?>
        </div>    
            
	<div style="padding-left: 30px;">
		<br/>
                    <?php echo $form->radioButton($model, 'labs_comment', array('value' => '1', 'uncheckValue' => null)); ?>
                    <?php echo Yii::t('answerstudent','labs_comment_1'); ?>
                <br/>
                    <?php echo $form->radioButton($model, 'labs_comment', array('value' => '2', 'uncheckValue' => null)); ?>
                    <?php echo Yii::t('answerstudent','labs_comment_2'); ?>
                <br/>
                    <?php echo $form->radioButton($model, 'labs_comment', array('value' => '3', 'uncheckValue' => null)); ?>
                    <?php echo Yii::t('answerstudent','labs_comment_3'); ?>
                <br/>
                    <?php echo $form->radioButton($model, 'labs_comment', array('value' => '4', 'uncheckValue' => null)); ?>
                    <?php echo Yii::t('answerstudent','labs_comment_4'); ?>
        </div>

	<div class="row">
		<?php $req = $model->isAttributeRequired('practice')?' *': '';?>
		<?php echo CHtml::label('13. ' . Yii::t('answerstudent','practice') . $req,'');?>
	</div>
        
        <table style="width: 200px;">
            <tr>
                <td><?php echo $form->radioButton($model, 'practice', array('value' => '1', 'uncheckValue' => null)); echo Yii::t('answer', 'yes'); ?></td>
                <td><?php echo $form->radioButton($model, 'practice', array('value' => '0', 'uncheckValue' => null)); echo Yii::t('answer', 'no'); ?></td>
            </tr>
        </table>

	<div class="row">
		<?php $req = $model->isAttributeRequired('practice_place')?' *': '';?>
		<?php echo CHtml::label('14. ' . Yii::t('answerstudent','practice_place') . $req,'');?>
		<?php echo $form->textField($model,'practice_place',array('size'=>60,'maxlength'=>250, 'style' => 'width:100%')); ?>
		<?php echo $form->error($model,'practice_place'); ?>
	</div>

	<div class="row">
		<?php $req = $model->isAttributeRequired('practice_duration')?' *': '';?>
		<?php echo CHtml::label('15. ' . Yii::t('answerstudent','practice_duration') . $req,'');?>
		<?php echo $form->textField($model,'practice_duration'); ?>
		<?php echo $form->error($model,'practice_duration'); ?>
	</div>

	<div class="row">
		<?php $req = $model->isAttributeRequired('practice_comment')?' *': '';?>
		<?php echo CHtml::label('16. ' . Yii::t('answerstudent','practice_comment') . $req,'');?>
        </div>  
            
	<div style="padding-left: 30px;">
		    <?php echo $form->radioButton($model, 'practice_comment', array('value' => '1', 'uncheckValue' => null)); ?>
                    <?php echo Yii::t('answerstudent','practice_comment_1'); ?>
                <br/>
                    <?php echo $form->radioButton($model, 'practice_comment', array('value' => '2', 'uncheckValue' => null)); ?>
                    <?php echo Yii::t('answerstudent','practice_comment_2'); ?>
                <br/>
                    <?php echo $form->radioButton($model, 'practice_comment', array('value' => '3', 'uncheckValue' => null)); ?>
                    <?php echo Yii::t('answerstudent','practice_comment_3'); ?>
                <br/>
                    <?php echo $form->radioButton($model, 'practice_comment', array('value' => '4', 'uncheckValue' => null)); ?>
                    <?php echo Yii::t('answerstudent','practice_comment_4'); ?>
                <br/>
                    <?php echo $form->radioButton($model, 'practice_comment', array('value' => '5', 'uncheckValue' => null)); ?>
                    <?php echo Yii::t('answerstudent','practice_comment_5'); ?>
        </div>
        
        <div class="row">
		<?php echo CHtml::label('17. ' . Yii::t('answerstudent','diploma_add'),'');?>
        </div>
        <div style="margin-left: 25px;font-weight: bold">
                <?php echo Yii::t('answerstudent','diploma_add_q1'); ?>
        </div>
        <br/>
        <div style="margin-left: 25px;">
                <?php echo Yii::t('answerstudent','diploma_add_q2'); ?>
        </div>
        <div style="padding-left: 30px;">
		    <?php echo $form->radioButton($model, 'diploma_aspects', array('value' => '1', 'uncheckValue' => null)); ?>
                    <?php echo Yii::t('answerstudent','diploma_aspects_1'); ?>
                    <br/>
                    <?php echo $form->radioButton($model, 'diploma_aspects', array('value' => '2', 'uncheckValue' => null)); ?>
                    <?php echo Yii::t('answerstudent','diploma_aspects_2'); ?>
        </div>
        <br/>
        <div style="padding-left: 30px;">
		    <?php echo $form->radioButton($model, 'diploma_research', array('value' => '1', 'uncheckValue' => null)); ?>
                    <?php echo Yii::t('answerstudent','diploma_research_1'); ?>
                    <br/>
                    <?php echo $form->radioButton($model, 'diploma_research', array('value' => '2', 'uncheckValue' => null)); ?>
                    <?php echo Yii::t('answerstudent','diploma_research_2'); ?>
        </div>
        
        <div class="row">
		<?php $req = $model->isAttributeRequired('private_comments')?' *': '';?>
		<?php echo CHtml::label('18. ' . Yii::t('answerstudent','private_comments') . $req,'');?>
                <?php echo Yii::t('answerstudent','private_comments_q'); ?>
                <br/>
                <?php echo $form->textField($model,'private_comments', array('size'=>60,'maxlength'=>250, 'style' => 'width:100%')); ?>
		<?php echo $form->error($model,'private_comments'); ?>
        </div>
        
	<br/>
	<div class="row buttons">
        <?php if (!$view) {?>
			<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('site','create') : Yii::t('site','save'),array('class'=>'button')); ?>
		<?php
			}
				else
					echo CHtml::link('← '.Yii::t('site','back'),Yii::app()->request->urlReferrer, array('class'=>'button'));
		?>
	</div>
<br>

<?php $this->endWidget(); ?>

</div><!-- form -->