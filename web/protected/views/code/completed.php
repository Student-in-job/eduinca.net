<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo '<h3>' . Yii::t('survey', 'completed') . '</h3>';

echo '<a class="button" href = "' .  Yii::app()->createUrl('surveyInUniversity/index', array('survey_id' => $survey_id)) . '">' . Yii::t('site', 'back') . '</a>';

