<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class AnswerController extends Controller
{
        public $layout='//layouts/column2';

        public function init(){
            if(isset($_GET['lang']))
                Yii::app()->setLanguage($_GET['lang']);
            Yii::app()->name = Yii::t('site', 'sitename');
            parent::init();
        }

        public function filters()
        {
            return array(
                'accessControl', // perform access control for CRUD operations
                'postOnly + delete', // we only allow deletion via POST request
            );
        }

        public function actionIndex()
        {
            $this->render('index');
        }
}
