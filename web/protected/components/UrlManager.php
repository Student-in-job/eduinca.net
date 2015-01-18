<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class UrlManager extends CUrlManager
{
    public function createUrl($route, $params=array(), $ampersand='&')
    {
        if (empty($params['lang'])) {
            $params['lang'] = Yii::app()->language;
        }
        return parent::createUrl($route, $params, $ampersand);
    }
}
