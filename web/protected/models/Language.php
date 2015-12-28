<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Language
{
    protected $language;
    
    public function __get($name) {
        if (method_exists($this, ($method = 'get_' . $name))) {
            return $this->$method();
        } else {
            return;
        }
    }
    
    public function __set($name, $value){
        if (method_exists($this, ($method = 'get_' . $name)))
            $this->$method($value);
    }

    protected function get_language()
    {
        return $this->language;
    }
    
    protected function set_language($value)
    {
        $this->language = $value;
    }
    
    public function HasErrors(){}
}
