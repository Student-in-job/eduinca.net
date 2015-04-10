<?php

class StatisticsController extends Controller
{
	public $layout = '//layouts/column2';
        
        private $_university;
        
        public function init(){
            parent::init();
            $dataProvider = new CActiveDataProvider('University');
            foreach($dataProvider->getData() as $activeRecord)
            {
                $this->_university[$activeRecord->getAttribute('id_university')] = $activeRecord->getAttribute('name');
            }
        }
        /**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view' ),
				'users'=>array('administrator'),
			),
                        array('allow',
                                'actions' => array('index'),
                                'users' => '@',
                        ),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
        
        public function actionIndex()
	{
            $dataArray = array();
            $surveyModel = new Survey();
            $surveyDataProvider = new CActiveDataProvider('Survey', array('pagination' => false));
            $index = 0;
            foreach($surveyDataProvider->getData() as $activeSurvey)
            {
                $data = array();
                $surveyinuniversityModel = new SurveyInUniversity();
                $id = $activeSurvey->getAttribute('id_survey');
                $data['id'] = $id;
                $data['name'] = $activeSurvey->getAttribute('name_' . Yii::app()->language);
                $data['year'] = $activeSurvey->getAttribute('year');
                $data['date'] = $activeSurvey->getAttribute('date_till');
                $surveyinuniversityModel->survey_id = $id;
                $surveyinuniversityDataProvider = $surveyinuniversityModel->search();
                $universities = '';
                $teachersInvolved = 0;
                $teachersNotInvolved = 0;
                $studentsInvolved = 0;
                $studentsNotInvolved = 0;
                $activeCodes = 0;
                $completeCodes = 0;
                foreach($surveyinuniversityDataProvider->getData() as $activeSurveyInUniversity)
                {
                    $universities .= $this->_university[$activeSurveyInUniversity->getAttribute('university_id')] . '';
                    $teachersInvolved += $activeSurveyInUniversity->getAttribute('involved_teachers');
                    $teachersNotInvolved += $activeSurveyInUniversity->getAttribute('teachers_num') - $activeSurveyInUniversity->getAttribute('involved_teachers');
                    $studentsInvolved += $activeSurveyInUniversity->getAttribute('involved_students');
                    $teachersNotInvolved += $activeSurveyInUniversity->getAttribute('students_num') - $activeSurveyInUniversity->getAttribute('involved_students');
                    $codeModel = new Code();
                    $codeModel->survey_in_university_id = $activeSurveyInUniversity->getAttribute('id_survey_in_university');
                    $codeModel->completed = 1;
                    $activeCodes += $codeModel->search()->getItemCount();
                    $codeModel->completed = 0;
                    $completeCodes += $codeModel->search()->getItemCount();
                    
                }
                $data['universities'] = $universities;
                $data['teachers_involved'] = $teachersInvolved;
                $data['teachers_not_involved'] = $teachersNotInvolved;
                $data['students_involved'] = $studentsInvolved;
                $data['students_not_involved'] = $studentsNotInvolved;
                $data['active_codes'] = $activeCodes;
                $data['complete_codes'] = $completeCodes;
                $dataArray[$index] = $data;
                unset($data);
                $index++;
            }
            $dataProvider = new CArrayDataProvider($dataArray, array(
                        'id' => 'id',
                        'sort' => array(
                            'attributes' => array('id')
                        ),
                        'pagination' => array(
                            'pageSize' => 10,
                        )
                    ));
            $this->render('index', array('dataProvider' => $dataProvider));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}