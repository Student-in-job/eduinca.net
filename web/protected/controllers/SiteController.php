<?php

class SiteController extends Controller
{
    protected  $menuItem = 'main';

    public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
                $modelLogin = new LoginForm;
                $modelCode = new CodeForm;
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
                $this->render('index', array(
                        'model' => $modelLogin,
                        'code' => $modelCode,
                ));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model = new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
                
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(array('statistics/index'));
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
        
	public function actionCode()
	{
		$model = new CodeForm();
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='code-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		// collect user input data
		if(isset($_POST['CodeForm']))
		{
			$model->attributes=$_POST['CodeForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
                        {
                            $codeModel = new Code;
                            $dbCriteria = new CDbCriteria();
                            $dbCriteria->compare('code', $model->code);
                            $code = $codeModel->find($dbCriteria);
                            if($code != null)
                            {
                                $surveyinuniversityModel = new SurveyInUniversity();
                                $dbCriteria = new CDbCriteria();
                                $dbCriteria->compare('id_survey_in_university', $code->getAttribute('survey_in_university_id'));
                                $surveyinuniversity = $surveyinuniversityModel->find($dbCriteria);
                                
                                $surveyModel = new Survey();
                                $surveyCriteria = new CDbCriteria();
                                $surveyCriteria->compare('id_survey', $surveyinuniversity->GetAttribute('survey_id'));
                                $survey = $surveyModel->find($surveyCriteria);
                                
                                $url = '';

                                if($code->getAttribute('person_type_id') == 1)
                                {
                                    $url = 'teacher/create';
                                }
                                elseif($code->getAttribute('person_type_id') == 2)
                                {
                                    $url = 'student/create';
                                }
                                $this->redirect(array(
                                        $url,
                                        'involved' => $code->getAttribute('person_involved'),
                                        'university_id' => $surveyinuniversity->getAttribute('university_id'),
                                        'survey_id' => $surveyinuniversity->getAttribute('survey_id'),
                                        'code' => $code->getAttribute('id_code'),
                                        'year' => date('Y', strtotime($survey->getAttribute('date_till')))
                                ));
                            }
                        }
                        else {$this->redirect(array('contact'));}
				
		}
		// display the login form
		$this->render('index',array('model' => $model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(array('index'));
	}
}