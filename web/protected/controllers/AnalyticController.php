<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AnalyticController extends Controller
{
    public $layout='//layouts/column2';

    public function init(){
        if (isset($_GET['lang'])) {
            Yii::app()->setLanguage($_GET['lang']);
        }
        Yii::app()->name = Yii::t('site', 'sitename');
        parent::init();
    }
        
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
                $header = array('', '5 (%)', '4 (%)', '3 (%)', '2 (%)', '1 (%)', 'n/a (%)');
                
                $this->render('methodic', array(
                    'dataTeacher' => $dataTeacher,
                    'dataStudent' => $dataStudent,
                    'header' => $header,
                ));
                break;
            case 3:
                $dataTeacher = array();
                $dataStudent = array();
                $columns = array('methodic_q1', 'methodic_q5', 'methodic_q8', 'methodic_q9', 'methodic_q13');
                foreach($columns as $column)
                {
                    $teacher = new TeacherStatistic();
                    $dataTeacher[$column] = $teacher->getFrequency($column, true, false);
                    $student = new StudentStatistic();
                    $dataStudent[$column] = $student->getMethodic($column, true);
                }
                $header = array('', '5 (%)', '4 (%)', '3 (%)', '2 (%)', '1 (%)', 'n/a (%)');
                
                $this->render('frequency', array(
                    'dataTeacher' => $dataTeacher,
                    'dataStudent' => $dataStudent,
                    'header' => $header,
                ));
                break;

            default:
                break;
        }
    }
}