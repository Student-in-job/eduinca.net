<?php $data

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<?php
    $person = 0;
    $involved = 0;
    $counter = 1;
    foreach ($dataProvider->getData() as $activeRecord)
    {
        
        $currentPerson = $activeRecord->person_type_id;
        $currentInvolved = $activeRecord->person_involved;
        if (($currentPerson != $person)||($currentInvolved != $involved))
        {
            $counter = 1;
            $person = $currentPerson;
            $involved = $currentInvolved;
            echo '<tr><td colspan = 2 valign="middle" style="height:30px;text-align:center;"><h4 style="margin:0">' . Yii::t('survey', $person==1?'code_teacher':'code_student') . ' - ' .  Yii::t('survey', $involved==1?'code_involved':'code_notinvolved') . '</h4></td></tr>';
        }
        if ($counter%2 == 1){
            echo '<tr>';
        }
        $back = ($activeRecord->completed == 1)?'background:#FF8A8A;':'background:#8AFF8A;';
        echo '<td valign="middle" style="height:120px;'. $back . '">';
        echo '<div style="margin:10px;">';
        if ($activeRecord->completed == 1)
        {
            echo '<h4 style= " text-align:right;float:right"">' . Yii::t('survey', 'used') . '</h4>';
        }
        echo '<h2 style="text-align:center;clear:both;"><b>' . $activeRecord->code . '</b></h2>'; 
        echo '<h6 style= " text-align:left;margin-bottom:10px;">'. Yii::t('survey', 'date_till') . ': <b>' . $date_till . '</b></h6>';
        echo '<h5 style= "text-align:left;float:left">'. Yii::t('site', 'link') . ': <u><b>' . Yii::app()->params['url'] . '</b></u></h5>';
        echo '<h6 style= "text-align:right;float:right;margin-top:10px;width:300px">'. Yii::t('site', 'adminContact') . '</h6>';
        echo '</div>';
        echo '</td>';
        if ($counter%2 == 0) {
            echo '</tr>';
        }
        $counter++;
    }
?>