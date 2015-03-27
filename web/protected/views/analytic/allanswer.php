<?php

/* 
 * To change tose License Headers in Project Properties.
 * To change this  file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->breadcrumbs=array(
	Yii::t('analytic', 'Analytic') => array('index'),
        Yii::t('analitic', 'Total'),
);
?>

<h1>Statistic</h1>
<!--[if lt IE 9]><script language="javascript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/excanvas.js"></script><![endif]-->
<script class="include" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/jquery.jqplot.js"></script>
<script class="include" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/plugins/jqplot.pieRenderer.js"></script>


<?php
/*
    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider' => $dataProvider,
        'columns' => array(
            array(
                'name' => 'name',
                'type' => 'raw',
                'value' => 'CHtml::encode($data["name"])',
            ),
            array(
                'name' => 'num',
                'type' => 'raw',
                'value' => 'CHtml::encode($data["num"])',
            ),
        )
        )
    );
 */
  
$this->widget('application.extensions.extrawidgets.techstud_table.techstud_table', array());
    
    $outputString = '';
    foreach ($students as $row)
    {
        $sex =($row['sex']==1)?Yii::t('analytic','Man'):Yii::t('analytic','Woman');
        $outputString .= '[\'' . $sex  . '\',' . $row['num'] . '],';
    }
    $this->renderPartial('_pieChart', array('data' => $outputString, 'id' => 'student', 'title' => Yii::t('analytic', 'Students')));

    $outputString = '';
    foreach ($teachers as $row)
    {
        $sex =($row['sex']==1)?Yii::t('analytic','Man'):Yii::t('analytic','Woman');
        $outputString .= '[\'' . $sex  . '\',' . $row['num'] . '],';
    }
    $this->renderPartial('_pieChart', array('data' => $outputString, 'id' => 'teacher', 'title' => Yii::t('analytic', 'Teachers')));

    
    /* PDF */
/*
$pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf', 'P', 'cm', 'A4', true, 'UTF-8');
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor("GiZ");
$pdf->SetTitle("Statistics");
$pdf->SetSubject("Total Statistics");
$pdf->SetKeywords("GIZ, GiZ, PDF, statistics");
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont("times", "BI", 20);
$pdf->Cell(0,10,"Example 002",1,1,'C');
$pdf->Output("002.pdf", "I");    
*/