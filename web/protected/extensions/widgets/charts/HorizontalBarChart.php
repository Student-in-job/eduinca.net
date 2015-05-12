<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include Yii::app()->basePath . '/extensions/widgets/charts/Chart.php';
/**
 * Description of HorizontalBarChart
 *
 * @author DEVELOPER
 */
class HorizontalBarChart extends Chart{
    //put your code here
    public function run()
    {
        $this->render('horizontalBarChart');
    }
}
