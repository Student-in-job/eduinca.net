<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//include 'pChart/class/pData.class.php';
//include 'pChart/class/pDraw.class.php';
//include 'pChart/class/pImage.class.php';
        
class AnalyticController extends Controller
{
    protected  $menuItem = 'analytic';
    public $layout='//layouts/column1';

    function actionIndex()
    {
        $this->render('index');
    }
    
    public function actionFilter($type = null)
    {
        
        $filter = $_POST['FilterForm'];
        $year = $filter['year'];
        $universities = ($filter['universities']!="")?$filter['universities']:null;
        switch($_POST['type'])
        {
            case ANALYTIC_PROCESS:
            {
                $questions_teachers = ($filter['questions_teachers']!="")?$filter['questions_teachers']:null;
                $questions_students = ($filter['questions_students']!="")?$filter['questions_students']:null;
                $this->actionEducationProcess($year, $questions_teachers, $questions_students, $universities);
                break;
            }
            case ANALYTIC_METHODIC:
            {
                $questions = ($filter['questions']!="")?$filter['questions']:null;
                $this->actionEducationMethodic($year, $questions, $universities);
                break;
            }
            case ANALYTIC_LABS:
            {
                $this->actionEducationLabs($year, $universities);
                break;
            }
            case ANALYTIC_DIPLOMA:
            {
                $this->actionEducationDiploma($year, $universities);
                break;
            }
            case ANALYTIC_COMMON:
            {
                $this->actionCommon($year);
                break;
            }
        }
        Yii::app()->end();
    }
    
    public function actionCommon($year = null) {
        $modelStudent = new StudentStatistic();
        $modelTeacher = new TeacherStatistic();
        if(!isset($year))
        {
            $year = $modelTeacher->getLastYear();
        }
        $conditions['year'] = $year;
        $teachers = $modelTeacher->getCountByCountries(true, false, $conditions); 
        $students = $modelStudent->getCountByCountries(true, false, $conditions);
        
        $country = $this->GetArray('Country', 'id_country', 'name_' . Yii::app()->language);
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
        $countries = $this->GetArray('Country', 'id_country', 'name_' . Yii::app()->language);
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
        $this->render('common', array(
                'data' => $data,
                'dataPersonType' => $dataPersonType,
                'dataPersonType1' => $dataPersonType1,
                'countries' => $countries,
                'axes' => $axes,
                'years' => $modelTeacher->getYears(),
        ));
    }
    
    public function actionEducationProcess($year = null, $questionTeachers = null, $questionStudents = null, $universities = null)
    {
        $modelTeacher = new TeacherStatistic();
        if(!isset($year))
        {
            $year = $modelTeacher->getLastYear();
        }
        $conditions['year'] = $year;
        if(!isset($questionTeachers))
        {
            $questionTeachers = array('common_q1', 'common_q2', 'common_q3', 'common_q4', 'common_q5', 'common_q6', 'common_q7', 'common_q8', 'common_q9');
        }
        if(!isset($questionStudents))
        {
            $questionStudents = array('common_q2', 'common_q4', 'common_q5', 'common_q6', 'common_q7', 'common_q8', 'common_q9', 'common_q10', 'common_q11');
        }
        if(isset($universities))
        {
            $selected = array();
            foreach ($universities as $item)
            {
                array_push($selected, $item);
            }
            $conditions['university_id'] = $selected;
        }
        $teachers = $modelTeacher->getCommonByUniversities($questionTeachers, true, false,$conditions);        
        $modelStudent = new StudentStatistic();
        $students = $modelStudent->getCommonByUniversities($questionStudents, true, false,$conditions);
        $xAxes = array();
        foreach ($questionStudents as $column)
        {
            array_push($xAxes, Yii::t('answerteacher', $column));
        }
        $this->render('educationProcess', array(
                'teachers' => $teachers,
                'students' => $students,
                'universities' => $this->GetArray('University', 'id_university', 'name_' . Yii::app()->language),
                'xAxes' => $xAxes,
                'teachersMax' => $this->GetMaxArrayOf($teachers),
                'studentsMax' => $this->GetMaxArrayOf($students),
                'years' => $modelTeacher->getYears(),
        ));
    }
    
