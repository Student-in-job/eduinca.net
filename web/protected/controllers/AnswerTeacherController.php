<?php

class AnswerTeacherController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';
        
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
                /*
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
                 * 
                 */
                $model=$this->loadModel($id);
                
                $this->initInvolved($model, $involved);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		$this->render('update',array(
			'model'=>$model,
                        'view'=>true,
                        'university' => $this->_university,
                        'involved' => $involved,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($involved = null)
	{
		$model=new AnswerTeacher;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                if(isset($_POST['AnswerTeacher']))
		{
			$model->attributes=$_POST['AnswerTeacher'];
			if($model->save())
				$this->redirect(array('answer/index'));
		}
                
                $this->initInvolved($model, $involved);
                
		$this->render('create',array(
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
		if(isset($_POST['AnswerTeacher']))
		{
                    var_dump($_POST);
			$model->attributes=$_POST['AnswerTeacher'];
			if($model->save())
				$this->redirect(array('answer/index'));
		}
                
                $this->initInvolved($model ,$involved);

		$this->render('update',array(
			'model'=>$model,
                        'view'=>false,
                        'involved' => $involved,
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('answer/index'));
	}

        public function loadModel($id)
	{
		$model =  AnswerTeacher::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
	/**
	 * Performs the AJAX validation.
	 * @param AnswerTeacher $model the model to be validated
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
        
        public function actionIndex()
        {
                $dataProvider=new CActiveDataProvider('AnswerTeacher');
		$this->render('index',array(
			'dataProvider' => $dataProvider,
		));
        }
}
