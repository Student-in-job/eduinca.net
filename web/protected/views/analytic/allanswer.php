<?php
/* 
 * To change tose License Headers in Project Properties.
 * To change this  file, choose Tools | Templates
 * and open the template in the editor.
 */
$this->breadcrumbs=array(
	Yii::t('analytic', 'Analytic') => array('index'),
        Yii::t('analytic', 'Total'),
);
?>
<!--[if lt IE 9]><script language="javascript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/excanvas.js"></script><![endif]-->
<script class="include" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/jquery.jqplot.js"></script>
<script class="include" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/plugins/jqplot.pieRenderer.js"></script>

<?php
$this->widget('application.extensions.extrawidgets.techstud_table.techstud_table', array());
    
    $outputString = '';
    foreach ($teachers as $row)
    {
        $sex =($row['sex']==1)?Yii::t('analytic','Man'):Yii::t('analytic','Woman');
        $outputString .= '[\'' . $sex  . '\',' . $row['num'] . '],';
    }
    $this->renderPartial('_pieChart', array('data' => $outputString, 'id' => 'teacher', 'title' => Yii::t('analytic', 'Teachers')));

    $outputString = '';
    foreach ($students as $row)
    {
        $sex =($row['sex']==1)?Yii::t('analytic','Man'):Yii::t('analytic','Woman');
        $outputString .= '[\'' . $sex  . '\',' . $row['num'] . '],';
    }
    $this->renderPartial('_pieChart', array('data' => $outputString, 'id' => 'student', 'title' => Yii::t('analytic', 'Students')));