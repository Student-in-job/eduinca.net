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
        $this->_command = Yii::app()->db->createCommand();
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
                foreach ($where as $column => $param) {
                    $this->_command->where($column, $param);
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
                $data[$row[$column1]][$row[$column2]] = $row[$value];
            }
        }
        else
        {
            $data = array('5' => 0, '4' => 0, '3' => 0, '2' => 0, '1' => 0, '0' => 0);
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
                foreach($itemValue as $row => $rowValue)
                {
                    $flag = is_array($rowValue);
                    if($flag)
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
                    else
                    {
                        $sum += $rowValue;
                    }
                }if(!$flag)
                {
                    foreach($itemValue as $row => $rowValue)
                    {
                        $data[$item][$row] = round($rowValue/$sum*100);
                    }
                    $flag = false;
                }
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
        $where = array();
        if (is_array($conditions)&&isset($conditions))
        {
            $counter = 1;
            foreach($conditions as $column => $value)
            {
                $condition = $column . '=:p' . $counter;
                $param = array(':p' . $counter => $value);
                $where[$condition] = $param;
            }
        }
        return $where;
    }
    
    protected function getByUniversities($columns = null, $byInvolved = false, $inPercentage = false) {
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
        }
        if ($inPercentage)
            return $this->ToPercentage($data);
        else
            return $data;
    }
    
    protected function getAll($columns = null, $inPercentage = false, $filter = null)
    {
        $data = array();
        foreach($columns as $column)
        {
            $attributes = array($column, 'count(id_answer) as num');
            $group = array($column);
            $this->init();
            //var_dump($filter);
            //var_dump('<br/>');
            if (isset($filter))
                $where = $this->transformConditions($filter);
            else
                $where = null;
            //var_dump($where);die();
            $this->buildCommand($attributes, null, $group, $where);
            //var_dump($this->_command->text);die();
            $records = $this->_command->queryAll();
            $data[$column] = $this->ToAssosiative($records, $column, 'num');
        }
        //var_dump($this->ToPercentage($data));die();
        if ($inPercentage)
            return $this->ToPercentage($data);
        else
            return $data;
    }

    public function __construct($attributes = null, $tables = null) {
        $this->init();
    }
    
    public function getId() {
        return $this->_id;
    }
    
    public function getTotalItemCount()
    {
        return count($this->_data);
    }
    
    public function getCountByCountries($byInvolved = false, $inPercentage = false)
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
    
    public function getCommonByUniversities($columns = null, $inPercentage = false, $byInvolved = false)
    {
        if (!isset($columns))
            $columns = array('common_q1');
        return $this->getByUniversities($columns, $byInvolved, $inPercentage);
    }
    
    public function getMethodicByUniversities($columns = null, $inPercentage = false, $byInvolved = false)
    {
        if (!isset($columns))
            $columns = array('methodic_q1');
        return $this->getByUniversities($columns, $byInvolved, $inPercentage);
    }
    
    public function getMethodic($columns = null, $inPercentage = false, $filter = false)
    {
        if (!isset($columns))
            $columns = array('methodic_q1');
        return $this->getAll($columns, $inPercentage ,$filter);
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