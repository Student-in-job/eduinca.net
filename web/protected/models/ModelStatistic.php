<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ModelStatistic
{
    protected $_command;
    protected $_data;
    protected $_id;
    protected $_keys;
    protected $_tableName;
    
    public function __get($name) {
        if (method_exists($this, ($method = 'get_' . $name))) {
            return $this->$method();
        } else {
            return;
        }
    }

    protected function init()
    {
        if(is_null($this->_command)){
            $this->_command = Yii::app()->db->createCommand();
        }
    }
    
    protected function buildCommand($attributes = null, $tables = null, $group = null, $where = null)
    {
        if(!is_null($attributes)){
            $this->_command->select($attributes);
        }
        $this->_command->from($this->_tableName);
        if(!is_null($tables))
        {
            if(is_array($tables))
            {
                foreach($tables as $join => $condition)
                {
                    $this->_command->join($join, $condition);
                }
            }
        }
        if(!is_null($where)){
            if(is_array($where)){
                foreach ($where as $columns => $params) {
                    $this->_command->where($columns, $params);
                }
            }
        }
        if(!is_null($group)){
            $this->_command->group($group);
        }
    }
    
    protected  function ToPersentage($array, $sum)
    {
        $data = array();
        foreach($array as $ikey => $ivalue)
        {
            foreach($ivalue as $key => $value)
            {
                if ($sum != 0){
                    $temp = $value/$sum;
                }
                else{
                    $temp = $value;
                }
                $data[$ikey][$key] = round($temp*100);
            }
        }
        return $data;
    }
    
    protected function ToArray($assosiative)
    {
        $data = array();
        $index = 0;
        foreach($assosiative as $ikey => $ivalue)
        {
            foreach ($ivalue as $key => $value)
            {
                $data[$index] = $value;
            }
            $index++;
        }
    }
            
    function __construct($attributes = null, $tables = null) {
        $this->init();
        $this->buildCommand($attributes = null, $tables = null);
    }
    
    public function getId() {
        return $this->_id;
    }
    
    public function getData($refresh = null)
    { 
        if ($refresh) {
            $this->_data = $this->_command->queryAll();
        }
        return $this->_data;
    }
    
    public function getKeys()
    {
        return $this->_keys;
    }
    
    public function get_totalItemCount()
    {
        return count($this->_data);
    }
    
    public function get_totalColumnCount()
    {
        return count($this->_keys);
    }
    
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
    
    protected  function setCommonCount($column, $involved = true)
    {
        $attributes = array('count(id_answer) as num', $column);
        $group = array($column);
        if($involved){
            $where = array('involved_person_id = :id' => array(':id' => '1'));
        }
        else{
            $where = array('involved_person_id = :id' => array(':id' => '2'));
        }
        $this->buildCommand($attributes, null, $group, $where);
    }

    public function getMethodic($column, $persentage = false, $involved = true)
    {
        $data = array();
        $this->setCommonCount($column, $involved);
        $result = $this->_command->queryAll();
        $data[$column] = array('5' => 0, '4' => 0, '3' => 0, '2' => 0, '1' => 0, '0' => 0);
        $sum = 0;
        foreach ($result as $row)
        {
            $sum += $row['num'];
            switch($row[$column])
            {
                case 1: $data[$column]['1'] += $row['num']; break;
                case 2: $data[$column]['2'] += $row['num']; break;
                case 3: $data[$column]['3'] += $row['num']; break;
                case 4: $data[$column]['4'] += $row['num']; break;
                case 5: $data[$column]['5'] += $row['num']; break;
                default: $data[$column]['0'] += $row['num']; break;
            }
        }
        if($persentage){
            return $this->ToPersentage($data, $sum);
        }
        else{
            return $data;
        }
    }
    
    public function getFrequency($column, $persentage = false, $involved = true)
    {
        $data = array();
        $this->setCommonCount($column, $involved);
        $result = $this->_command->queryAll();
        $data[$column] = array('1' => 0, '2' => 0, '3' => 0, '4' => 0, '5' => 0);
        $sum = 0;
        foreach ($result as $row)
        {
            $sum += $row['num'];
            switch($row[$column])
            {
                case 1: $data[$column]['1'] += $row['num']; break;
                case 2: $data[$column]['2'] += $row['num']; break;
                case 3: $data[$column]['3'] += $row['num']; break;
                case 4: $data[$column]['4'] += $row['num']; break;
                case 5: $data[$column]['5'] += $row['num']; break;
                default: $sum -= $row['num']; break;
            }
        }
        if($persentage){
            return $this->ToArray($this->ToPersentage($data, $sum));
        }
        else{
            return $this->ToArray($data);
        }
    }
}