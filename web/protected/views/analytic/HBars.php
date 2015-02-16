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
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/plugins/jqplot.logAxisRenderer.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/plugins/jqplot.canvasTextRenderer.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/plugins/jqplot.canvasAxisLabelRenderer.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/plugins/jqplot.canvasAxisTickRenderer.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/plugins/jqplot.dateAxisRenderer.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
<script class="include" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/plugins/jqplot.barRenderer.js"></script>
<script class="include" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/plugins/jqplot.categoryAxisRenderer.js"></script>

<?php
/* begin: Horizontal Bars for STUDENTS */    
$element = new Student;    
$table_name = $element->tableName();
$count_students = Student::model()->count();
/* start: count student who have the first variant by 12 question at the test */
$personal_work = Student::model()->countBySql('SELECT COUNT(id_answer) FROM tbl_answer_student WHERE labs_comment=1');
$res_personal_work = $count_students - $personal_work;
/* stop */
/* start: count student who have second variant by 12 question at the test */
$tech_together = Student::model()->countBySql('SELECT COUNT(id_answer) FROM tbl_answer_student WHERE labs_comment=2');
$res_tech_together = $count_students - $tech_together;
/* stop */
/* start: count student who have the third variant by 12 question at the test */
$observe = Student::model()->countBySql('SELECT COUNT(id_answer) FROM tbl_answer_student WHERE labs_comment=3');
$res_observe = $count_students - $observe;
/* stop */
/* start: count student who have the fours variant by 12 question at the test */
$other = Student::model()->countBySql('SELECT COUNT(id_answer) FROM tbl_answer_student WHERE labs_comment=4');
$res_other = $count_students - $other;
/* stop */
$outputString = '[';
$outputString .= '['.$personal_work.',"Самостоятельная работа"], ['.$tech_together.',"C помощью перподавателя"], ['.$observe.',"Наблюдение"], ['.$other.',"Другое"]], [['.$res_personal_work.',"Самостоятельная работа"], ['.$res_tech_together.',"C помощью перподавателя"], ['.$res_observe.',"Наблюдение"], ['.$res_other.',"Другое"]';
$outputString .= ']';
$this->renderPartial('_hBar', array('data' => $outputString, 'id' => 'student', 'title' => Yii::t('analytic', 'Students')));
/* end: Horizontal Bars for STUDENTS */    

/* begin: Horizontal Bars for TEACEHRS */    
$element = new Teacher;    
$table_name = $element->tableName();
$count_teachers = Teacher::model()->count();
/* start: count student who have the first variant by 12 question at the test */
$personal_work = Teacher::model()->countBySql('SELECT COUNT(id_answer) FROM tbl_answer_teacher WHERE labs_comment=1');
$res_personal_work = $count_students - $personal_work;
/* stop */
/* start: count student who have second variant by 12 question at the test */
$tech_together = Teacher::model()->countBySql('SELECT COUNT(id_answer) FROM tbl_answer_teacher WHERE labs_comment=2');
$res_tech_together = $count_teachers - $tech_together;
/* stop */
/* start: count student who have the third variant by 12 question at the test */
$observe = Teacher::model()->countBySql('SELECT COUNT(id_answer) FROM tbl_answer_teacher WHERE labs_comment=3');
$res_observe = $count_teachers - $observe;
/* stop */
/* start: count student who have the fours variant by 12 question at the test */
$other = Teacher::model()->countBySql('SELECT COUNT(id_answer) FROM tbl_answer_teacher WHERE labs_comment=4');
$res_other = $count_teachers - $other;
/* stop */
$outputString = '[';
$outputString .= '['.$personal_work.',"Самостоятельная работа"], ['.$tech_together.',"C помощью перподавателя"], ['.$observe.',"Наблюдение"], ['.$other.',"Другое"]], [['.$res_personal_work.',"Самостоятельная работа"], ['.$res_tech_together.',"C помощью перподавателя"], ['.$res_observe.',"Наблюдение"], ['.$res_other.',"Другое"]';
$outputString .= ']';
$this->renderPartial('_hBar', array('data' => $outputString, 'id' => 'teacher', 'title' => Yii::t('analytic', 'Teachers')));
/* end: Horizontal Bars for TEACEHRS */    