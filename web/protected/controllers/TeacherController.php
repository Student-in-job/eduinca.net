<?php

class TeacherController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
        protected  $menuItem = 'statistic';
	public $layout='//layouts/column1';
        
        private $_university;

	public function init(){
            parent::init();
            $dataProvider = new CActiveDataProvider('University', array('pagination' => false));
            foreach($dataProvider->getData() as $activeRecord)
            {
                $this->_university[$activeRecord->getAttribute('id_university')] = $activeRecord->getAttribute('name_' . Yii::app()->language);
            }
        }
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
				'actions'=>array('create'),
				'users'=>array('participant'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','view','create','update','delete'),
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
	public function actionView($id, $involved = null)
	{
                $model=$this->loadModel($id);
                
                $this->initInvolved($model, $involved);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		$this->render('update',array(
			'model'=>$model,
                        'view'=>true,
                        'university' => $this->_university,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($involved = null, $university_id = null, $survey_id = null, $code = null, $year = null)
	{
		$model = new Teacher;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                if(isset($_POST['Teacher']))
		{
                    $model->attributes=$_POST['Teacher'];
                    if($model->save())
                    {
                        $modelCode = Code::model()->findByPk($_SESSION['code']);
                        $modelCode->setAttribute('completed',1);
                        $modelCode->setAttribute('completed_date', date('Y-m-d'));
                        if($modelCode->save())
                        {
                            session_unset();
                            Yii::app()->user->logout();
                            $this->redirect(array('answer/completed'));
                        }
                    }
		}
                
                if($code != null)
                    $_SESSION['code'] = $code;
                if($university_id != null)
                    $model->university_id = $university_id;
                if($involved != null)
                    $model->involved_person_id = $involved;
                if($survey_id != null)
                    $model->survey_id = $survey_id;
                if($year != null)
                    $model->year = $year;
                $model->person_type_id = 1;
                
                $this->initInvolved($model, $involved);
                
		$this->render('create', array(
			'model'=>$model,
                        'involved' => $involved,
                        'university' => $this->_university,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id, $involved = null)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Teacher']))
		{
			$model->attributes=$_POST['Teacher'];
			if($model->save())
				$this->redirect(array('answer/index', 'person' => 1));
		}
                
                if($involved != null)
                    $model->involved_person_id = $involved;
                
                $this->initInvolved($model ,$involved);

		$this->render('update', array(
			'model'=>$model,
                        'view'=>false,
                        'university' => $this->_university,
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('answer/index', 'person' => 1));
	}

        public function loadModel($id)
	{
		$model =  Teacher::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
	/**
	 * Performs the AJAX validation.
	 * @param Teacher $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='answer-teacher-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        private function initInvolved($model, $involved)
        {
                $dataProvider = new CActiveDataProvider('InvolvedPerson');
                foreach($dataProvider->getData() as $activeRecord)
                {
                    if($activeRecord->getAttribute('id_involved_person') == $involved)
                        $model->involved_name = $activeRecord->getAttribute('name');
                }
        }

        /*
        public function actionIndex()
        {
                $dataProvider=new CActiveDataProvider('Teacher');
		$this->render('index',array(
			'dataProvider' => $dataProvider,
		));
        }
         */
}
