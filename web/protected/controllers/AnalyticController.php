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
        $student = new StudentStatistic();
        $teacher = new TeacherStatistic();
        switch ($type) {
            case 1:
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
                $student->setCountBySex();
                $data = $student->getData(true);
                break;

            default:
                break;
        }
    }
}