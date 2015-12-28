<?php
/* @var $this SurveyInUniversityController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
        Yii::t('survey', 'surveys') => array('survey/index'), 
	Yii::t('survey', 'survey_in_university'),
);

$this->menu=array(
	array('label' => Yii::t('survey', 'create_survey_in_university'), 'url' => Yii::app()->CreateUrl('surveyInUniversity/create', array('survey_id' => $survey_id))),
);
?>

<!--<h3>Survey In Universities</h3>-->
<br/>
<?php 
    $this->widget('zii.widgets.grid.CGridView', array(
            'dataProvider'=>$dataProvider,
            'columns'=>array(
                array(
                        'name' => 'id_survey_in_university',
                        'value' => 'CHtml::encode($data->id_survey_in_university)'
                ),
                array(
                        'name' => 'survey_id',
                        'value' => 'CHtml::encode($data->survey_id)'
                ),
                array(
                        'name' => 'university_id',
                        'value' => '$this->grid->getController()->universities[$data->university_id]'
                ),
                array(
                        'name' => 'user_id',
                        'value' => '$this->grid->getController()->user[$data->user_id]'
                        //'value' => 'CHtml::encode($data->user_id)'
                ),
                array(
                        'name' => 'university_type_id',
                        'value' => '$this->grid->getController()->universityType[$data->university_type_id]'
                        //'value' => 'CHtml::encode($data->g)'
                ),
                array(
                        'name' => 'teachers_num',
                        'value' => 'CHtml::encode($data->teachers_num)'
                ),
                array(
                        'name' => 'students_num',
                        'value' => 'CHtml::encode($data->students_num)'
                ),
                array(
                        'name' => 'involved_teachers',
                        'value' => 'CHtml::encode($data->involved_teachers)'
                ),
                array(
                        'name' => 'involved_students',
                        'value' => 'CHtml::encode($data->involved_students)'
                ),
                array(
                        'class' => 'CButtonColumn',
                        'template' => '{view}{delete}{update}',
                        'header' => Yii::t('site', 'operations'),
                        'buttons' => array(
                            'view' => array(
                                'url' => 'Yii::app()->createUrl("surveyInUniversity/view",array("id"=>$data->id_survey_in_university));'
                            ),
                            'delete' => array(
                                'url' => 'Yii::app()->createUrl("surveyInUniversity/delete", array("id" => $data->id_survey_in_university));',
                                'visible' => '!$data->HasCodes'
                             ),
                            'update' => array(
                                'url' => 'Yii::app()->createUrl("surveyInUniversity/update", array("id" => $data->id_survey_in_university));',
                             ),
                        )
                    ),
                array(
                        'class' => 'CLinkColumn',
                        'labelExpression' => '$this->grid->GetController()->GetLabel($data->HasCodes)',
                        'urlExpression' => 'Yii::app()->createUrl("Code/index", array("id_survey_in_university" => $data->id_survey_in_university, "date_till" => $this->grid->getController()->date_till))',
                ),
                array(
                        'class' => 'CLinkColumn',
                        'labelExpression' => 'Yii::t("survey","update_codes")',
                        'urlExpression' => 'Yii::app()->createUrl("Code/updateCodes", array("id_survey_in_university" => $data->id_survey_in_university, "date_till" => $this->grid->getController()->date_till))'
                )
                //array('name' => 'HasCodes', 'value' => '($data->HasCodes)?"'. Yii::t('site', 'yes') .'":"' . Yii::t('site','no') . '"')
            ),
    ));
    
?>
