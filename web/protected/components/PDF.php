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
        if ($dataProvider == null)
            return $text;
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
    
    public static function PrintTitle($title = null, $year = null, $countries = null)
    {
        $text = '<div style="height:10cm;"></div>';
        $text .= '<div style="margin-left:70px;margin-right:70px;font-size:30px;text-align:center;font-family:Arial;">' . $title . '</div>';
        $text .= '<div style="height:7cm;"></div>';
        if(isset($year))
            $text .= '<div style="width:100%;text-align:right;">' . Yii::t('reports', 'report_date') . ': <span style="color:#F00">' . $year . '</span></div>';
        if(isset($countries))
            $text .= '<div style="width:100%;text-align:right;">' . Yii::t('reports', 'report_countries') . ': <span style="color:#F00">' . $countries . '</span></div>';
        return $text;
    }
    
    public static function PrintIntro($year = null, $countries = null)
    {
        $text = '<h3>' . Yii::t('reports', 'report_intro') . '</h3>';
        $text .= '<p>' . Yii::t('reports', 'report_intro1') . '</p>';
        $text .= '<p>' . Yii::t('reports', 'report_intro2') . '</p>';
        $text .= '<p>' . Yii::t('reports', 'report_intro3') . '</p>';
        $text .= '<ul><li>' . Yii::t('reports', 'report_intro_list1') . '</li>';
        $text .= '<li>' . Yii::t('reports', 'report_intro_list2') . '</li>';
        $text .= '<li>' . Yii::t('reports', 'report_intro_list3') . '</li></ul>';
        $text .= '<p>' . Yii::t('reports', 'report_intro4') . '</p>';
        $text .= '<p><span style="color:#F00">' . Yii::t('reports', 'report_intro5') . $year . '</span>' . Yii::t('reports', 'report_intro6') . '<span style="color:#F00">' . $countries . '</span></p>';
        $text .= '<p>' . Yii::t('reports', 'report_intro7') . '</p>';
        $text .= '<p style="margin-top: 150px;color:#F00">' . Yii::t('reports', 'report_intro8') . '</p>';
        return $text;
    }
}
