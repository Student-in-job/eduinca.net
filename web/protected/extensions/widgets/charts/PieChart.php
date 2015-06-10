<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PieChart extends Chart
{
    public function run() {
        if ($this->legend_left == 0)
            $this->legend_left = $this->width - $this->margin_right;
        if($this->legend_top == 0)
            $this->legend_top = $this->margin_top + 63;
        $this->render('pieChart');
    }
}