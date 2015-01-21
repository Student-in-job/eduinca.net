<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class AnswerController extends Controller
{
        public $layout='//layouts/column2';

        private $_involved;
        private $_persontype;
        private $_university;
        
        public function init(){
            if(isset($_GET['lang']))
                Yii::app()->setLanguage($_GET['lang']);
            Yii::app()->name = Yii::t('site', 'sitename');
            
            $dataProvider = new CActiveDataProvider('University');
            foreach($dataProvider->getData() as $activeRecord)
            {
                $this->_university[$activeRecord->getAttribute('id_university')] = $activeRecord->getAttribute('name');
            }
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
            $dataProvider = new CActiveDataProvider('PersonType');
            foreach($dataProvider->getData() as $activeRecord)
            {
                $this->_persontype[$activeRecord->getAttribute('id_person_type')] = $activeRecord->getAttribute('name');
            }
            $dataProvider = new CActiveDataProvider('InvolvedPerson');
            foreach($dataProvider->getData() as $activeRecord)
            { 
                $this->_involved[$activeRecord->getAttribute('id_involved_person')] = $activeRecord->getAttribute('name');
            }
            
            $dataProvider = new CActiveDataProvider('AnswerTeacher');
            
            foreach ($dataProvider->data as $answerTeacher)
            {
                $id_university = $answerTeacher->university_id;
                if($id_university!='')
                    $answerTeacher->university_name = $this->_university[$id_university];
                else
                    $answerTeacher->university_name = 'n/a';
                $id_person = $answerTeacher->person_type_id;
                if($id_person!='')
                    $answerTeacher->person_type_name = $this->_persontype[$id_person];
                else
                    $answerTeacher->person_type_name = 'n/a';
                $id_involved_type = $answerTeacher->involved_person_id;
                if($id_involved_type!='')
                    $answerTeacher->involved_name = $this->_involved[$id_involved_type];
                else
                    $answerTeacher->involved_name = 'n/a';
            }
            
            $this->render('index', array('dataProvider' => $dataProvider));
        }
        
        public function actionDelete($id)
        {
            $model =  AnswerTeacher::model()->findByPk($id);
            if($model===null)
                throw new CHttpException(404,'The requested page does not exist.');
            
            $model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('answer/index'));
		
        }
}
