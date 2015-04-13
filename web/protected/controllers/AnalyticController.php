<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AnalyticController extends Controller
{
    protected  $menuItem = 'analytic';
    public $layout='//layouts/column2';

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
                $columns = array('common_q2', 'common_q3', 'common_q4', 'common_q7', 'common_q9');
                foreach($columns as $column)
                {
                    $teacher = new TeacherStatistic();
                    $dataTeacher[$column] = $teacher->getMethodic($column, true);
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
}