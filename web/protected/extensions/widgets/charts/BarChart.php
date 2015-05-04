<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include Yii::app()->basePath . '/extensions/widgets/charts/Chart.php';

class BarChart extends Chart
{
    public function run()
    {
        $this->render('barChart');
    }
}
