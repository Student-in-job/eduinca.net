<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include Yii::app()->basePath . '/extensions/widgets/jplot/JqplotChart.php';

class jBarChart extends JqplotChart
{
    public function run()
    {
        $this->render('barChart');
    }
}