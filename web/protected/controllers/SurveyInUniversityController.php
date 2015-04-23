<?php

class SurveyInUniversityController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
        protected  $menuItem = 'survey';
	public $layout='//layouts/column2';
        protected $universities;
        protected $user;
        protected $universityType;
        protected $date_till;
        
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
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
				'actions'=>array('index','create','update','delete','view' ),
				'users'=>array('administrator'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($survey_id = null)
	{
		$model = new SurveyInUniversity;
                $model->setAttribute('survey_id', $survey_id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SurveyInUniversity']))
		{
			$model->attributes=$_POST['SurveyInUniversity'];
                        $model->setAttribute('university_type_id', University::model()->findByPk($model->university_id)->getAttribute('university_type_id'));
			if($model->save())
                            $this->redirect(array('index','survey_id' => $model->getAttribute('survey_id')));
                }
                
                $condition = 'id_university NOT IN (';
                foreach($model->search()->getData() as $activeRecord)
                {
                    $condition .= $activeRecord->GetAttribute('university_id') .  ',';
                }
                $condition = trim($condition, ',') . ')';
                $lastUniversitiesDbCriteria = new CDbCriteria();  
                $lastUniversitiesDbCriteria->condition = $condition;
                
                $roleCriteria = new CDbCriteria;
                $roleCriteria->compare('role_id', 2);
                
		$this->render('create',array(
			'model'=>$model,
                        'university' => $this->GetArray('University', 'id_university', 'name_' . Yii::app()->language, $lastUniversitiesDbCriteria),
                        'user' => $this->GetArray('User', 'id_user', 'name', $roleCriteria),
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SurveyInUniversity']))
		{
			$model->attributes=$_POST['SurveyInUniversity'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_survey_in_university));
		}
                
                $condition = 'id_university NOT IN (';
                foreach($model->search()->getData() as $activeRecord)
                {
                    $condition .= $activeRecord->GetAttribute('university_id') .  ',';
                }
                $condition = trim($condition, ',') . ')';
                $lastUniversitiesDbCriteria = new CDbCriteria();  
                $lastUniversitiesDbCriteria->condition = $condition;
                
                $roleCriteria = new CDbCriteria;
                $roleCriteria->compare('role_id', 2);
                
		$this->render('update',array(
			'model'=>$model,
                        'university' => $this->GetArray('University', 'id_university', 'name_' . Yii::app()->language, $lastUniversitiesDbCriteria),
                        'user' => $this->GetArray('User', 'id_user', 'name', $roleCriteria),
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($survey_id = null)
	{
                $criteria=new CDbCriteria;
                $criteria->compare('survey_id', $survey_id);
                $dataProvider = new CActiveDataProvider('SurveyInUniversity', array('criteria' => $criteria));
                $this->universities = $this->GetArray('University', 'id_university', 'name_' . Yii::app()->language);
                $this->user = $this->GetArray('User', 'id_user', 'name');
                $this->universityType = $this->GetArray('UniversityType', 'id_university_type', 'name');
                
                $survey = Survey::model()->findByPk($survey_id);
                $this->date_till = $survey->date_till;
                        
                $this->render('index',array(
			'dataProvider'=>$dataProvider,
                        'survey_id' => $survey_id,
		));
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SurveyInUniversity the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SurveyInUniversity::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SurveyInUniversity $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='survey-in-university-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        protected function Getlabel($item = false)
        {
            if (!$item) return Yii::t('survey', 'generate_codes');
            else return Yii::t('survey', 'view_codes');
        }
}
