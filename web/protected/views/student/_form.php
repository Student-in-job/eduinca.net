<?php
/* @var $this StudentController */
/* @var $model Student */
/* @var $form CActiveForm */
?>

<style type="text/css">
table tbody tr td {vertical-align: central; padding-left: 30px;}
table tbody tr td input{}
table tbody tr {height: 45px; }
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
        </div>
        
        <div class="row">
                <?php $model->involved_person_id = $involved; ?>
                <?php echo $form->hiddenField($model,'involved_person_id'); ?>
                <?php echo $form->error($model,'involved_person_id'); ?>
        </div>
        
        <div class="row">
                <?php echo $form->hiddenField($model,'id_answer'); ?>
                <?php echo $form->error($model,'id_answer');?>
        </div>
        
	<?php echo $form->errorSummary($model); ?>

        <div style="background-color: #DFEBF6">
            <table>
                <tr><td colspan="2"><h3><?php echo Yii::t('answerstudent', 'header');?> </h3></td></tr>
                <tr>
                    <td>
                        <?php echo $form->labelEx($model,'year'); ?>
                        <?php $model->year = $year; ?>
                        <?php echo $form->textField($model,'year'); ?>                        
                    </td>
                    <td>
                        <?php echo $form->labelEx($model,'university_id'); ?>
                        <?php echo $form->dropDownList($model, 'university_id', $university, array('style' => 'width:500px')); ?>
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
		<?php echo $form->labelEx($model,'age'); ?>
		<?php echo $form->textField($model,'age'); ?>
		<?php echo $form->error($model,'age'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sex'); ?>
	</div>

        <table style="width: 200px;">
            <tr>
                <td><?php echo $form->radioButton($model, 'sex', array('value' => '1', 'uncheckValue' => null)); echo Yii::t('answer', 'man')?></td>
                <td><?php echo $form->radioButton($model, 'sex', array('value' => '0', 'uncheckValue' => null)); echo Yii::t('answer', 'woman');?></td>
            </tr>
        </table><?php echo $form->error($model,'sex'); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'faculty'); ?>
		<?php echo $form->textField($model,'faculty',array('size'=>60,'maxlength'=>100, 'style' => 'width:450px;')); ?>
		<?php echo $form->error($model,'faculty'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'speciality'); ?>
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
        
        <table style="max-width: 250px;">
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
                    <td style="width: 500px;padding: 15px;"><b>Метод преподавания</b></td>
                    <td style="width: 300px;padding: 15px;">
                        <b>Как часто используете?</b>
                        <br/>
                        <b>5</b> = очень часто, практически на каждом занятии;
                        <br/>
                        <b>4</b> = часто, несколько раз в месяц;
                        <br/>
                        <b>3</b> = нечасто, несколько раз в семестр;
                        <br/>
                        <b>2</b> = один или два раза за весь курс;
                        <br/>
                        <b>1</b> = никогда
                        <br/>
                        Если при ответе на данный вопрос вы используете вариант 1 (никогда), то на вопрос в следующей графе не отвечайте. 
                    </td>
                    <td style="width: 300px;padding: 15px;">
                        <b>Насколько эффективен для студентов?</b>
                        <br/>
                        <b>5</b> = очень эффективен,  каждый раз студенты узнают что-то новое;
                        <br/>
                        <b>4</b> = эффективен, они часто узнают что-то новое;
                        <br/>
                        <b>3</b> = частично эффективен, они получают новую информацию, но не знают, как ее применять;
                        <br/>
                        <b>2</b> = скорее неэффективен, они узнают немногое;
                        <br/>
                        <b>1</b> = совершенно неэффективен, ничего не дает
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $form->labelEx($model,'methodic_q1'); ?></td>
                    <td><?php echo $form->textField($model,'methodic_q1'); ?></td>
                    <td><?php echo $form->textField($model,'methodic_qq1'); ?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'methodic_q2'); ?></td>
                    <td><?php echo $form->textField($model,'methodic_q2'); ?></td>
                    <td><?php echo $form->textField($model,'methodic_qq2'); ?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'methodic_q3'); ?></td>
                    <td><?php echo $form->textField($model,'methodic_q3'); ?></td>
                    <td><?php echo $form->textField($model,'methodic_qq1'); ?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'methodic_q4'); ?></td>
                    <td><?php echo $form->textField($model,'methodic_q4'); ?></td>
                    <td><?php echo $form->textField($model,'methodic_qq4'); ?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'methodic_q5'); ?></td>
                    <td><?php echo $form->textField($model,'methodic_q5'); ?></td>
                    <td><?php echo $form->textField($model,'methodic_qq5'); ?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'methodic_q6'); ?></td>
                    <td><?php echo $form->textField($model,'methodic_q6'); ?></td>
                    <td><?php echo $form->textField($model,'methodic_qq6'); ?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'methodic_q7'); ?></td>
                    <td><?php echo $form->textField($model,'methodic_q7'); ?></td>
                    <td><?php echo $form->textField($model,'methodic_qq7'); ?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'methodic_q8'); ?></td>
                    <td><?php echo $form->textField($model,'methodic_q8'); ?></td>
                    <td><?php echo $form->textField($model,'methodic_qq8'); ?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'methodic_q9'); ?></td>
                    <td><?php echo $form->textField($model,'methodic_q9'); ?></td>
                    <td><?php echo $form->textField($model,'methodic_qq9'); ?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'methodic_q10'); ?></td>
                    <td><?php echo $form->textField($model,'methodic_q10'); ?></td>
                    <td><?php echo $form->textField($model,'methodic_qq10'); ?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'methodic_q11'); ?></td>
                    <td><?php echo $form->textField($model,'methodic_q11'); ?></td>
                    <td><?php echo $form->textField($model,'methodic_qq11'); ?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'methodic_q12'); ?></td>
                    <td><?php echo $form->textField($model,'methodic_q12'); ?></td>
                    <td><?php echo $form->textField($model,'methodic_qq12'); ?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model,'methodic_q13'); ?></td>
                    <td><?php echo $form->textField($model,'methodic_q13'); ?></td>
                    <td><?php echo $form->textField($model,'methodic_qq13'); ?></td>
                </tr>
            </tbody>
         </table>

	<div class="row">
		<?php echo $form->labelEx($model,'methodic_comment'); ?>
		<?php echo $form->textField($model,'methodic_comment',array('size'=>60,'maxlength'=>250, 'style'=>'width:100%')); ?>
		<?php echo $form->error($model,'methodic_comment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'labs'); ?>
        </div>
        <table style="width: 200px;">
            <tr>
                <td><?php echo $form->radioButton($model, 'labs', array('value' => '1', 'uncheckValue' => null)); echo Yii::t('answer', 'yes'); ?></td>
                <td><?php echo $form->radioButton($model, 'labs', array('value' => '0', 'uncheckValue' => null)); echo Yii::t('answer', 'no'); ?></td>
            </tr>
        </table>

	<div class="row">
		<?php echo $form->labelEx($model,'num_labs'); ?>
		<?php echo $form->textField($model,'num_labs'); ?>
		<?php echo $form->error($model,'num_labs'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'labs_comment'); ?>
        </div>
        <span style="padding-left: 15px;">
                <?php echo Yii::t('answerstudent','labs_comment_q'); ?>
        </span>    
            
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
		<?php echo $form->labelEx($model,'practice'); ?>
	</div>
        
        <table style="width: 200px;">
            <tr>
                <td><?php echo $form->radioButton($model, 'practice', array('value' => '1', 'uncheckValue' => null)); echo Yii::t('answer', 'yes'); ?></td>
                <td><?php echo $form->radioButton($model, 'practice', array('value' => '0', 'uncheckValue' => null)); echo Yii::t('answer', 'no'); ?></td>
            </tr>
        </table>

	<div class="row">
		<?php echo $form->labelEx($model,'practice_place'); ?>
		<?php echo $form->textField($model,'practice_place',array('size'=>60,'maxlength'=>250, 'style' => 'width:100%')); ?>
		<?php echo $form->error($model,'practice_place'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'practice_duration'); ?>
		<?php echo $form->textField($model,'practice_duration'); ?>
		<?php echo $form->error($model,'practice_duration'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'practice_comment'); ?>
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
                    <?php echo $form->radioButton($model, 'practice_comment', array('value' => '4', 'uncheckValue' => null)); ?>
                    <?php echo Yii::t('answerstudent','practice_comment_5'); ?>
        </div>
        
	<div class="row buttons">
                <?php if (!$view) {?>
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('site','create') : Yii::t('site','save'),array('class'=>'btn btn-primary')); ?>
                <?php
                    }
                    else
                        echo CHtml::link(Yii::t('site','back'),Yii::app()->request->urlReferrer, array('class'=>'btn btn-primary'));
                ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->