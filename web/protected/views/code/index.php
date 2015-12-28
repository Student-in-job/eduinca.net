<?php
/* @var $this CodeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('survey', 'surveys') => array('survey/index'),  
	Yii::t('survey', 'survey_in_university') => array('surveyinuniversity/index', 'survey_id' => $survey_id),
        Yii::t('survey', 'codes'),
);

?>

<!--<h1>Codes</h1>-->
<!--
<table>
    <caption style="background:#EEEEEE;text-align:center;padding:10px; color:blue"><?php echo '<h3><b>' . $university_name . '</b></h3>';?></caption>
    <tbody>
        <?php
            //$this->renderPartial('_view', array('dataProvider' => $dataProvider, 'date_till' => $date_till));
        ?>
    </tbody>
</table>
-->
<?php $codes_view = PDF::PrintCodes($dataProvider, $university_name, $date_till);?>
<?php echo $codes_view;?>
<br/>
<div><?php echo CHtml::link(
            Yii::t('survey', 'print'),
            array(
                    'PDFMaker/Generate',
                    'id_survey_in_university' => $id_survey_in_university,
                    'date_till' => $date_till,
                    'university_name' => $university_name,                
            ),
            array('target' => '_blank', 'class' => 'button')
            );?>
</div>