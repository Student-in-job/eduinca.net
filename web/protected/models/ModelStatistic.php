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
    protected $_tableName;
    
    public function __get($name) {
        if (method_exists($this, ($method = 'get_' . $name))) {
            return $this->$method();
        } else {
            return;
        }
    }
    
    /**
     * Инициализация комманды
     */
    protected function init()
    {
        //if(is_null($this->_command)){
            $this->_command = Yii::app()->db->createCommand();
        //}
    }
    /**
     * 
     * @param array() $attributes Основные столбцы
     * @param array() $tables Указываются в виде array($join => $condition) таблицы с которыми будет соединяться данная таблица 
     * и условия соединения 
     * @param array() $group Указываются столбцы группировки
     * @param array() $where Указываются в виде array($condition => $value) условия отбора данных из таблиц и их значения
     */
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
    
    protected function ToAssosiative($array, $column, $value)
    {
        $data = array();
        if(is_array($column))
        {
            $column1 = $column[0];
            $column2 = $column[1];
            $keys = array();
            foreach($array as $row)
            {
                if(!in_array($row[$column1], $keys))
                {
                    array_push($keys, $row[$column1]);
                    $data[$row[$column1]] = array('5' => 0, '4' => 0, '3' => 0, '2' => 0, '1' => 0, '0' => 0);
                }
                //$val = $row[$column2];
                //if (!isset($val))
                //{ 
                    //$val = 'n/a';
                //}
                $data[$row[$column1]][$row[$column2]] = $row[$value];
            }
        }
        else
        {
            $data[$row[$column]] = array('5' => 0, '4' => 0, '3' => 0, '2' => 0, '1' => 0, 'n/a' => 0);
            foreach($array as $row)
            {
                $data[$row[$column]] = $row[$value];
            }
        }
        return $data;
    }
    
    protected function ToPercentage($array)
    {
        $data = array();
        if(is_array($array))
        {
            foreach($array as $item => $itemValue)
            {
                $sum = 0;
                $flag = false;
                if (is_array($itemValue))
                {
                    
                    foreach($itemValue as $row => $rowValue)
                    {
                        $sum = 0;
                        foreach($rowValue as $key => $value)
                        {
                            $sum += $value;
                        }
                        foreach($rowValue as $key => $value)
                        {
                            $data[$item][$row][$key] = round($value/$sum*100);
                        }
                    }
                }
                else
                {
                    $sum += $rowValue;
                    $flag = true;
                }
            }
            if($flag)
            {
                foreach($array as $item => $itemValue)
                {
                    $data[$item] = round($itemValue/$sum*100);
                }
                $flag = false;
            }
        }
        return $data;
    }

    protected  function ToPersentage1($array, $sum)
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
                $data[$ikey][$key] = round($temp*100, 0);
            }
        }
        return $data;
    }
    
    protected function ToArray($assosiative)
    {
        $data = array();
        $index = 1;
        foreach($assosiative as $ikey => $ivalue)
        {
            foreach ($ivalue as $key => $value)
            {
                $data[$index] = $value;
                $index++;
            }
        }
        return $data;
    }
    
    protected function ToArrayInverse($array, $column = null)
    {
        $data = array();
        foreach ($array as $item)
        {
            $bool = true;
            $newkey;
            foreach ($item as $key => $value)
            {
                if($bool){
                    $newkey = $value;
                    $bool = !$bool;
                }
                else{
                    if($column != null){
                        $data[$newkey] = array($column => $value);
                    }
                    else{
                        $data[$newkey] = $value;
                    }
                }
            }
        }
        return $data;
    }
    
    protected function transformConditions($conditions = null)
    {
        if (is_array($conditions)&&isset($conditions))
        {
            $counter = 1;
            foreach($conditions as $column => $value)
            {
                $condition = $column . '=:p' . $counter;
                $where = array(':p' . $counter => $value);
                $where[$counter++] = array($condition => $value);
            }
        }
    }
            
    function __construct($attributes = null, $tables = null) {
        $this->init();
        $this->buildCommand($attributes = null, $tables = null);
    }
    
    public function getId() {
        return $this->_id;
    }
    
    public function getTotalItemCount()
    {
        return count($this->_data);
    }
    
    public function getCountByCountries($byInvolved = false)
    {
        $this->init();
        if($byInvolved == true)
        {
            $attributes = array('u.country_id', 'involved_person_id');
        }
        else
        {
            $attributes = array('u.country_id');
        }
        $tables = array(
                        'tbl_university u' => 'university_id = u.id_university',
        );
        $this->setCommonCount($attributes, $tables);
        return $this->_command->queryAll();
    }
    
    public function getMethodicByUniversities($columns = null, $byInvolved = false)
    {
        if (!isset($columns))
            $columns = array('common_q1');
        $data = array();
        foreach($columns as $column)
        {
            if($byInvolved == true)
            {
                $attributes = array('university_id as id', $column, 'involved_person_id', 'count(id_answer) as num');
                $group = array('university_id', $column, 'involved_person_id');
            }
            else
            {
                $attributes = array('university_id as id', $column, 'count(id_answer) as num');
                $group = array('university_id', $column);
            }
            $this->init();
            $this->buildCommand($attributes, null, $group);
            $records = $this->_command->queryAll();
            $data[$column] = $this->ToAssosiative($records, array('id', $column), 'num');
            //var_dump($data);//die();
        }//var_dump($data);
        $d = $this->ToPercentage($data);
        //var_dump('<br/><br/>');
        //var_dump($d);die();
        return $d;
    }
    
    public function setCount()
    {
        $attributes = array('c.id_country as id', 'c.name_' . Yii::app()->language, 'count(id_answer) as num');
        $tables = array(
                        'tbl_university u' => 'university_id = u.id_university',
                        'tbl_country c' => 'u.country_id = c.id_country',
        );
        $group = array('id', 'c.name_' . Yii::app()->language);
        $where = array('involved_person_id = :id' => array(':id' => '1'));
        $this->buildCommand($attributes, $tables, $group, $where);
    }

    /**
     * 
     * @param array() $columns Столбцы для выборки и группировки
     * @param array() $tables Соединение с таблицами
     * @param array() $conditions Условия отбора всех строк
     */
    protected function setCommonCount($columns, $tables = null, $conditions = null)
    {
        $group = null;
        $where = null;
        if(isset($columns)&&isset($columns))
        {
            $attributes = array_merge(array('count(id_answer) as num'), $columns);
            $group = $columns;
        }
        else
        {
            $attributes = array('count(id_answer) as num');
        }
        if (is_array($conditions)&&isset($conditions))
        {
            $counter = 1;
            foreach($conditions as $column => $value)
            {
                $condition = $column . '=:p' . $counter;
                $where = array(':p' . $counter => $value);
                $where[$counter++] = array($condition => $value);
            }
        }
        $this->buildCommand($attributes, $tables, $group, $where);
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
            return $this->ToPersentage1($data, $sum);
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
            return $this->ToArray($this->ToPersentage1($data, $sum));
        }
        else{
            return $this->ToArray($data);
        }
    }
    
    public function getPracticeParticipation($column, $default = 'Нет')
    {
        $attributes = 'c.name_' . Yii::app()->language . ', count(id_answer) as num';
        $tables = array(
                        'tbl_university u' => 'university_id = u.id_university',
                        'tbl_country c' => 'u.country_id = c.id_country',
        );
        $group = array('c.name_' . Yii::app()->language);
        if($default == 'Нет'){
            $where = array(
                $column . '=:value and involved_person_id = :id' => array(':value' => $default, ':id' => 1)
            );
        }
        else{
            $where = array(
                $column . '<>:value and involved_person_id = :id' => array(':value' => $default, ':id' => 1)
            );
        }
        $this->buildCommand($attributes, $tables, $group, $where);
        return $this->ToArrayInverse($this->_command->queryAll());
    }
    
    public function getDiploma($column)
    {
        $this->setCommonCount($column);
    }
}