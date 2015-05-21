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
        $this->_id = 'answer';
        parent::__construct();
    }
}