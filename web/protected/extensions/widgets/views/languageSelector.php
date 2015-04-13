<?php 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="language-select">
<?php
    if(sizeof($languages) < 4) { 
        foreach($languages as $key=>$lang)
        {
            if($key != $currentLang)
            {
                echo CHtml::link(
                     '<img src=' . Yii::app()->theme->baseUrl . '/img/flag_' . $key . '.png alt=' . $key . '> ' . strtoupper($key), 
                     $this->getOwner()->createMultilanguageReturnUrl($key));
            }
            else
            {
                echo '<img src=' . Yii::app()->theme->baseUrl . '/img/flag_' . $key . '.png alt=' . $key . '> ' . strtoupper($key);
            }
            if ($lang != end($languages)) echo '&nbsp;&nbsp';
        }	
    }
    else {
        // Render options as dropDownList
        echo CHtml::form();
        foreach($languages as $key=>$lang) {
            echo CHtml::hiddenField(
                $key, 
                $this->getOwner()->createMultilanguageReturnUrl($key));
        }
        echo CHtml::dropDownList('language', $currentLang, $languages,
            array(
                'submit'=>'',
            )
        ); 
        echo CHtml::endForm();
    }
?>
</div>
