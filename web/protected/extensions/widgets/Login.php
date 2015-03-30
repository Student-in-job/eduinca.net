<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author DEVELOPER
 */
class Login extends CWidget{
    
    public $model;
    
    public function run()
    {
        $this->render('login', array('model' => $this->model));
    }
}
