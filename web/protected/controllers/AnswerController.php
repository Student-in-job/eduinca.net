<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class AnswerController extends Controller
{
        protected  $menuItem = 'statistic';
        public $layout='//layouts/column1';

        private $_involved;
        private $_persontype;
        private $_university;
        
        public function init(){
            parent::init();
            $dataProvider = new CActiveDataProvider('University');
            foreach($dataProvider->getData() as $activeRecord)
            {
                $this->_university[$activeRecord->getAttribute('id_university')] = $activeRecord->getAttribute('name_' . Yii::app()->language);
            }
        }

        public function filters()
        {
            return array(
                'accessControl', // perform access control for CRUD operations
                'postOnly + delete', // we only allow deletion via POST request
            );
        }

        public function actionIndex($person)
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
            
            switch ($person)
            {
                case 1:
                    $dataProvider = new CActiveDataProvider('Teacher');
                    
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
                    break;
                case 2:
                    $dataProvider = new CActiveDataProvider('Student');
                    
                    foreach ($dataProvider->data as $answerStudent)
                    {
                        $id_university = $answerStudent->university_id;
                        if($id_university!='')
                            $answerStudent->university_name = $this->_university[$id_university];
                        else
                            $answerStudent->university_name = 'n/a';
                        $id_person = $answerStudent->person_type_id;
                        if($id_person!='')
                            $answerStudent->person_type_name = $this->_persontype[$id_person];
                        else
                            $answerStudent->person_type_name = 'n/a';
                        $id_involved_type = $answerStudent->involved_person_id;
                        if($id_involved_type!='')
                            $answerStudent->involved_name = $this->_involved[$id_involved_type];
                        else
                            $answerStudent->involved_name = 'n/a';
                    }
                    break;
            }
            
            $this->render('index', array(
                'dataProvider' => $dataProvider,
                'person' => $person,
                ));
        }
/*        
        public function actionDelete($id)
        {
            $model =  Teacher::model()->findByPk($id);
            if($model===null)
                throw new CHttpException(404,'The requested page does not exist.');
            
            $model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('answer/index'));
		
        }
 * 
 */
}
