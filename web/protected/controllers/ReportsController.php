<?php

class ReportsController extends Controller
{
    protected  $menuItem = 'reports';
    public $layout='//layouts/column2';
    protected $teachers_questions;
    protected $students_questions;
    protected $methodic;
    
    protected function InitQuestions()
    {
        $this->teachers_questions = array(
                'common_q1' => Yii::t('analytic', 'common_q2'),
                'common_q2' => Yii::t('analytic', 'common_q4'),
                'common_q3' => Yii::t('analytic', 'common_q5'),
                'common_q4' => Yii::t('analytic', 'common_q6'),
                'common_q5' => Yii::t('analytic', 'common_q7'),
                'common_q6' => Yii::t('analytic', 'common_q8'),
                'common_q7' => Yii::t('analytic', 'common_q9'),
                'common_q8' => Yii::t('analytic', 'common_q10'),
                'common_q9' => Yii::t('analytic', 'common_q11'),
        );
        $this->students_questions = array(
                'common_q2' => Yii::t('analytic', 'common_q2'),
                'common_q4' => Yii::t('analytic', 'common_q4'),
                'common_q5' => Yii::t('analytic', 'common_q5'),
                'common_q6' => Yii::t('analytic', 'common_q6'),
                'common_q7' => Yii::t('analytic', 'common_q7'),
                'common_q8' => Yii::t('analytic', 'common_q8'),
                'common_q9' => Yii::t('analytic', 'common_q9'),
                'common_q10' => Yii::t('analytic', 'common_q10'),
                'common_q11' => Yii::t('analytic', 'common_q11'),
        );
        $this->methodic = array(
                'methodic_q1' => Yii::t('analytic', 'methodic_q1'),
                'methodic_q2' => Yii::t('analytic', 'methodic_q2'),
                'methodic_q3' => Yii::t('analytic', 'methodic_q3'),
                'methodic_q4' => Yii::t('analytic', 'methodic_q4'),
                'methodic_q5' => Yii::t('analytic', 'methodic_q5'),
                'methodic_q6' => Yii::t('analytic', 'methodic_q6'),
                'methodic_q7' => Yii::t('analytic', 'methodic_q7'),
                'methodic_q8' => Yii::t('analytic', 'methodic_q8'),
                'methodic_q9' => Yii::t('analytic', 'methodic_q9'),
                'methodic_q10' => Yii::t('analytic', 'methodic_q10'),
                'methodic_q11' => Yii::t('analytic', 'methodic_q11'),
                'methodic_q12' => Yii::t('analytic', 'methodic_q12'),
                'methodic_q13' => Yii::t('analytic', 'methodic_q13'),
        );
    }
    
    public function actionCreate()
    {
        $model = new Reports();
        $modelTeacher = new TeacherStatistic();
        if(isset($_POST['ajax']) && $_POST['ajax']==='reports-form')
        {
            $_POST['Reports']['countries'] = json_encode($_POST['Reports']['countries']);
            $_POST['Reports']['Chapter2'] = json_encode($_POST['Reports']['Chapter2']);
            $_POST['Reports']['Chapter3'] = json_encode($_POST['Reports']['Chapter3']);
            echo CActiveForm::validate($model);
            Yii::app()->end();
	}
        $this->InitQuestions();
        if(isset($_POST['Reports']))
        {
            $model->attributes=$_POST['Reports'];
            $model->countries = json_encode($model->countries);
            $edProcess = array();
            $edProcess['students_questions'] = $_POST['Reports']['students_questions'];
            $edProcess['teachers_questions'] = $_POST['Reports']['teachers_questions'];
            $model->chapter2 = json_encode($edProcess);
            $model->chapter3 = json_encode($model->chapter3);
            if($model->save())
		$this->redirect(array('index'));
        }
        $countries = $this->GetArray('Country', 'id_country', 'name_' . Yii::app()->language);
        $model->countries = $this->returnKeys($countries);
        $model->setTeachers_questions($this->returnKeys($this->teachers_questions));
        $model->setStudents_questions($this->returnKeys($this->students_questions));
        $model->chapter3 = $this->returnKeys($this->methodic);
        $this->render('create', array(
                'model' => $model,
                'years' => $modelTeacher->getYears(),
                'countries' => $this->GetArray('Country', 'id_country', 'name_' . Yii::app()->language),
                'teachers_questions' => $this->teachers_questions,
                'students_questions' => $this->students_questions,
                'methodic' => $this->methodic,
        ));
    }

