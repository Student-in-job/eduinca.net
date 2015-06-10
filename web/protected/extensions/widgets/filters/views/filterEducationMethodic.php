<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<input type="checkbox" style="display: none;" class="checkboxdropmenu" name="menu" value="dropmenu" id="dropmenu">
<label for="dropmenu" class="labeldropmenu"><img src="<?php echo Yii::app()->theme->baseUrl;?>/img/filter.png ">Filter</label>
<div class="titledropmenu">	
    <?php
    $form=$this->beginWidget('CActiveForm', array(
            'id' => $this->filtername,
            'enableAjaxValidation' => true,
    ));
    echo CHtml::hiddenField('type', $this->type);
    ?>
    <table>
        <tr>
            <td>
                <?php echo CHtml::label(Yii::t('site','year'), 'years');?>
                <?php echo $form->dropDownList($this->model, 'year', $this->years, array('style'=>'width:100px'))?>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo CHtml::label(Yii::t('analytic', 'education_methodic'), 'questions');?>
                <?php echo $form->checkBoxList($this->model, 'questions', $this->questions);?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <?php echo CHtml::label(Yii::t('university', 'educational'), 'universities');?>
                <?php echo $form->checkBoxList($this->model, 'universities', $this->universities);?>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo CHtml::submitButton(Yii::t('site', 'see'), array(
                        'submit' => array('analytic/filter'),
                        'style' => 'width: 150px;'
                ));?>
            </td>
        </tr>
    </table>
    <?php $this->endWidget(); ?>
</div>
