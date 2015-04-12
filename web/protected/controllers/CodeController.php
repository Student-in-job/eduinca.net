<?php

class CodeController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
        protected  $menuItem = 'statistic';
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
				'actions'=>array('index', 'view'),
				'users'=>array('administrator'),
			),
                        array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('view'),
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
                /*
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
                 */
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
		$codeModel = new Code();
                $codeModel->survey_in_university_id = $id_survey_in_university;
                $dataProvider = $codeModel->search();
                
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
                        'survey_id' => $model->getAttribute('survey_id')
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
              '9', '0',
            );
            for ($i = 0; $i < $length; $i++)
              $password .= $arr[mt_rand(0, count($arr) - 1)];
            return date('Y') . '-' . $password;
        }
      
        protected function generateCodes($model)
        {
            $teacher_involved = $model->getAttribute('involved_teachers');
            $student_involved = $model->getAttribute('involved_students');
            $teacher_not_involved = $model->getAttribute('teachers_num') - $teacher_involved;
            $student_not_involved = $model->getAttribute('teachers_num') - $student_involved;
          
            for($iterator = 0; $iterator<$teacher_involved; $iterator++)
            {
                $code = new Code();
                $code->setAttribute('code', $this->genPasswordTwo(4));
                $code->setAttribute('survey_in_university_id', $model->getAttribute('id_survey_in_university'));
                $code->setAttribute('person_type_id', 1);
                $code->setAttribute('person_involved', 1);
                $code->save();
            }
            
            for($iterator = 0; $iterator<$student_involved; $iterator++)
            {
                $code = new Code();
                $code->setAttribute('code', $this->genPasswordTwo(4));
                $code->setAttribute('survey_in_university_id', $model->getAttribute('id_survey_in_university'));
                $code->setAttribute('person_type_id', 2);
                $code->setAttribute('person_involved', 1);
                $code->save();
            }
            
            for($iterator = 0; $iterator<$teacher_not_involved; $iterator++)
            {
                $code = new Code();
                $code->setAttribute('code', $this->genPasswordTwo(4));
                $code->setAttribute('survey_in_university_id', $model->getAttribute('id_survey_in_university'));
                $code->setAttribute('person_type_id', 1);
                $code->setAttribute('person_involved', 2);
                $code->save();
            }
            
            for($iterator = 0; $iterator<$student_not_involved; $iterator++)
            {
                $code = new Code();
                $code->setAttribute('code', $this->genPasswordTwo(4));
                $code->setAttribute('survey_in_university_id', $model->getAttribute('id_survey_in_university'));
                $code->setAttribute('person_type_id', 2);
                $code->setAttribute('person_involved', 2);
                $code->save();
            }
        }
}
