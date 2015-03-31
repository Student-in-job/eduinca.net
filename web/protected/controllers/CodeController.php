<?php

class CodeController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'actions'=>array('index', 'create', 'update', 'view', 'delete'),
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
	public function actionCreate()
	{
		$model=new Code;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Code']))
		{
			$model->attributes=$_POST['Code'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_code));
		}

		$this->render('create',array(
			'model'=>$model,
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

		if(isset($_POST['Code']))
		{
			$model->attributes=$_POST['Code'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_code));
		}

		$this->render('update',array(
			'model'=>$model,
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
	public function actionIndex($id_survey_in_university = null)
	{
                if($id_survey_in_university!=null)
                {
                    $model = SurveyInUniversity::model()->findByPk($id_survey_in_university);
                    if(!$model->HasCodes)
                    {
                        $this->generateCodes($model);
                    }
                }
		$dataProvider=new CActiveDataProvider('Code');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Code('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Code']))
			$model->attributes=$_GET['Code'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Code the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Code::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Code $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='code-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        protected function genPasswordTwo($length) {
            $password = "";
            /* Массив со всеми возможными символами в пароле */
            $arr = array(
              'a', 'b', 'c', 'd', 'e', 'f',
              'g', 'h', 'i', 'j', 'k', 'l',
              'm', 'n', 'o', 'p', 'q', 'r',
              's', 't', 'u', 'v', 'w', 'x',
              'y', 'z', 'A', 'B', 'C', 'D',
              'E', 'F', 'G', 'H', 'I', 'J',
              'K', 'L', 'M', 'N', 'O', 'P',
              'Q', 'R', 'S', 'T', 'U', 'V',
              'W', 'X', 'Y', 'Z', '1', '2',
              '3', '4', '5', '6', '7', '8',
              '9', '0', '#', '!', "?", "&"
            );
            for ($i = 0; $i < $length; $i++)
              $password .= $arr[mt_rand(0, count($arr) - 1)];
            return date('Y') . '-' . $password;
      }
      
      protected function generateCodes($model)
      {
          $teacher = $model->getAttribute('teachers_num');
          $student = $model->getAttribute('teachers_num');
          $teacher_involved = $model->getAttribute('involved_teachers');
          $student_involved = $model->getAttribute('involved_students');
          
          for($iterator = 0; $iterator<$teacher; $iterator++)
          {
              $code = new Code();
              $code->setAttribute('code', $this->genPasswordTwo(4));
              $code->setAttribute('survey_in_university_id', $model->getAttribute('id_survey_in_university'));
              $code->save();
          }
      }
}