    public function actionGenerate($id, $finish = null, $lang = null)
    {
        $model = $this->loadModel($id);
        if(isset($_POST['Language']))
        {
            $language = $_POST['Language']['language'];
            $oldLang = Yii::app()->language;
            Yii::app()->language = $language;
            
            $this->GeneratePics($model);
            Yii::app()->language = $oldLang;
            $this->render('generatedPics',array(
                'id' => $id,
                'lang' => $language,
            ));
            Yii::app()->end();
        }
        if(!is_null($finish))
        {
            $oldLang = Yii::app()->language;
            Yii::app()->language = $lang;
            $this->redirect(array('PDFMaker/Report', 'id' => $id));
        }
        $languages = array();
        $languages['en'] = Yii::t('reports','en');
        $languages['ru'] = Yii::t('reports','ru');
        $this->render('generate',array(
                'id' => $id,
                'languages' => $languages,
                'model' => new Language(),
        ));
    }
    
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('Reports');
        $this->render('index', array(
                'dataProvider' => $dataProvider,
        ));
    }

    public function actionView($id)
    {
        $this->InitQuestions();
        $this->render('view',array(
                'model' => $this->loadModel($id),
                'countries' => $this->GetArray('Country', 'id_country', 'name_' . Yii::app()->language),
                'teachers_questions' => $this->teachers_questions,
                'students_questions' => $this->students_questions,
                'methodic' => $this->methodic,
        ));;
    }
    
    public function loadModel($id)
    {
        $model=Reports::model()->findByPk($id);
	if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
	return $model;
    }
    
    protected function returnKeys($array)
    {
        $result = array();
        foreach ($array as $key => $value)
        {
            array_push($result, $key);
        }
        return $result;
    }
    
    protected function encodeJSON($json, $values = null, $arrayName = null)
    {
        $array = json_decode($json);
        $text = '';
        foreach ($array as $item => $itemValue)
        {
            if(is_array($itemValue))
            {
                if(!is_null($arrayName))
                {
                    if ($item != $arrayName)
                        continue;
                }
                foreach ($itemValue as $innerItem)
                {
                    $textItem = (is_null($values))?$innerItem:$values[$innerItem];
                    $text .= $textItem . "<br/>";
                }
            }
            else
            {
                $textItem = (is_null($values))?$itemValue:$values[$itemValue];
                $text .= $textItem . "<br/>";
            }
        }
        return $text;
    }
    
    protected function encodeJSONData($json, $arrayName = null)
    {
        $array = json_decode($json);
        $data = array();
        foreach ($array as $item => $itemValue)
        {
            if(is_array($itemValue))
            {
                if(!is_null($arrayName))
                {
                    if ($item != $arrayName)
                        continue;
                }
                foreach ($itemValue as $innerItem)
                {
                    array_push($data, $innerItem);
                }
            }
            else
            {
                array_push($data, $itemValue);
            }
        }
        return $data;
    }
    
    protected function GeneratePics($model)
    {
        require_once Yii::app()->basePath . '/extensions/widgets/charts/BarChart.php';
        require_once Yii::app()->basePath . '/extensions/widgets/charts/PieChart.php';
        require_once Yii::app()->basePath . '/extensions/widgets/charts/HorizontalBarChart.php';
        require_once Yii::app()->basePath . '/controllers/AnalyticController.php';
        $this->InitQuestions();
        
        $year = $model->year;
        $countries = $this->encodeJSONData($model->countries);
        $processTeachers = $this->encodeJSONData($model->chapter2, 'teachers_questions');
        $processStudents = $this->encodeJSONData($model->chapter2, 'students_questions');
        $methodic = $this->encodeJSONData($model->chapter3);
        
        $countries = $this->GetArray('Country', 'id_country', 'name_' . Yii::app()->language);
        $countriesKeys = array();
        foreach ($countries as $item => $value)
        {
            array_push($countriesKeys, $item);
        }
        $dbCriteria = new CDbCriteria();
        $dbCriteria->addInCondition('country_id', $countriesKeys);
        $universities = $this->GetArray('University', 'id_university', 'name_' . Yii::app()->language, $dbCriteria);
        
        $this->GeneratePicsCommon($year, $countries);
        $this->GeneratePicsProcess($year, $processTeachers, $processStudents, $universities);
        $this->GeneratePicsMethodic($year, $methodic, $universities);
        $this->GeneratePicsLabs($year, $universities);
        $this->GeneratePicsDiploma($year, $universities);
    }
    
    private function GeneratePicsCommon($year, $countries)
    {
        $modelStudent = new StudentStatistic();
        $modelTeacher = new TeacherStatistic();
        if(!isset($year))
        {
            $year = $modelTeacher->getLastYear();
        }
        $conditions['year'] = $year;
        $teachers = $modelTeacher->getCountByCountries(true, false, $conditions); 
        $students = $modelStudent->getCountByCountries(true, false, $conditions);
        
        $data = array();
        foreach($teachers as $row)
        {
            $data[$row['country_id']]['t_' . $row['involved_person_id']] = $row['num'];
        }
        foreach($students as $row)
        {
            $data[$row['country_id']]['s_' . $row['involved_person_id']] = $row['num'];
        }
        $teachers = $modelTeacher->getCountByCountries(false, false, $conditions); 
        $students = $modelStudent->getCountByCountries(false, false, $conditions);
        $dataPersonType = array();
        $dataPersonType1 = array();
        $dataTeachers = array();
        $dataStudents = array();
        $axes = array();
        foreach($teachers as $teacher)
        {
            $id_country = $teacher['country_id'];
            foreach($students as $student)
            {
                if ($student['country_id'] == $id_country)
                {
                    $total = $teacher['num'] + $student['num'];
                    $dataPersonType[1][$id_country] = round($teacher['num'] / $total * 100);
                    $dataPersonType[2][$id_country] = round($student['num'] / $total * 100);
                    
                    array_push($dataTeachers, round($teacher['num'] / $total * 100));
                    array_push($dataStudents, round($student['num'] / $total * 100));
                    array_push($axes, $countries[$id_country]);
                }
            }
        }
        $dataPersonType1[Yii::t('analytic','teachers')] = $dataTeachers;
        $dataPersonType1[Yii::t('analytic','students')] = $dataStudents;
        
        $reportChart1 = new BarChart();
        $reportChart1->data = $dataPersonType1;
        $reportChart1->xAxes = $axes;
        $reportChart1->name = 'report1';
        $reportChart1->legend_left = 500;
        $reportChart1->axisName = '%';
        $reportChart1->GenerateChart();
    }
    
    private function GeneratePicsProcess($year, $questionTeachers, $questionStudents, $universities)
    {
        $modelTeacher = new TeacherStatistic();
        $conditions['year'] = $year;
        if(isset($universities))
        {
            $selected = array();
            foreach ($universities as $item => $value)
            {
                array_push($selected, $item);
            }
            $conditions['university_id'] = $selected;
        }
        
        $teachers = $modelTeacher->getCommonByUniversities($questionTeachers, true, false, $conditions);        
        $modelStudent = new StudentStatistic();
        $students = $modelStudent->getCommonByUniversities($questionStudents, true, false, $conditions);
        
        $teachersMax = AnalyticController::GetMaxArrayOf($teachers);
        $studentsMax = AnalyticController::GetMaxArrayOf($students);
        
        $axes = array();
        $legend = array();
        $height = 80 + count($teachersMax['values'])*30 + 100;
        foreach($teachers as $question => $questionValue)
        {
            array_push($axes, $this->teachers_questions[$question]);
        }
        $colors = AnalyticController::getColorByUniversity($teachersMax['keys'], $universities);
        $maxUniversities = AnalyticController::getMaxUniverstities($colors);
        
        $reportChart2 = new HorizontalBarChart();
        $reportChart2->data = array('some' => $teachersMax['values']);
        $reportChart2->xAxes = $axes;
        $reportChart2->width = 850;
        $reportChart2->height = $height;
        $reportChart2->legend = $universities;
        $reportChart2->margin_left = 400;
        $reportChart2->margin_top = 80;
        $reportChart2->margin_bottom = 100;
        $reportChart2->title = Yii::t('analytic', 'educational_institute_info_teachers');
        $reportChart2->name = 'report21';
        $reportChart2->colors = $colors['colors'];
        $reportChart2->legend_left = 280;
        $reportChart2->legend_top = $height-80;
        $reportChart2->axisName = '%';
        $reportChart2->additionalColors = $maxUniversities['colors'];
        $reportChart2->additionalLegendData = $maxUniversities['university'];
        $reportChart2->GenerateChart();
        
        $axes = array();
        $legend = array();
        $height = 80 + count($studentsMax['values'])*30 + 100;
        foreach($students as $question => $questionValue)
        {
            array_push($axes, Yii::t('analytic', $question));
        }
        $colors = AnalyticController::getColorByUniversity($studentsMax['keys'], $universities);
        $maxUniversities = AnalyticController::getMaxUniverstities($colors);
        
        $reportChart2->data = array('some' => $studentsMax['values']);
        $reportChart2->xAxes = $axes;
        $reportChart2->height = $height;
        $reportChart2->title = Yii::t('analytic', 'educational_institute_info_students');
        $reportChart2->name = 'report22';
        $reportChart2->colors = $colors['colors'];
        $reportChart2->legend_top = $height-80;
        $reportChart2->additionalColors = $maxUniversities['colors'];
        $reportChart2->additionalLegendData = $maxUniversities['university'];
        $reportChart2->GenerateChart(); 
    }
    
    private function GeneratePicsMethodic($year, $questions, $universities)
    {
        $modelTeacher = new TeacherStatistic();
        $modelStudent = new StudentStatistic();
        
        $conditions['year'] = $year;
        if(isset($universities))
        {
            $selected = array();
            foreach ($universities as $item => $value)
            {
                array_push($selected, $item);
            }
            $conditions['university_id'] = $selected;
        }
        $conditions['involved_person_id'] = '1';
        $teachersInvolved = $modelTeacher->getMethodic($questions, true, $conditions);
        $studentsInvolved = $modelStudent->getMethodic($questions, true, $conditions);
        $conditions['involved_person_id'] = '2';
        $teachersNotInvolved = $modelTeacher->getMethodic($questions, true, $conditions);
        $studentsNotInvolved = $modelStudent->getMethodic($questions, true, $conditions);
        $questions = array();
        foreach ($questions as $column)
        {
            $questions[$column] = Yii::t('analytic', $column);
        }
        
        $width = 50+count($teachersInvolved)*65+50;
        $legend = array('0' => 'n/a');
        $axes = array();
        foreach($teachersInvolved as $key => $row)
        {
            array_push($axes, Yii::t('analytic',$key));
        }
        
        $reportChart3 = new BarChart();
        $reportChart3->data = AnalyticController::GetArrayTransform($teachersInvolved, array('5','4','3','2','1'));
        $reportChart3->xAxes = $axes;
        $reportChart3->legend = $legend;
        $reportChart3->title = Yii::t('analytic', 'teachers') . ' (' . Yii::t('analytic', 'participated') . ')';
        $reportChart3->name = 'report31';
        $reportChart3->rotation = 90;
        $reportChart3->width = $width;
        $reportChart3->height = 750;
        $reportChart3->margin_bottom = 350;
        $reportChart3->margin_top = 60;
        $reportChart3->axisName = '%';
        $reportChart3->GenerateChart();
        
        $reportChart3->data = AnalyticController::GetArrayTransform($teachersNotInvolved, array('5','4','3','2','1'));
        $reportChart3->name = 'report32';
        $reportChart3->title = Yii::t('analytic', 'teachers') . ' (' . Yii::t('analytic', 'notparticipated') . ')';
        $reportChart3->GenerateChart();
        
        $axes = array();
        foreach($studentsInvolved as $key => $row)
        {
            array_push($axes, Yii::t('analytic',$key));
        }
        $reportChart3->data = AnalyticController::GetArrayTransform($studentsInvolved, array('5','4','3','2','1'));
        $reportChart3->xAxes = $axes;
        $reportChart3->title = Yii::t('analytic', 'teachers') . ' (' . Yii::t('analytic', 'participated') . ')';
        $reportChart3->name = 'report33';
        $reportChart3->GenerateChart();
        
        $reportChart3->data = AnalyticController::GetArrayTransform($studentsNotInvolved, array('5','4','3','2','1'));
        $reportChart3->title =  Yii::t('analytic', 'teachers') . ' (' . Yii::t('analytic', 'notparticipated') . ')';
        $reportChart3->name = 'report34';
        $reportChart3->GenerateChart();
    }
    
    private function GeneratePicsLabs($year, $universities)
    {
        $modelTeacher = new TeacherStatistic();
        $conditions['year'] = $year;
        if(isset($universities))
        {
            $selected = array();
            foreach ($universities as $item => $value)
            {
                array_push($selected, $item);
            }
            $conditions['university_id'] = $selected;
        }
        $teachers = $modelTeacher->getLabsByUniversities($conditions);
        $modelStudent = new StudentStatistic();
        $students = $modelStudent->getLabsByUniversities($conditions);
        $practice_teachers = $modelTeacher->getPracticeByUniversities($conditions);
        $practice_students = $modelStudent->getPracticeByUniversities($conditions);
        $practice_duration_teachers = $modelTeacher->getPracticeDurationByUniversities($conditions);
        $practice_duration_students = $modelStudent->getPracticeDurationByUniversities($conditions);
        
        $axes = array();
        foreach($teachers as $key => $row)
        {
            array_push($axes, $universities[$key]);
        }
        $legend = array(
                1 => Yii::t('answerteacher','labs_comment_1'),
                2 => Yii::t('answerteacher','labs_comment_2'),
                3 => Yii::t('answerteacher','labs_comment_3'),
                4 => Yii::t('answerteacher','labs_comment_4')
        );
        $height = 80 + count($teachers)*80 + 100;
        $reportChart4 = new HorizontalBarChart();
        $reportChart4->data = AnalyticController::GetArrayTransform($teachers, array('1','2','3','4'));
        $reportChart4->xAxes = $axes;
        $reportChart4->legend = $legend;
        $reportChart4->title = Yii::t('analytic', 'labs_comment');
        $reportChart4->name = 'report41';
        $reportChart4->margin_left = 280;
        $reportChart4->width = 750;
        $reportChart4->margin_top = 80;
        $reportChart4->margin_bottom = 100;
        $reportChart4->height = $height;
        $reportChart4->legend_left = 100;
        $reportChart4->legend_top = $height-80;
        $reportChart4->axisName = '%';
        $reportChart4->GenerateChart();
        
        $height = 80 + count($students)*80 + 100;
        $axes = array();
        foreach($students as $key => $row)
        {
            array_push($axes, $universities[$key]);
        }
        $legend = array(
                1 => Yii::t('answerstudent','labs_comment_1'),
                2 => Yii::t('answerstudent','labs_comment_2'),
                3 => Yii::t('answerstudent','labs_comment_3'),
                4 => Yii::t('answerstudent','labs_comment_4')
        );
        $reportChart4->data = AnalyticController::GetArrayTransform($students, array('1','2','3','4'));
        $reportChart4->xAxes = $axes;
        $reportChart4->legend = $legend;
        $reportChart4->height = $height;
        $reportChart4->legend_top = $height-80;
        $reportChart4->name = 'report42';
        $reportChart4->GenerateChart();

        $height = 30 + count($practice_teachers)*60 + 30;
        $axes = array();
        foreach($practice_teachers as $key => $row)
        {
            array_push($axes, $universities[$key]);
        }
        $legend = array(
                1 => Yii::t('answer', 'yes'),
                0 => Yii::t('answer', 'no'),
        );
        $reportChart4 = new HorizontalBarChart();
        $reportChart4->data = AnalyticController::GetArrayTransform($practice_teachers, array('1','0'));
        $reportChart4->xAxes = $axes;
        $reportChart4->legend = $legend;
        $reportChart4->height = $height;
        $reportChart4->width = 750;
        $reportChart4->margin_left = 280;
        $reportChart4->name = 'report43';
        $reportChart4->axisName = '%';
        $reportChart4->GenerateChart();
        
        $reportChart4->data = AnalyticController::GetArrayTransform($practice_students, array('1','0'));
        $height = 30 + count($practice_students)*60 + 30;
        $axes = array();
        foreach($students as $key => $row)
        {
            array_push($axes, $universities[$key]);
        }
        $reportChart4->name = 'report44';
        $reportChart4->xAxes = $axes;
        $reportChart4->height = $height;
        $reportChart4->GenerateChart();
    
        $width = 50 + count($practice_duration_teachers)*50 + 350;
        $legend = array();
        foreach ($practice_duration_teachers as $key => $row)
        {
            $legend[$key] = $universities[$key];
        }
        $colors = AnalyticController::getColorByUniversity(array_keys($practice_duration_teachers), $universities);
        $reportChart4 = new BarChart();
        $reportChart4->data = $practice_duration_teachers;
        $reportChart4->legend = $legend;
        $reportChart4->title = Yii::t('analytic', 'practice_duration_teachers');
        $reportChart4->name = 'report45';
        $reportChart4->margin_right = 300;
        $reportChart4->margin_top = 80;
        $reportChart4->width = $width;
        $reportChart4->height = 350;
        $reportChart4->legend_top = 160;
        $reportChart4->legend_left = $width - 285;
        $reportChart4->axisName = Yii::t('analytic','days');
        $reportChart4->colors = $colors['colors'];
        $reportChart4->GenerateChart();
        
        $width = 50 + count($practice_duration_students)*50 + 350;
        $legend = array();
        foreach ($practice_duration_students as $key => $row)
        {
            $legend[$key] = $universities[$key];
        }
        $colors = AnalyticController::getColorByUniversity(array_keys($practice_duration_students), $universities);
        $reportChart4->data = $practice_duration_students;
        $reportChart4->title = Yii::t('analytic', 'practice_duration_students');
        $reportChart4->legend = $legend;
        $reportChart4->width = $width;
        $reportChart4->name = 'report46';
        $reportChart4->legend_left = $width - 285;
        $reportChart4->colors = $colors['colors'];
        $reportChart4->GenerateChart();
    }
    
    private function GeneratePicsDiploma($year, $universities)
    {
        $modelTeacher = new TeacherStatistic();
        $conditions['year'] = $year;
        if(isset($universities))
        {
            $selected = array();
            foreach ($universities as $item => $value)
            {
                array_push($selected, $item);
            }
            $conditions['university_id'] = $selected;
        }
        $papersAverage = $modelTeacher->getAveragePapersByUniversities($conditions);
        $papersTheoretical = $modelTeacher->getPapersByUniversities($conditions);
        $teachersPrivateSector = $modelTeacher->getPrivateSectorByUniversities($conditions);
        $teachersPrivateSectorPercentage = $modelTeacher->getPrivateSectorByUniversities($conditions, TRUE);
        $modelStudent = new StudentStatistic();
        $studentsPrivateSectorPercentage = $modelStudent->getPrivateSectorByUniversities($conditions,TRUE);
        
        $width = 50 + count($papersAverage)*50 + 350;
        $colors = AnalyticController::getColorByUniversity(array_keys($papersAverage), $universities);
        if(count($papersAverage)>0)
        {
            $reportChart5 = new BarChart();
            $reportChart5->data = $papersAverage;
            $reportChart5->legend = $universities;
            $reportChart5->name = 'report51';
            $reportChart5->margin_right = 300;
            $reportChart5->margin_top = 20;
            $reportChart5->width = $width;
            $reportChart5->height = 290;
            $reportChart5->legend_top = 100;
            $reportChart5->legend_left = $width - 285;
            $reportChart5->colors = $colors['colors'];
            $reportChart5->GenerateChart();
        }
    
        $legend = array(
                'papers_theoretical' => Yii::t('analytic', 'papers_theoretical'),
                'papers_practical' => Yii::t('analytic', 'papers_practical'),
        );
        $axes = array();
        foreach($papersTheoretical as $key => $row)
        {
            array_push($axes, $universities[$key]);
        }
        $width = 50 + count($papersTheoretical)*90 + 30;
        if(count($papersTheoretical)>0)
        {
            $reportChart5 = new BarChart();
            $reportChart5->data = AnalyticController::GetArrayTransform($papersTheoretical, array('papers_theoretical', 'papers_practical'));
            $reportChart5->xAxes = $axes;
            $reportChart5->legend = $legend;
            $reportChart5->name = 'report52';
            $reportChart5->margin_right = 30;
            $reportChart5->margin_left = 50;
            $reportChart5->margin_bottom = 260;
            $reportChart5->width = $width;
            $reportChart5->height = 560;
            $reportChart5->legend_top = 40;
            $reportChart5->legend_left = $width - 150;
            $reportChart5->rotation = 90;
            $reportChart5->axisName = '%';
            $reportChart5->GenerateChart();
        }
    
        $data = array();
        $xAxes = array();
        foreach ($teachersPrivateSector as $key => $value)
        {
            array_push($data, $value);
            array_push($xAxes, $universities[$key]); 
        }
        $colors = AnalyticController::getColorByUniversity(array_keys($teachersPrivateSector), $universities);
        if(count($teachersPrivateSector)>0)
        {
            $reportChart5 = new PieChart();
            $reportChart5->data = array('some' => $data);
            $reportChart5->xAxes = $xAxes;
            $reportChart5->title = Yii::t('analytic','by_words_teachers');
            $reportChart5->name = 'report53';
            $reportChart5->margin_right = 300;
            $reportChart5->margin_top = 80;
            $reportChart5->margin_left = 140;
            $reportChart5->width = 550;
            $reportChart5->height = 320;
            $reportChart5->legend_top = 130;
            $reportChart5->legend_left = 560 - 285;
            $reportChart5->colors = $colors['colors'];
            $reportChart5->GenerateChart();
        }
    
        $width = 50 + count($teachersPrivateSectorPercentage)*50 + 350;
        $colors = AnalyticController::getColorByUniversity(array_keys($teachersPrivateSectorPercentage), $universities);
        if(count($teachersPrivateSectorPercentage)>0)
        {
            $reportChart5 = new BarChart();
            $reportChart5->data = $teachersPrivateSectorPercentage;
            $reportChart5->legend = $universities;
            $reportChart5->name = 'report54';
            $reportChart5->title = Yii::t('analytic','by_words_teachers');
            $reportChart5->margin_right = 300;
            $reportChart5->margin_top = 80;
            $reportChart5->width = $width;
            $reportChart5->height = 350;
            $reportChart5->legend_top = 160;
            $reportChart5->legend_left = $width - 285;
            $reportChart5->axisName = '%';
            $reportChart5->colors = $colors['colors'];
            $reportChart5->GenerateChart();
        }
    
        $width = 50 + count($studentsPrivateSectorPercentage)*50 + 350;
        $colors = AnalyticController::getColorByUniversity(array_keys($studentsPrivateSectorPercentage), $universities);
        if(count($studentsPrivateSectorPercentage)>0)
        {
            $reportChart5 = new BarChart();
            $reportChart5->data = $studentsPrivateSectorPercentage;
            $reportChart5->legend = $universities;
            $reportChart5->name = 'report55';
            $reportChart5->title = Yii::t('analytic','by_words_students');
            $reportChart5->margin_right = 300;
            $reportChart5->margin_top = 80;
            $reportChart5->width = $width;
            $reportChart5->height = 350;
            $reportChart5->legend_top = 160;
            $reportChart5->legend_left = $width - 285;
            $reportChart5->axisName = '%';
            $reportChart5->colors = $colors['colors'];
            $reportChart5->GenerateChart();
        }
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