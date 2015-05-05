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
    
    function actionView($type=null)
    {
        switch ($type) {
            case 1:
                $student = new StudentStatistic();
                $teacher = new TeacherStatistic();
                $student->setCount();
                $teacher->setCount();
                $data = array_merge($student->getData(true), $teacher->getData(true));
                $dataProvider = new CArrayDataProvider($data, array(
                        'id' => 'id',
                        'sort' => array(
                            'attributes' => array('name', 'num')
                        ),
                        'pagination' => array(
                            'pageSize' => 10,
                        )
                    ));
                $studentBySex = new StudentStatistic();
                $studentBySex->setCountBySex();
                $teacherBySex = new TeacherStatistic();
                $teacherBySex->setCountBySex();
                //var_dump($dataProvider->getData());
                
                $this->render('allanswer', array(
                    'dataProvider' => $dataProvider,
                    'students' => $studentBySex->getData(true),
                    'teachers' => $teacherBySex->getData(true),
                ));
                break;
            case 2:
                $dataTeacher = array();
                $dataStudent = array();
                $columnsTeacher = array('common_q1', 'common_q2', 'common_q3', 'common_q4', 'common_q5', 'common_q6', 'common_q7', 'common_q8', 'common_q9');
                foreach($columnsTeacher as $column)
                {
                    $teacher = new TeacherStatistic();
                    $dataTeacher[$column] = $teacher->getMethodic($column, true);
                    
                }
                $columnsStudent = array('common_q1', 'common_q2', 'common_q3', 'common_q4', 'common_q5', 'common_q6', 'common_q7', 'common_q8', 'common_q9', 'common_q10', 'common_q11');
                foreach($columnsStudent as $column)
                {
                    $student = new StudentStatistic();
                    $dataStudent[$column] = $student->getMethodic($column, true);
                }
                
                $header = array('', '5 <br/> (%)', '4  <br/>(%)', '3 <br/> (%)', '2 <br/> (%)', '1 <br/> (%)', 'n/a <br/> (%)');
                
                $this->render('methodic', array(
                    'dataTeacher' => $dataTeacher,
                    'dataStudent' => $dataStudent,
                    'header' => $header,
                ));
                break;
            case 3:
                $this->layout='//layouts/column3';
                $dataTeacher = array();
                $dataTeacherNot = array();
                $dataStudent = array();
                $dataStudentNot = array();
                $columns = array('methodic_q1', 'methodic_q5', 'methodic_q8', 'methodic_q9', 'methodic_q13');
                foreach($columns as $column)
                {
                    $teacher = new TeacherStatistic();
                    $dataTeacher[$column] = $teacher->getFrequency($column, false, false);
                    $teacherNot = new TeacherStatistic();
                    $dataTeacherNot[$column] = $teacherNot->getFrequency($column, false);
                    $student = new StudentStatistic();
                    $dataStudent[$column] = $student->getFrequency($column, false, false);
                    $studentNot = new TeacherStatistic();
                    $dataStudentNot[$column] = $studentNot->getFrequency($column, false);
                }
                $header = array('', '5 <br/>(%)', '4  <br/>(%)', '3  <br/>(%)', '2  <br/>(%)', '1  <br/>(%)', 'n/a  <br/>(%)');
                $this->render('frequency', array(
                    'dataTeacher' => $dataTeacher,
                    'dataStudent' => $dataStudent,
                    'dataTeacherNot' => $dataTeacherNot,
                    'dataStudentNot' => $dataStudentNot,
                    'header' => $header,
                ));
                break;
            case 4:
                $data = '';
                $this->render('HBars', array(
                    'data' => $data,
                ));
                break;
            case 5:
                $teacher = new TeacherStatistic();
                $dataY = $teacher->getPracticeParticipation('private_papers');
                $teacher = new TeacherStatistic();
                $dataN = $teacher->getPracticeParticipation('private_papers', 'ANY');
                $this->render('private_papers', array(
                    'dataY' => $dataY,
                    'dataN' => $dataN,
                ));
            default:
                break;
        }
    }
    
    public function actionCommon() {
        $modelStudent = new StudentStatistic();
        $modelTeacher = new TeacherStatistic();
        $teachers = $modelTeacher->getCountByCountries(true); 
        $students = $modelStudent->getCountByCountries(true);
        
        $country = $this->GetArray('Country', 'id_country', 'name_' . Yii::app()->language);
        $data = array();
        foreach($teachers as $row)
        {
            //$data[$row['country_id']]['country_id'] = $country[$row['country_id']];
            $data[$row['country_id']]['t_' . $row['involved_person_id']] = $row['num'];
        }
        foreach($students as $row)
        {
            $data[$row['country_id']]['s_' . $row['involved_person_id']] = $row['num'];
        }
        $teachers = $modelTeacher->getCountByCountries(); 
        $students = $modelStudent->getCountByCountries();
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
        ));
    }
    
    public function actionEducationProcess()
    {
        $modelTeacher = new TeacherStatistic();
        $columns = array('common_q1', 'common_q2', 'common_q3', 'common_q4', 'common_q5', 'common_q6', 'common_q7', 'common_q8', 'common_q9');
        $teachers = $modelTeacher->getCommonByUniversities($columns, true);
        $columns = array('common_q1', 'common_q2', 'common_q3', 'common_q4', 'common_q5', 'common_q6', 'common_q7', 'common_q8', 'common_q9', 'common_q10', 'common_q11');
        $modelStudent = new StudentStatistic();
        $students = $modelStudent->getCommonByUniversities($columns, true);
        $this->render('educationProcess', array(
                'teachers' => $teachers,
                'students' => $students,
                'universities' => $this->GetArray('University', 'id_university', 'name_' . Yii::app()->language),
        ));
    }
    
    public function actionEducationMethodic()
    {
        $modelTeacher = new TeacherStatistic();
        $columns = array('methodic_q1', 'methodic_q2', 'methodic_q3', 'methodic_q4', 'methodic_q5', 'methodic_q6', 'methodic_q7', 'methodic_q8', 'methodic_q9', 'methodic_q10', 'methodic_q11', 'methodic_q12', 'methodic_q13');
        $teachers = $modelTeacher->getCommonByUniversities($columns, true);
        $columns = array('methodic_q1', 'methodic_q2', 'methodic_q3', 'methodic_q4', 'methodic_q5', 'methodic_q6', 'methodic_q7', 'methodic_q8', 'methodic_q9', 'methodic_q10', 'methodic_q11', 'methodic_q12', 'methodic_q13');
        $modelStudent = new StudentStatistic();
        $students = $modelStudent->getCommonByUniversities($columns, true);
        $this->render('educationMethodic', array(
                'teachers' => $teachers,
                'students' => $students,
                'universities' => $this->GetArray('University', 'id_university', 'name_' . Yii::app()->language),
        ));
    }
}