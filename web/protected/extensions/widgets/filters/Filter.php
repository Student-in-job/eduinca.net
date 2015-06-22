<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Filter extends CWidget
{

    public $filtername = '';
    public $model;
    public $questions_students;
    public $questions_teachers;
    public $years;
    public $universities;
    public $type;
    public $questions;
    public $params;

    public function run()
    {
        if(!isset($this->years))
        {
            $year = date('Y');
            $this->years[$year] = $year;
        }
        switch($this->type)
        {
            case ANALYTIC_PROCESS: $this->render('filterEducationProcess'); break;
            case ANALYTIC_METHODIC: $this->render('filterEducationMethodic'); break;
            case ANALYTIC_LABS: $this->render('filterEducationLabs'); break;
            case ANALYTIC_DIPLOMA: $this->render('filterEducationLabs'); break;
            case ANALYTIC_COMMON: $this->render('filterCommon'); break;
        }
    }
}