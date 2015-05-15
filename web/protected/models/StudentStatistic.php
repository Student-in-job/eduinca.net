<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class StudentStatistic extends ModelStatistic
{     
    public function __construct($attributes = null, $tables = null, $group = null, $where = null) {
        $this->init();
        $this->_tableName = 'tbl_answer_student';
        $this->_id = 'answer';
        parent::__construct();
    }
    
    public function setCountBySex()
    {
        $this->_keys = array('num','sex');
        $attributes = array('count(id_answer) as num', 'sex');
        $where = array('involved_person_id = :id' => array(':id' => '2'));
        $group = array('sex');
        $this->buildCommand($attributes, null, $group, $where);
    }
}