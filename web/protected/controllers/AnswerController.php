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

        protected $_involved;
        protected $_persontype;
        protected $_university;

        public function filters()
        {
            return array(
                'accessControl', // perform access control for CRUD operations
                'postOnly + delete', // we only allow deletion via POST request
            );
        }

        public function actionIndex($person, $year = null)
        {
            $this->_persontype = $this->GetArray('PersonType', 'id_person_type', 'name');
            $this->_involved = $this->GetArray('InvolvedPerson', 'id_involved_person', 'name');
            $this->_university = $this->GetArray('University', 'id_university', 'name_' . Yii::app()->language);
            
            switch ($person)
            {
                case 1:
                    $model = new TeacherStatistic();
                    $dataProvider = new CActiveDataProvider('Teacher');
                    break;
                case 2:
                    $model = new StudentStatistic();
                    $dataProvider = new CActiveDataProvider('Student');
                    break;
            }
            
            if(!isset($year))
            {
                $year = $model->getLastYear();
            }
            $dbCriteria = new CDbCriteria();
            $dbCriteria->compare('year', $year);
            $dataProvider->criteria = $dbCriteria;
            $years = $model->getYears();
            
            $this->render('index', array(
                'dataProvider' => $dataProvider,
                'person' => $person,
                'years' => $years,
                'chosen_year' => $year
            ));
        }
        
        public function actionCompleted()
        {
            $this->render('completed');
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