    public function actionEducationMethodic($year = null, $questions = null, $universities = null)
    {
        $modelTeacher = new TeacherStatistic();
        $modelStudent = new StudentStatistic();
        if(!isset($year))
        {
            $year = $modelTeacher->getLastYear();
        }
        $conditions['year'] = $year;
        if(!isset($questions))
        {
            $questions = array('methodic_q1', 'methodic_q2', 'methodic_q3', 'methodic_q4', 'methodic_q5', 'methodic_q6', 'methodic_q7', 'methodic_q8', 'methodic_q9', 'methodic_q10', 'methodic_q11', 'methodic_q12', 'methodic_q13');
        }
        if(isset($universities))
        {
            $selected = array();
            foreach ($universities as $item)
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
        $this->render('educationMethodic', array(
                'teachersInvolved' => $teachersInvolved,
                'teachersNotInvolved' => $teachersNotInvolved,
                'studentsInvolved' => $studentsInvolved,
                'studentsNotInvolved' => $studentsNotInvolved,
                '$questions' => $questions,
                'universities' => $this->GetArray('University', 'id_university', 'name_' . Yii::app()->language),
                'years' => $modelTeacher->getYears(),
        ));
    }
    
    public function actionEducationLabs($year = null, $universities = null)
    {
        $modelTeacher = new TeacherStatistic();
        if(!isset($year))
        {
            $year = $modelTeacher->getLastYear();
        }
        $conditions['year'] = $year;
        if(isset($universities))
        {
            $selected = array();
            foreach ($universities as $item)
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
        $this->render('educationLabs', array(
                'teachers' => $teachers,
                'students' => $students,
                'practice_teachers' => $practice_teachers,
                'practice_students' => $practice_students,
                'practice_duration_teachers' => $practice_duration_teachers,
                'practice_duration_students' => $practice_duration_students,
                'universities' => $this->GetArray('University', 'id_university', 'name_' . Yii::app()->language),
                'years' => $modelTeacher->getYears(),
        ));    
    }
    
    public function actionEducationDiploma($year = null, $universities = null)
    {
        $modelTeacher = new TeacherStatistic();
        if(!isset($year))
        {
            $year = $modelTeacher->getLastYear();
        }
        $conditions['year'] = $year;
        if(isset($universities))
        {
            $selected = array();
            foreach ($universities as $item)
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
        $this->render('educationDiploma', array(
                'papersAverage' => $papersAverage,
                'universities' => $this->GetArray('University', 'id_university', 'name_' . Yii::app()->language),
                'paperstheoretical' => $papersTheoretical,
                'teachersPrivateSector' => $teachersPrivateSector,
                'studentsPrivateSectorPercentage' => $studentsPrivateSectorPercentage,
                'teachersPrivateSectorPercentage' => $teachersPrivateSectorPercentage,
                'years' => $modelTeacher->getYears(),
        ));
    }
    
    protected function GetMaxArrayOf($array)
    {
        $data = array();
        $data['keys'] = array();
        $data['values'] = array();
        foreach($array as $itemKey => $itemValue)
        {
            $max = 0;
            $maxCountry = 0;
            foreach ($itemValue as $key => $value)
            {
                if ($max<$value['5'])
                {
                    $max = $value['5'];
                    $maxCountry = $key;
                }
            }
            array_push($data['keys'], $maxCountry);
            array_push($data['values'], $max);
        }
        return $data;
    }
    
    protected function GetArrayTransform($array, $templateArray = null)
    {
        $data = array();
        if(isset($templateArray))
            $forArray = $templateArray;
        else
            $forArray = array('5','4','3','2','1','0');
        foreach($forArray as $index)
        {
            $data[$index] = array();
        }
        foreach($array as $key => $row)
        {
            foreach($row as $item => $value)
            {
                //if (is_null($value)) $value=0;
                array_push($data[$item], $value);
            }
        }
        return $data;
    }
    
    protected function getColorByUniversity($data, $universities)
    {
        $allColors = array();
        $counter = 0;
        foreach ($universities as $university => $values)
        {
            $allColors[$university] = $counter++;
        }
        $colors = array();
        foreach($data as $key => $value)
        {
            array_push($colors, $allColors[$key]);
        }
        return $colors;
    }
}