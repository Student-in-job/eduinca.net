<?php
/* @var $this AnswerTeacherController */
/* @var $model AnswerTeacher */
/* @var $form CActiveForm */
?>

<style type="text/css">
table tbody tr td {vertical-align: middle;}
table td, table tbody tr, table tbody tr td {background:none/*#DFEBF6*/;}
</style>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'answer-teacher-form',
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
                <?php //$model->person_type_id = 1?>
                <?php echo $form->hiddenField($model,'person_type_id'); ?>
                <?php echo $form->hiddenField($model,'involved_person_id'); ?>
                <?php echo $form->error($model,'involved_person_id'); ?>
                <?php echo $form->hiddenField($model,'id_answer'); ?>
                <?php echo $form->error($model,'id_answer');?>
        </div>
        
        <?php echo $form->errorSummary($model); ?>
        
        <div style="">
            <table>
                <!--<tr><td colspan="2"><h4><?php echo Yii::t('answerteacher', 'header');?> </h4></td></tr>-->
                <tr>
                    <td>
                        <?php echo $form->labelEx($model,'year'); ?>
                        <?php echo $form->textField($model,'year', array('readonly' => 'true')); ?>                        
                    </td>
                    <td>
                        <?php echo $form->labelEx($model,'university_id'); ?>
                        <?php echo $form->hiddenField($model, 'university_id'); ?>
                        <?php echo CHtml::textField('n',$university[$model->university_id], array('disabled' => true, 'style' => 'width:500px'));?>
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
		<?php echo CHtml::label('2. ' . Yii::t('answerteacher','sex') . $req,'');?>
	</div>

        <table style="width: 250px;">
            <tr>
                <td><?php echo $form->radioButton($model, 'sex', array('value' => '1', 'uncheckValue' => null)); echo Yii::t('answer', 'man')?></td>
                <td><?php echo $form->radioButton($model, 'sex', array('value' => '0', 'uncheckValue' => null)); echo Yii::t('answer', 'woman');?></td>
            </tr>
        </table>
        
	<div class="row">
                <?php $req = $model->isAttributeRequired('faculty')?' *': '';?>
                <?php echo CHtml::label('3. ' . Yii::t('answerteacher','faculty') . $req,'');?>
		<?php echo $form->textField($model,'faculty',array('size'=>60,'maxlength'=>100, 'style' => 'width:450px;')); ?>
		<?php echo $form->error($model,'faculty'); ?>
	</div>

	<div class="row">
                <?php echo CHtml::label('4. ' . Yii::t('answerteacher','studentteach'),'');?>
                <div style="padding-left: 15px;">
                <?php echo $form->checkBox($model,'student_teach1'); echo '   ' . Yii::t('answerteacher','studentteach1');?>
                <br/>
                <?php echo $form->checkBox($model,'student_teach2'); echo '   ' . Yii::t('answerteacher','studentteach2');?>
                <br/>
                <?php echo $form->checkBox($model,'student_teach3'); echo '   ' . Yii::t('answerteacher','studentteach3');?>
                </div>
	</div>

        <div class='row'>
                <?php echo CHtml::label('5. ' . Yii::t('answerteacher','common'),'');?>
        </div>
        
        
        
        <table class='table-bordered'>
            <thead>
                <tr>
                    <td style="width: 650px"></td>
                    <td><?php echo Yii::t('answerteacher', 'common_answer5');?></td>
                    <td><?php echo Yii::t('answerteacher', 'common_answer4');?></td>
                    <td><?php echo Yii::t('answerteacher', 'common_answer3');?></td>
                    <td><?php echo Yii::t('answerteacher', 'common_answer2');?></td>
                    <td><?php echo Yii::t('answerteacher', 'common_answer1');?></td>
                    <td><?php echo Yii::t('answerteacher', 'common_answer0');?></td>
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
            </tbody>
        </table>

	<div class="row">
		<?php echo $form->labelEx($model,'common_comment'); ?>
		<?php echo $form->textField($model,'common_comment',array('size'=>250,'maxlength'=>250, 'style' => 'width:100%;')); ?>
		<?php echo $form->error($model,'common_comment'); ?>
	</div>

        <div class='row'>
                <?php echo CHtml::label('6. ' . Yii::t('answerteacher','methodic'),'');?>
        </div>

         <table class='table-bordered'>
            <thead>
                <tr>
                    <td style="width: 650px"></td>
                    <td><?php echo Yii::t('answerteacher', 'methodic_answer5');?></td>
                    <td><?php echo Yii::t('answerteacher', 'methodic_answer4');?></td>
                    <td><?php echo Yii::t('answerteacher', 'methodic_answer3');?></td>
                    <td><?php echo Yii::t('answerteacher', 'methodic_answer2');?></td>
                    <td><?php echo Yii::t('answerteacher', 'methodic_answer1');?></td>
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
		<?php echo $form->textField($model,'methodic_comment',array('size'=>60,'maxlength'=>250, 'style' => 'width:100%;')); ?>
		<?php echo $form->error($model,'methodic_comment'); ?>
	</div>

	<div class="row">
		<?php $req = $model->isAttributeRequired('labs')?' *': '';?>
                <?php echo CHtml::label('7. ' . Yii::t('answerteacher','labs') . $req,'');?>
        </div>
        <table style="width: 200px;">
            <tr>
                <td><?php echo $form->radioButton($model, 'labs', array('value' => '1', 'uncheckValue' => null)); echo Yii::t('answer', 'yes'); ?></td>
                <td><?php echo $form->radioButton($model, 'labs', array('value' => '0', 'uncheckValue' => null)); echo Yii::t('answer', 'no'); ?></td>
            </tr>
        </table>
	
	<div class="row">
		<?php $req = $model->isAttributeRequired('num_labs')?' *': '';?>
                <?php echo CHtml::label('8. ' . Yii::t('answerteacher','num_labs') . $req,'');?>
		<?php echo $form->textField($model,'num_labs'); ?>
		<?php echo $form->error($model,'num_labs'); ?>
	</div>

	<div class="row">
		<?php $req = $model->isAttributeRequired('labs_comment')?' *': '';?>
                <?php echo CHtml::label('9. ' . Yii::t('answerteacher','labs_comment') . $req,'');?>
        </div>
        <span style="padding-left: 15px;">
                <?php echo Yii::t('answerteacher','labs_comment_q'); ?>
        </span>
        <div style="padding-left: 30px;">
		<br/>
                    <?php echo $form->radioButton($model, 'labs_comment', array('value' => '1', 'uncheckValue' => null)); ?>
                    <?php echo Yii::t('answerteacher','labs_comment_1'); ?>
                <br/>
                    <?php echo $form->radioButton($model, 'labs_comment', array('value' => '2', 'uncheckValue' => null)); ?>
                    <?php echo Yii::t('answerteacher','labs_comment_2'); ?>
                <br/>
                    <?php echo $form->radioButton($model, 'labs_comment', array('value' => '3', 'uncheckValue' => null)); ?>
                    <?php echo Yii::t('answerteacher','labs_comment_3'); ?>
                <br/>
                    <?php echo $form->radioButton($model, 'labs_comment', array('value' => '4', 'uncheckValue' => null)); ?>
                    <?php echo Yii::t('answerteacher','labs_comment_4'); ?>
        </div>
        
	<div class="row">
		<?php $req = $model->isAttributeRequired('practice')?' *': '';?>
                <?php echo CHtml::label('10. ' . Yii::t('answerteacher','practice') . $req,'');?>
	</div>
        
        <table style="width: 200px;">
            <tr>
                <td><?php echo $form->radioButton($model, 'practice', array('value' => '1', 'uncheckValue' => null)); echo Yii::t('answer', 'yes'); ?></td>
                <td><?php echo $form->radioButton($model, 'practice', array('value' => '0', 'uncheckValue' => null)); echo Yii::t('answer', 'no'); ?></td>
            </tr>
        </table>

	<div class="row">
		<?php $req = $model->isAttributeRequired('practice_place')?' *': '';?>
                <?php echo CHtml::label('9. ' . Yii::t('answerteacher','practice_place') . $req,'');?>
	</div>
        
        <table style="width: 200px;">
            <tr>
                <td><?php echo $form->radioButton($model, 'practice_place', array('value' => '1', 'uncheckValue' => null)); ?>1</td>
                <td><?php echo $form->radioButton($model, 'practice_place', array('value' => '2', 'uncheckValue' => null)); ?>2</td>
            </tr>
        </table>

	<div class="row">
		<?php $req = $model->isAttributeRequired('practice_duration')?' *': '';?>
                <?php echo CHtml::label('12. ' . Yii::t('answerteacher','practice_duration') . $req,'');?>
		<?php echo $form->textField($model,'practice_duration'); ?>
		<?php echo $form->error($model,'practice_duration'); ?>
	</div>

	<div class="row">
		<?php $req = $model->isAttributeRequired('num_of_papers')?' *': '';?>
                <?php echo CHtml::label('13. ' . Yii::t('answerteacher','num_of_papers') . $req,'');?>
		<?php echo $form->textField($model,'num_of_papers'); ?>
		<?php echo $form->error($model,'num_of_papers'); ?>
	</div>

        <div class='row'>
                <?php echo CHtml::label('14.' . Yii::t('answerteacher','num_from_this'),'');?>
        </div>
        <div style="margin-left: 40px;">
            <?php echo $form->labelEx($model,'num_of_papers_theoretical'); ?>
            <?php echo $form->textField($model,'num_of_papers_theoretical'); ?>
            <?php echo $form->error($model,'num_of_papers_theoretical'); ?>
            <br />
            <?php echo $form->labelEx($model,'num_of_papers_practical'); ?>
            <?php echo $form->textField($model,'num_of_papers_practical'); ?>
            <?php echo $form->error($model,'num_of_papers_practical'); ?>
        </div>

	<div class="row">
		<?php $req = $model->isAttributeRequired('private_papers')?' *': '';?>
                <?php echo CHtml::label('15. ' . Yii::t('answerteacher','private_papers') . $req,'');?>
		<?php echo $form->textField($model,'private_papers',array('size'=>500,'maxlength'=>500, 'style' => 'width:100%;')); ?>
		<?php echo $form->error($model,'private_papers'); ?>
	</div>

	<div class="row">
		<?php $req = $model->isAttributeRequired('private_comments')?' *': '';?>
                <?php echo CHtml::label('16. ' . Yii::t('answerteacher','private_comments') . $req,'');?>
		<?php echo $form->textField($model,'private_comments',array('size'=>500,'maxlength'=>250, 'style' => 'width:100%;')); ?>
		<?php echo $form->error($model,'private_comments'); ?>
	</div>
	<br>
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