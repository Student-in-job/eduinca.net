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
    
    public function run()
    {
        $this->render('table');
    }
    
    public function GetNormalizedArray()
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
}