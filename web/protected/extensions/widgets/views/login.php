<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="form-wrap">
    
    <div class="tabs">
        <h3 class="signup-tab"><a class="active" href="#signup-tab-content"><?php echo Yii::t('site', 'sign'); ?></a></h3>
        <h3 class="login-tab"><a href="#login-tab-content"><?php echo Yii::t('site', 'login'); ?></a></h3>
    </div><!--.tabs-->

    <div class="tabs-content">
        <div id="signup-tab-content" class="active">
            
            <form class="signup-form" action="" method="post">
                <input type="email" class="input" id="user_email" autocomplete="off" placeholder="Code">
                <input type="submit" class="button" value="Sign Up">
            </form>
            <div class="help-text">
                <p>By signing up, you agree to our</p>
                <p><a href="#">Terms and conditions</a></p>
            </div><!--.help-text-->
        </div><!--.signup-tab-content-->
        <div id="login-tab-content">
            <?php
                $form = $this->beginWidget('CActiveForm', array(
                        'id'=>'login-form',
                        'action' => Yii::app()->createUrl('site/Login', array('language' => Yii::app()->language)),
                        'enableAjaxValidation' => true,
                        'clientOptions'=>array(
                                 'validateOnSubmit'=>true,
                        ),
                        'htmlOptions' => array('class' => 'login-form')
                ));
                echo $form->textField($model,'username', array('class' => 'input', 'autocomplete' => 'off', 'placeholder' => Yii::t('site', 'useremail')));
                echo $form->error($model,'username');
                echo $form->passwordField($model,'password', array('class' => 'input', 'autocomplete' => 'off', 'placeholder' => Yii::t('site', 'password')));
                echo $form->error($model,'password');
                echo $form->checkBox($model,'rememberMe', array('class' => 'checkbox'));
                echo $form->label($model,'rememberMe');
                echo $form->error($model,'rememberMe');
                echo CHtml::submitButton(Yii::t('site', 'login'), array('class' => 'button'));
                $this->endWidget();
            ?>
            <div class="help-text">
                <p><a href="#">Forget your password?</a></p>
            </div><!--.help-text-->
        </div><!--.login-tab-content-->      
    </div><!--.tabs-content-->
</div><!--.form-wrap-->