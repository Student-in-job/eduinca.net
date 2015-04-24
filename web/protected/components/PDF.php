<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class PDF
{
    public static function PrintCodes($dataProvider = null, $university_name = null, $date_till = null)
    {
        $text = '';
        if ($dataProvider == null) return $text;
        $text .= '<table><caption style="background:#EEEEEE;text-align:center;padding:10px; color:blue"><h3><b>' . $university_name . '</b></h3></caption><tbody>';
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
                $text .= '<tr><td colspan = 2 valign="middle" style="height:30px;text-align:center;"><h4 style="margin:0">' . Yii::t('survey', $person==1?'code_teacher':'code_student') . ' - ' .  Yii::t('survey', $involved==1?'code_involved':'code_notinvolved') . '</h4></td></tr>';
            }
            if ($counter%2 == 1){
                $text .= '<tr>';
            }
            $back = ($activeRecord->completed == 1)?'background-color:#FF8A8A;':'background-color:#8AFF8A;';
            $text .= '<td valign="middle" style="height:120px;'. $back . '">';
            $text .= '<div style="margin:10px;">';
            if ($activeRecord->completed == 1)
            {
                $text .= '<h4 style= "text-align:right;float:right">' . Yii::t('survey', 'used') . '</h4>';
            }
            $text .= '<h2 style="text-align:center;clear:both;"><b>' . $activeRecord->code . '</b></h2>'; 
            $text .= '<h6 style= " text-align:left;margin-bottom:10px;">'. Yii::t('survey', 'date_till') . ': <b>' . $date_till . '</b></h6>';
            $text .= '<h5 style= "text-align:left;float:left">'. Yii::t('site', 'link') . ': <u><b>' . Yii::app()->params['url'] . '</b></u></h5>';
            $text .= '<h6 style= "text-align:right;float:right;margin-top:10px;width:300px">'. Yii::t('site', 'adminContact') . '</h6>';
            $text .= '</div>';
            $text .= '</td>';
            if ($counter%2 == 0) {
                $text .= '</tr>';
            }
            $counter++;
        }
        $text .= '</tbody></table>';
        return $text;
    }
}
