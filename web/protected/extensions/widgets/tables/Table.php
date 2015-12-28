<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Table extends CWidget
{
    public $caption = '';
    public $header;
    public $data = array();
    public $labels = array();
    public $background;
    
    public function run()
    {
        $this->render('table');
    }
    
    protected function GetNormalizedArray()
    {
        $data = array();
        $counter = 0;
        $flag = false;
        foreach ($this->data as $row => $value)
        {
            if (is_array($value))
            {
                $data[$counter] = array();
                array_push($data[$counter], $this->labels[$row]);
                $data[$counter] = array_merge($data[$counter], $value);
            }
            $counter++;
            //var_dump($value);
            //var_dump('<br/>');
        }
        if (!count($data)>0)
        {
            $data = $this->data;
        }
        //die();
        //var_dump($data);die();
        return $data;
    }
    
    protected function SetBackground()
    {
        if (isset($this->background))
            return ' style="background:' . $this->background . '"';
        else
            return '';
    }
    
    public function PrintTable()
    {
        $table = '';
        $table .= '<div id = "st-table">';
        $table .= '<table>';
        $table .= '<caption style ="padding-left:4px;margin:2px 0;background:#D0FFCF;">' . $this->caption . '</caption>';
        $table .= '<thead>';
        foreach($this->header as $row)
        {
            $table .= '<tr>';
            foreach($row as $colname => $colspan)
            {
                if ($colname == ' ')
                    $table .= '<th colspan = "' . $colspan . '" style="background:#fff">' . $colname . '</th>';
                else
                    $table .= '<th colspan = "' . $colspan . '">' . $colname . '</th>';
            }
            $table .= '</tr>';
        }
        $table .= '</thead>';
        $table .= '<tbody>';
        foreach($this->GetNormalizedArray() as $row)
        {
            $table .= '<tr>';
            foreach($row as $key => $value)
            {
                $table .= '<td' . $this->SetBackground() . '>'  . $value . '</td>';
            }
            $table .= '</tr>';
        }
        $table .= '</tbody>';
        $table .= '</table>';
        $table .= '</div>';
        return $table;
    }
}