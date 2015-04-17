<?php

/* 
 * To change tose License Headers in Project Properties.
 * To change this  file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->breadcrumbs=array(
	Yii::t('analytic', 'Analytic') => array('index'),
        Yii::t('analitic', 'HBars'),
);
?>
<!--<h1>Statistic</h1>-->
<!--[if lt IE 9]><script language="javascript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/excanvas.js"></script><![endif]-->
<script class="include" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/jquery.jqplot.js"></script>
<script class="include" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/plugins/jqplot.barRenderer.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/plugins/jqplot.categoryAxisRenderer.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/plugins/jqplot.logAxisRenderer.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/plugins/jqplot.canvasTextRenderer.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/plugins/jqplot.canvasAxisLabelRenderer.s"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/plugins/jqplot.canvasAxisTickRenderer.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/plugins/jqplot.dateAxisRenderer.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/plugins/jqplot.pointLabels.js"></script>
<?php
/* begin: Horizontal Bars for TEACEHRS */    
$element = new Teacher;    
$table_name = $element->tableName();
$count_teachers = Teacher::model()->count();
/* start: count student who have the first variant by 12 question at the test */
$personal_work = Teacher::model()->countBySql('SELECT COUNT(id_answer) FROM tbl_answer_teacher WHERE labs_comment=1 AND involved_person_id=1');
$res_personal_work = Teacher::model()->countBySql('SELECT COUNT(id_answer) FROM tbl_answer_teacher WHERE labs_comment=1 AND involved_person_id=2');
/* stop */
/* start: count student who have second variant by 12 question at the test */
$tech_together = Teacher::model()->countBySql('SELECT COUNT(id_answer) FROM tbl_answer_teacher WHERE labs_comment=2 AND involved_person_id=1');
$res_tech_together = Teacher::model()->countBySql('SELECT COUNT(id_answer) FROM tbl_answer_teacher WHERE labs_comment=2 AND involved_person_id=2');
/* stop */
/* start: count student who have the third variant by 12 question at the test */
$observe = Teacher::model()->countBySql('SELECT COUNT(id_answer) FROM tbl_answer_teacher WHERE labs_comment=3 AND involved_person_id=1');
$res_observe = Teacher::model()->countBySql('SELECT COUNT(id_answer) FROM tbl_answer_teacher WHERE labs_comment=3 AND involved_person_id=2');
/* stop */
/* start: count student who have the fours variant by 12 question at the test */
$other = Teacher::model()->countBySql('SELECT COUNT(id_answer) FROM tbl_answer_teacher WHERE labs_comment=4 AND involved_person_id=1');
$res_other = Teacher::model()->countBySql('SELECT COUNT(id_answer) FROM tbl_answer_teacher WHERE labs_comment=4 AND involved_person_id=2');
/* stop */
$outputString = '[';
$outputString .= '['.$other.',"Другое"], ['.$observe.',"Наблюдение"], ['.$tech_together.',"C помощью перподавателя"], ['.$personal_work.',"Самостоятельная работа"]], [['.$res_other.',"Другое"], ['.$res_observe.',"Наблюдение"], ['.$res_tech_together.',"C помощью перподавателя"], ['.$res_personal_work.',"Самостоятельная работа"]';
$outputString .= ']';
$this->renderPartial('_hBar', array('data' => $outputString, 'id' => 'teacher', 'title' => Yii::t('analytic', 'Teachers')));
/* end: Horizontal Bars for TEACEHRS */ 
/* begin: Horizontal Bars for STUDENTS */    
$element = new Student;    
$table_name = $element->tableName();
$count_students = Student::model()->count();
/* start: count student who have the first variant by 12 question at the test */
$personal_work = Student::model()->countBySql('SELECT COUNT(id_answer) FROM tbl_answer_student WHERE labs_comment=1 AND involved_person_id=1');
$res_personal_work = Student::model()->countBySql('SELECT COUNT(id_answer) FROM tbl_answer_student WHERE labs_comment=1 AND involved_person_id=2');
/* stop */
/* start: count student who have second variant by 12 question at the test */
$tech_together = Student::model()->countBySql('SELECT COUNT(id_answer) FROM tbl_answer_student WHERE labs_comment=2 AND involved_person_id=1');
$res_tech_together = Student::model()->countBySql('SELECT COUNT(id_answer) FROM tbl_answer_student WHERE labs_comment=2 AND involved_person_id=2');
/* stop */
/* start: count student who have the third variant by 12 question at the test */
$observe = Student::model()->countBySql('SELECT COUNT(id_answer) FROM tbl_answer_student WHERE labs_comment=3 AND involved_person_id=1');
$res_observe = Student::model()->countBySql('SELECT COUNT(id_answer) FROM tbl_answer_student WHERE labs_comment=3 AND involved_person_id=2');
/* stop */
/* start: count student who have the fours variant by 12 question at the test */
$other = Student::model()->countBySql('SELECT COUNT(id_answer) FROM tbl_answer_student WHERE labs_comment=4 AND involved_person_id=1');
$res_other = Student::model()->countBySql('SELECT COUNT(id_answer) FROM tbl_answer_student WHERE labs_comment=4 AND involved_person_id=2');
/* stop */
$outputString = '[';
$outputString .= '['.$other.',"Другое"], ['.$observe.',"Наблюдение"], ['.$tech_together.',"C помощью перподавателя"], ['.$personal_work.',"Самостоятельная работа"]], [['.$res_other.',"Другое"], ['.$res_observe.',"Наблюдение"], ['.$res_tech_together.',"C помощью перподавателя"], ['.$res_personal_work.',"Самостоятельная работа"]';
$outputString .= ']';
$this->renderPartial('_hBar', array('data' => $outputString, 'id' => 'student', 'title' => Yii::t('analytic', 'Students')));
/* end: Horizontal Bars for STUDENTS */   