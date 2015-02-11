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
}