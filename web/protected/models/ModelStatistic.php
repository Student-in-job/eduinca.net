<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ModelStatistic
{
    protected $_command;
    protected $_tableName;
    
    /**
     * Обращение к свойству объекта
     * @param string $name Название свойтсва 
     * @return object property
     */
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
     * Трансформирование ассоциативного массива в условие DBCommand
     * @param array $conditions Массив вида столбец=>значение
     * @return array Массив вида (условие => параметр)
     */
    protected function TransformConditions($conditions = null)
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
    /**
     * Генерация команды на языке SQL и помещает в объект $_command
     * @param array() $attributes Основные столбцы
     * @param array() $tables Указываются в виде array($join => $condition) таблицы с которыми будет соединяться данная 
     * таблица и условия соединения 
     * @param array() $group Указываются столбцы группировки
     * @param array() $where Указываются в виде array($condition => $value) условия отбора данных из таблиц и их 
     * значения
     */
    protected function BuildCommand($attributes = null, $tables = null, $group = null, $where = null)
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
    
    /**
     * Перевод массива query в ассоиативный вида (5=>,4=>,3=>,2=>,1=>,0=>)
     * @param array $array Массив строк, возвращаемый query
     * @param string or array $column столбцы которые должны быть ключевыми для массивов (5=>,4=>,3=>,2=>,1=>,0=>)
     * @param string столбец из которого будет браться значение для массива (5=>,4=>,3=>,2=>,1=>,0=>)
     * @return Assosoative array
     */
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
    
    /**
     * Перевод абсолютных величин массива в процентные
     * @param array $array одномерный массив или несколько массивов (процент высчитывается для каждого одномерного
     * массива)
     * @return array массив или несколько массивов со значениями в процентах
     */
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
       
    //Helper functions
    
    /**
     * Подготовка SQL запроса с фильтром по выьранным столбццам
     * @param array $columns Столбцы для выборки и группировки
     * @param array $tables Соединение с таблицами
     * @param array $conditions Условия отбора всех строк
     */
    protected function setCommonCount($columns, $tables = null, $conditions = null)
    {
        $group = null;
        $where = null;
        if(isset($columns))
        {
            if (is_array($columns))
                $attributes = array_merge(array('count(id_answer) as num'), $columns);
            else
                $attributes = array('count(id_answer) as num', $columns);
            $group = $columns;
        }
        else
        {
            $attributes = array('count(id_answer) as num');
        }
        $where = $this->TransformConditions($conditions);
        $this->BuildCommand($attributes, $tables, $group, $where);
    }
    
    /**
     * Вывод количественных показателей с группировкой по учебным заведениям
     * @param array $columns одинарный массив с названием столбцов
     * @param bool $byInvolved учитывать ли вовлеченных и невовлеченных в программу
     * @param bool $inPercentage возвращать ли значение в процентах
     * @return array Массив сгрупированных по учебным заведениям (в качестве ключа выступает имя столбца)
     */
    protected function getByUniversities($columns = null, $byInvolved = false, $inPercentage = false) {
        $data = array();
        foreach($columns as $column)
        {
            if($byInvolved == true)
            {
                $attributes = array('university_id', $column, 'involved_person_id');
            }
            else
            {
                $attributes = array('university_id', $column);
            }
            $this->init();
            $this->setCommonCount($attributes);
            $records = $this->_command->queryAll();
            $data[$column] = $this->ToAssosiative($records, array('university_id', $column), 'num');
        }
        if ($inPercentage)
            return $this->ToPercentage($data);
        else
            return $data;
    }
    
    /**
     * 
     * @param array $columns
     * @param bool $inPercentage
     * @param array $filter
     * @return type
     */
    protected function getAll($columns = null, $inPercentage = false, $filter = null)
    {
        $data = array();
        foreach($columns as $column)
        {
            $this->init();
            $this->setCommonCount($column, null, $filter);
            $records = $this->_command->queryAll();
            $data[$column] = $this->ToAssosiative($records, $column, 'num');
        }
        if ($inPercentage)
            return $this->ToPercentage($data);
        else
            return $data;
    }
    
    
    /**
     * Конструктор с атрибутами
     * @param type $attributes
     * @param type $tables
     */
    public function __construct($attributes = null, $tables = null) {
        $this->init();
    }
    
    //Analytics
    
    /**
     * Подсчет количества по странам
     * @param bool $byInvolved 
     * @param bool $inPercentage
     * @return array
     */
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
    
    public function getLabsByUniversities()
    {
        $columns = array('');
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
        $this->BuildCommand($attributes, $tables, $group, $where);
        return $this->ToArrayInverse($this->_command->queryAll());
    }
}