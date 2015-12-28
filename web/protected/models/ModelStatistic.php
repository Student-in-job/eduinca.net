<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
define("ISNULL", 920301);
define("ISNOTNULL", 920302);

define("COUNT", 930601);
define("SUM", 930602);
define("AVG", 930603);
define("MAX", 930604);
define("MIN", 930605);

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
            $params = array();
            $condition = '';
            foreach($conditions as $column => $value)
            {
                if($value == ISNULL)
                {
                    $condition .= $column . ' IS NULL AND ';
                    $counter++;
                }
                elseif($value == ISNOTNULL)
                {
                    $condition .= $column . ' IS NOT NULL AND ';
                    $counter++;
                }
                elseif(is_array($value))
                {
                    $condition .= $column . ' IN (';
                    foreach ($value as $item)
                        $condition .= $item . ',';
                    $condition = trim($condition, ',') . ') AND ';
                    $counter++;
                }
                else
                {
                    $condition .= $column . '=:p' . $counter . ' AND ';
                    $params[':p' . $counter++] = $value;
                }
            }
            $condition = trim($condition, ' AND ');
            $where[$condition] = $params;
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
     * @param array() or string $order Сортировка
     */
    protected function BuildCommand($attributes = null, $tables = null, $group = null, $where = null, $order = null)
    {
        //var_dump($where);
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
            else
            {
                $this->_command->where($where);
            }
        }
        if(!is_null($group)){
            $this->_command->group($group);
        }
        if(!is_null($order)){
            $this->_command->order($order);
        }
    }
    
    /**
     * Перевод массива query в ассоиативный вида (5=>,4=>,3=>,2=>,1=>,0=>)
     * @param array $array Массив строк, возвращаемый query
     * @param string $column столбцы которые должны быть ключевыми для массивов (5=>,4=>,3=>,2=>,1=>,0=>)
     * @param string $value столбец из которого будет браться значение для массива (5=>,4=>,3=>,2=>,1=>,0=>)
     * @param array $templateArray шаблон массива
     * @return Assosoative array
     */
    protected function ToAssosiative($array, $column, $value, $templateArray = null)
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
                    if(is_null($templateArray))
                        $data[$row[$column1]] = array('5' => 0, '4' => 0, '3' => 0, '2' => 0, '1' => 0, '0' => 0);
                    else
                        $data[$row[$column1]] = $templateArray;
                }
                $data[$row[$column1]][$row[$column2]] = is_null($row[$value])?0:$row[$value];
            }
        }
        else
        {
            if(is_null($templateArray))
                $data = array('5' => 0, '4' => 0, '3' => 0, '2' => 0, '1' => 0, '0' => 0);
            else
                $data = $templateArray;
            foreach($array as $row)
            {
                $data[$row[$column]] = is_null($row[$value])?0:$row[$value];
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
                            $sum = ($sum==0)?1:$sum;
                            $data[$item][$row][$key] = round($value/$sum*100);
                        }
                    }
                    else
                    {
                        $sum += $rowValue;
                    }
                }
                if(!$flag)
                {
                    foreach($itemValue as $row => $rowValue)
                    {
                        $sum = ($sum==0)?1:$sum;
                        $data[$item][$row] = round($rowValue/$sum*100);
                    }
                    $flag = false;
                }
            }
        }
        return $data;
    }
    
    /**
     * Округление значений массива до целых
     * @param array $array Входной массив
     */
    protected function RoundValues(&$array)
    {
        foreach($array as $item => $itemValue)
        {
            if(is_array($itemValue))
            {
                foreach($itemValue as $key => $value)
                {
                    $itemValue[$key] = round($value, 0);
                }
            }
            else
            {
                $array[$item] = round($itemValue, 0);
            }
        }
    }
       
    //Helper functions
    
    /**
     * Подготовка SQL запроса с фильтром по выбранным столбццам
     * @param array $columns Столбцы для выборки и группировки
     * @param array $tables Соединение с таблицами
     * @param array $conditions Условия отбора всех строк
     * @param array or string $order Сортировка
     */
    protected function setCommonCount($columns, $tables = null, $conditions = null, $order = null)
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
        $this->BuildCommand($attributes, $tables, $group, $where, $order);
       // var_dump($where);die();
    }
    
    /**
     * Подготовка SQL (среднее значение) запроса с фильтром по выбранным столбццам
     * @param string $avgColumn Столбец для которого считается среднее значение
     * @param array $columns Столбцы для выборки и группировки
     * @param array $tables Соединение с таблицами
     * @param array $conditions Условия отбора всех строк
     *//*
    protected function setCommonAverage($avgColumn ,$columns, $tables = null, $conditions = null)
    {
        $group = null;
        $where = null;
        if(isset($columns))
        {
            if (is_array($columns))
                $attributes = array_merge(array('avg('. $avgColumn . ') as num'), $columns);
            else
                $attributes = array('avg(' . $avgColumn . ') as num', $columns);
            $group = $columns;
        }
        else
        {
            $attributes = array('avg(' . $avgColumn . ') as num');
        }
        $where = $this->TransformConditions($conditions);
        $this->BuildCommand($attributes, $tables, $group, $where);
    }*/
    
    /**
     * Подготовка SQL (агрегатное значение) запроса с фильтром по выбранным столбццам
     * @param int $function Агрегатная функция одна из COUNT, SUM, MAX, MIN, AVG
     * @param string $agregateColumn Столбец для которого считается среднее значение
     * @param array $columns Столбцы для выборки и группировки
     * @param array $tables Соединение с таблицами
     * @param array or string $order Сортировка
     * @param array $conditions Условия отбора всех строк
     */
    protected function setCommonAgregate($function ,$agregateColumn, $columns = null, $tables = null, $conditions = null, $order = null)
    {
        $group = null;
        $where = null;
        switch ($function)
        {
            case COUNT: $func = 'COUNT'; break;
            case AVG: $func = 'AVG'; break;
            case SUM: $func = 'SUM'; break;
            case MIN: $func = 'MIN'; break;
            case MAX: $func = 'MAX'; break;
        }
        if(isset($columns))
        {
            if (is_array($columns))
                $attributes = array_merge(array( $func . '('. $agregateColumn . ') as num'), $columns);
            else
                $attributes = array($func . '(' . $agregateColumn . ') as num', $columns);
            $group = $columns;
        }
        else
        {
            $attributes = array($func . '(' . $agregateColumn . ') as num');
        }
        $where = $this->TransformConditions($conditions);
        $this->BuildCommand($attributes, $tables, $group, $where, $order);
    }


    /**
     * Вывод количественных показателей с группировкой по учебным заведениям
     * @param array $columns одинарный массив с названием столбцов
     * @param bool $byInvolved учитывать ли вовлеченных и невовлеченных в программу
     * @param bool $inPercentage возвращать ли значение в процентах
     * @return array Массив сгрупированных по учебным заведениям (в качестве ключа выступает имя столбца)
     */
    protected function getByUniversities($columns = null, $byInvolved = false, $inPercentage = false, $conditions = null) {
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
            $this->setCommonCount($attributes, null, $conditions, 'university_id');
            $records = $this->_command->queryAll();
            $data[$column] = $this->ToAssosiative($records, array('university_id', $column), 'num');
        }
        if ($inPercentage)
            return $this->ToPercentage($data);
        else
            return $data;
    }
    
    /**
     * Вывод всех записей по столбцам
     * @param array $columns столбцы для выводв
     * @param bool $inPercentage в процентном соотношении
     * @param array $filter условие в формате столбец=>значение
     * @return array Массив выданный согласно фильтру
     */
    protected function getAll($columns = null, $inPercentage = false, $filter = null)
    {
        $data = array();
        foreach($columns as $column)
        {
            $this->init();
            $this->setCommonCount($column, null, $filter, 'university_id');
            $records = $this->_command->queryAll();
            $data[$column] = $this->ToAssosiative($records, $column, 'num', array('5' => 0, '4' => 0, '3' => 0, '2' => 0, '1' => 0));
        }
        if ($inPercentage)
            return $this->ToPercentage($data);
        else
            return $data;
    }
    
    /**
     * Убирает из ассоциативного массива значения с пустыми ключами
     * @param array $array Входной массив, из которого необходимо убрать значения с пустым ключаси
     */
    protected function RemoveNullKeys(&$array)
    {
        foreach($array as $rowItem => $rowValue)
        {
            if (is_array($rowValue))
            {
                $removedNullKeys = $rowValue;
                unset($removedNullKeys['']);
                $array[$rowItem] = $removedNullKeys;
            }
            else
            {
                $removedNullKeys = $array;
                unset($removedNullKeys['']);
                $array = $removedNullKeys;
            }   
        }
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
     * Возврат последнего года для опросов
     * @return int Последний год опросов
     */
    public function getLastYear()
    {
        $this->init();
        $this->setCommonAgregate(MAX, 'year');
        $data = $this->_command->queryAll();
        return $data[0]['num'];
    }
    
    /**
     * Возврат всех годов, в которых проводились опросы
     * @return array массив из годов
     */
    public function getYears()
    {
        $this->init();
        $attributes = array('DISTINCT(year) as num');
        $this->BuildCommand($attributes);
        $records = $this->_command->queryAll();
        $data = $this->ToAssosiative($records, 'num', 'num', array());
        return $data;
    }
    
    /**
     * Подсчет количества по странам
     * @param bool $byInvolved гриппировать по участвующим и неучаствующим
     * @param bool $inPercentage в процентном соотношении
     * @param array $conditions Условия отбора всех строк
     * @return array Массив сгруппированный по странам
     */
    public function getCountByCountries($byInvolved = false, $inPercentage = false, $conditions = null)
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
        $this->setCommonCount($attributes, $tables, $conditions);
        return $this->_command->queryAll();
    }
    
    /**
     * Подсчет структуры образовательного процесса
     * @param array $columns столбцы вопросов для результата
     * @param bool $inPercentage в процентном соотношении
     * @param bool $byInvolved сгруппировать по участвующим и неучаствующим
     * @param array $conditions условия отбора
     * @return array Массив сгруппированный по учебным заведениям
     */
    public function getCommonByUniversities($columns = null, $inPercentage = false, $byInvolved = false, $conditions = null)
    {
        if (!isset($columns))
            $columns = array('common_q1');
        return $this->getByUniversities($columns, $byInvolved, $inPercentage, $conditions);
    }
    
    /**
     * Подчет методики преподавания, сгруппированные по учебным заведениям
     * @param array $columns Столбцы, которые необходимо считать
     * @param bool $inPercentage в процентном соотношении
     * @param bool $byInvolved сгруппировать по участвующим и неучаствующим
     * @return array Массив сгруппирвоанный по кчебным заведениям
     */
    public function getMethodicByUniversities($columns = null, $inPercentage = false, $byInvolved = false)
    {
        if (!isset($columns))
            $columns = array('methodic_q1');
        return $this->getByUniversities($columns, $byInvolved, $inPercentage);
    }
    
    /**
     * Подчет методики преподавания общее
     * @param array $columns Столбцыб которые необходимо считать
     * @param bool $inPercentage в процентном соотношении
     * @param bool $filter условие отбора строк
     * @return array Массив методики образования
     */
    public function getMethodic($columns = null, $inPercentage = false, $filter = false)
    {
        if (!isset($columns))
            $columns = array('methodic_q1');
        return $this->getAll($columns, $inPercentage ,$filter);
    }
    
    /**
     * Подсчет выполнения лабораторных работ, сгруппированных по учебным заведениям
     * @param array $conditions Условия отбора всех строк в фортаме (столбец => значение)
     * @return array Массив выполненных лабораторных работ
     */
    public function getLabsByUniversities($conditions = null)
    {
        $columns = array('labs_comment', 'university_id');
        $this->init();
        $this->setCommonCount($columns, null, $conditions, 'university_id');
        $records = $this->_command->queryAll();
        $templateArray = array('1' => 0, '2' => 0, '3' => 0, '4' => 0);
        $data = $this->ToAssosiative($records, array('university_id', 'labs_comment'), 'num', $templateArray);
        return $this->ToPercentage($data);
    }
    
    /**
     * Подсчет необходимости проходить практику на предприятии, сгруппированных по учебным заведениям
     * @param array $conditions Условия отбора всех строк в фортаме (столбец => значение)
     * @return array Массив прохождения практики
     */
    public function getPracticeByUniversities($conditions = null)
    {
        $columns = array('practice', 'university_id');
        $this->init();
        $this->setCommonCount($columns, null, $conditions, 'university_id');
        $records = $this->_command->queryAll();
        $templateArray = array('1' => 0, '0' => 0);
        $data = $this->ToAssosiative($records, array('university_id', 'practice'), 'num', $templateArray);
        $this->RemoveNullKeys($data);
        //var_dump($data);die();
        return $this->ToPercentage($data);
    }
    
    /**
     * Подсчет средней длительности практики по университетам
     * @param type $conditions
     * @return type
     */
    public function getPracticeDurationByUniversities($conditions = null)
    {
        $avgColumn = 'practice_duration';
        $columns = array('university_id');
        $this->init();
        $this->setCommonAgregate(AVG, $avgColumn ,$columns, null, $conditions, 'university_id');
        $records = $this->_command->queryAll();
        $templateArray = array();
        $data = $this->ToAssosiative($records, 'university_id', 'num', $templateArray);
        $this->RoundValues($data);
        return $data;
    }
    
    public function getPrivateSectorByUniversities($conditions = null, $inPercentage = FALSE)
    {
        $agregateColumn = 'id_answer';
        $columns = array('university_id');
        $this->init();
        if (isset($conditions))
            $conditions1 = $conditions;
        $conditions1['private_comments'] = 'Нет';
        $this->setCommonAgregate(COUNT, $agregateColumn, $columns, null, $conditions1, 'university_id');
        $records = $this->_command->queryAll();
        $templateArray = array();
        $notParticipated = $this->ToAssosiative($records, 'university_id', 'num', $templateArray);
        
        $this->init();
        $this->setCommonAgregate(COUNT, $agregateColumn, $columns, null, $conditions, 'university_id');
        $records = $this->_command->queryAll();
        $total = $this->ToAssosiative($records, 'university_id', 'num', $templateArray);
        
        $participated = array();
        foreach ($total as $key => $value)
        {
            $minus = isset($notParticipated[$key])?$notParticipated[$key]:0;
            if($inPercentage==TRUE)
                $participated[$key] = ($value - $minus)/$value*100;
            else
                $participated[$key] = $value - $minus;
        }
        
        $this->RoundValues($participated);
        return $participated;
    }
}