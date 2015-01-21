<?php
/* @var $this AnswerTeacherController */
/* @var $model AnswerTeacher */
/* @var $form CActiveForm */
?>

<style type="text/css">
table tbody tr td {vertical-align: central; padding-left: 30px;}
table tbody tr td input{}
table tbody tr {height: 45px; }
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
                <?php $model->person_type_id = 1?>
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
                <tr><td colspan="2"><h3><?php echo Yii::t('answerteacher', 'header');?> </h3></td></tr>
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
        </table>
        
	<div class="row">
		<?php echo $form->labelEx($model,'faculty'); ?>
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
                    <td>5-полностью согласен</td>
                    <td>4 - согласен, но требуются изменения</td>
                    <td>3 - частично согласен, нужны улучшения</td>
                    <td>2 - скорее не согласен, нужны существенные изменения</td>
                    <td>1 - абсолютно не согласен</td>
                    <td>n/a - не имею возможности оценить</td>
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
                    <td style="width: 500px;padding: 15px;"><b>Метод преподавания</b></td>
                    <td style="width: 300px;padding: 15px;">
                        <b>Как часто используете?</b>
                        <br/>
                        <b>5</b> = очень часто, практически на каждом занятии;
                        <b>4</b> = часто, несколько раз в месяц;
                        <b>3</b> = нечасто, несколько раз в семестр;
                        <b>2</b> = один или два раза за весь курс;
                        <b>1</b> = никогда
                        <br/>
                        Если при ответе на данный вопрос вы используете вариант 1 (никогда), то на вопрос в следующей графе не отвечайте. 
                    </td>
                    <td style="width: 300px;padding: 15px;">
                        <b>Насколько эффективен для студентов?</b>
                        <br/>
                        <b>5</b> = очень эффективен,  каждый раз студенты узнают что-то новое;
                        <b>4</b> = эффективен, они часто узнают что-то новое;
                        <b>3</b> = частично эффективен, они получают новую информацию, но не знают, как ее применять;
                        <b>2</b> = скорее неэффективен, они узнают немногое;
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
		<?php echo $form->textField($model,'methodic_comment',array('size'=>60,'maxlength'=>250, 'style' => 'width:100%;')); ?>
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
	</div>
        
        <table style="width: 200px;">
            <tr>
                <td><?php echo $form->radioButton($model, 'practice_place', array('value' => '1', 'uncheckValue' => null)); ?>1</td>
                <td><?php echo $form->radioButton($model, 'practice_place', array('value' => '2', 'uncheckValue' => null)); ?>2</td>
            </tr>
        </table>

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
		<?php echo $form->labelEx($model,'private_papers'); ?>
		<?php echo $form->textField($model,'private_papers',array('size'=>500,'maxlength'=>500, 'style' => 'width:100%;')); ?>
		<?php echo $form->error($model,'private_papers'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'private_comments'); ?>
		<?php echo $form->textField($model,'private_comments',array('size'=>500,'maxlength'=>250, 'style' => 'width:100%;')); ?>
		<?php echo $form->error($model,'private_comments'); ?>
	</div>

	<div class="row buttons">
                <?php if (!$view) {?>
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('site','create') : Yii::t('site','save')); ?>
                <?php
                    }
                    else
                        echo CHtml::link(Yii::t('site','back'),array('answer/index'))
                ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->