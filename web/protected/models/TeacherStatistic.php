<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TeacherStatistic extends ModelStatistic
{     
    public function __construct($attributes = null, $tables = null, $group = null, $where = null) {
        $this->init();
        $this->_tableName = 'tbl_answer_teacher';
        $this->buildCommand($attributes, $tables, $group, $where);
        $this->_id = 'answer';
        parent::__construct();
    }
    /*
    public function setCount()
    {
        $this->_keys = array('id', 'name', 'num');
        $attributes = array('c.id_country as id', 'c.name', 'count(id_answer) as num');
        $tables = array(
                        'tbl_university u' => 'university_id = u.id_university',
                        'tbl_country c' => 'u.country_id = c.id_country',
        );
        $group = array('id', 'c.name');
        $where = array('involved_person_id = :id' => array(':id' => '1'));
        $this->buildCommand($attributes, $tables, $group, $where);
    }
    */
    public function setCountBySex()
    {
        $this->_keys = array('num','sex');
        $attributes = array('count(id_answer) as num', 'sex');
        $where = array('involved_person_id = :id' => array(':id' => '1'));
        $group = array('sex');
        $this->buildCommand($attributes, null, $group, $where);
    }
}