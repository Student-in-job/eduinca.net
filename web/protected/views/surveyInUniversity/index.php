<?php
/* @var $this SurveyInUniversityController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
        'Survey' => array('survey/index'), 
	'Survey In Universities',
);

$this->menu=array(
	array('label'=>'Create SurveyInUniversity', 'url'=>Yii::app()->CreateUrl('surveyInUniversity/create', array('survey_id' => $survey_id))),
	//array('label'=>'Manage SurveyInUniversity', 'url'=>array('admin')),
);
?>

<h1>Survey In Universities</h1>

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
                        'name' => 'teachers_num',
                        'value' => 'CHtml::encode($data->involved_teachers)'
                ),
                array(
                        'name' => 'involved_students',
                        'value' => 'CHtml::encode($data->involved_students)'
                ),
                array(
                        'class' => 'CButtonColumn',
                        'template' => '{view}{delete}',
                        'buttons' => array(
                            'view' => array(
                                'url' => 'Yii::app()->createUrl("surveyInUniversity/view",array("id"=>$data->id_survey_in_university));'
                            ),
                            'delete' => array(
                                'url' => 'Yii::app()->createUrl("surveyInUniversity/delete", array("id" => $data->id_survey_in_university));'
                            ),
                        )
                    ),
                array(
                        'class' => 'CLinkColumn',
                        'label' => 'generate_codes',
                        'urlExpression' => 'Yii::app()->createUrl("Code/index", array("id_survey_in_university" => $data->id_survey_in_university))',
                        'header' => 'generate_codes',
                ),
               array('name' => 'HasCodes', 'value' => '($data->HasCodes)?"yes":"no"')
            ),
    ));
    
?>
