<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Filter extends CWidget
{

    public $filtername = '';

    public function run()
    {
        $this->render('filter', array(
            'filtername' => $this->filtername,
        ));
    }
}