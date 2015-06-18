<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once Yii::app()->basePath . '/extensions/widgets/charts/Chart.php';

class BarChart extends Chart
{
    public function run()
    {
        $file = YiiBase::getPathOfAlias("webroot") .  '/images/example.' . $this->name . 'BarChart.can.png'; 
        if (file_exists($file))
            unlink($file);
        if ($this->legend_left == 0)
            $this->legend_left = $this->width - $this->margin_right;
        if($this->legend_top == 0)
            $this->legend_top = $this->margin_top + 63;
        $this->render('barChart');
    }
}
