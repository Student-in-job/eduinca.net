<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class techstud_table extends CWidget
{
    /**
     * @var string имя пользователя
     */
    public $username = '';
    /**
     * Запуск виджета
     */
    public function run()
    {
        $this->render('index', array(
            /*'username' => $this->username,*/
             'dataProvider' => 'dataProvider',
             'students' => 'studentBySex',
             'teachers' => 'teacherBySex',
        ));
    }
}