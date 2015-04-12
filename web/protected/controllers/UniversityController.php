<?php

class UniversityController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
        protected  $menuItem = 'editor';
	public $layout='//layouts/column2';
        private $_country;
        private $_universityType;
        
        public function init()
        {
            parent::init();
            $dataProvider = new CActiveDataProvider('Country');
            $this->_universityType = array(1=>Yii::t('university','university'), 2=>Yii::t('university','college'));
            foreach($dataProvider->getData() as $activeRecord)
            {
                $this->_country[$activeRecord->getAttribute('id_country')] = $activeRecord->getAttribute('name');
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
	public function actionView($id)
	{
                $this->render('view',array(
			'model' => $this->loadModel($id),
                        'country' => $this->_country,
                        'type'=>$this->_universityType,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new University;

                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['University']))
		{
			$model->attributes=$_POST['University'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('create',array(
			'model'=>$model,
                        'data'=>$this->_country,
                        'type'=>$this->_universityType,
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
                
		if(isset($_POST['University']))
		{
			$model->attributes=$_POST['University'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('update',array(
			'model'=>$model,
                        'data'=>$this->_country,
                        'type'=>$this->_universityType,
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($id = null)
	{
                $filter = new CDbCriteria;
                $filter->compare('university_type_id', $id);
		$dataProvider=new CActiveDataProvider('University', array('criteria' => $filter));
		$this->render('index',array(
			'dataProvider' => $dataProvider,
                        'data' => $this->_country,
                        'type' => $this->_universityType,
                        'active' => $id,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new University('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['University']))
			$model->attributes=$_GET['University'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return University the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=University::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param University $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='university-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
