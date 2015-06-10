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
    
    public function getAveragePapersByUniversities($conditions = null)
    {
        $avgColumn = 'num_of_papers';
        $columns = array('university_id');
        $this->init();
        if(!isset($conditions))
            $conditions = array('num_of_papers' => ISNOTNULL);
        else
            $conditions['num_of_papers'] = ISNOTNULL;
        $this->setCommonAgregate(AVG ,$avgColumn ,$columns, null, $conditions);
        $records = $this->_command->queryAll();
        //var_dump($this->_command->text);
        //var_dump($records);
        $templateArray = array();
        $data = $this->ToAssosiative($records, 'university_id', 'num', $templateArray);
        //var_dump($data);
        $this->RoundValues($data);
        return $data;
    }
    
    public function getPapersByUniversities($conditions = null)
    {
        $conditions1 = $conditions;
        $agregateColumn = 'num_of_papers_theoretical';
        $columns = array('university_id');
        if(!isset($conditions))
            $conditions = array($agregateColumn => ISNOTNULL);
        else
            $conditions[$agregateColumn] = ISNOTNULL;
        $this->init();
        $this->setCommonAgregate(SUM, $agregateColumn, $columns, null, $conditions);
        $records = $this->_command->queryAll();
        $templateArray = array();
        $theoreticalPapers = $this->ToAssosiative($records, 'university_id', 'num', $templateArray);
        $this->RoundValues($theoreticalPapers);
        $agregateColumn = 'num_of_papers_practical';
        if(!isset($conditions))
            $conditions1 = array($agregateColumn => ISNOTNULL);
        else
            $conditions1[$agregateColumn] = ISNOTNULL;
        $this->init();
        $this->setCommonAgregate(SUM, $agregateColumn, $columns, null, $conditions1);
        $records = $this->_command->queryAll();
        $practicalPapers = $this->ToAssosiative($records, 'university_id', 'num', $templateArray);
        $this->RoundValues($practicalPapers);
        if(count($theoreticalPapers)>count($practicalPapers))
        {
            $inner = $practicalPapers;
            $outer = $theoreticalPapers;
            $innerKey = 'papers_practical';
            $outerKey = 'papers_theoretical';
        }
        else
        {
            $outer = $practicalPapers;
            $inner = $theoreticalPapers;
            $innerKey = 'papers_theoretical';
            $outerKey = 'papers_practical';
        }
        $data = array();
        foreach($outer as $key => $value1)
        {
            $value2 = (isset($inner[$key]))?$inner[$key]:0;
            $data[$key] = array($outerKey => $value1, $innerKey => $value2);
        }
        return $this->ToPercentage($data);
    }
}