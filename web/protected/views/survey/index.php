<?php
/* @var $this SurveyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('survey', 'surveys'),
);

$this->menu=array(
	array('label'=>Yii::t('survey','create_survey'), 'url'=>array('create')),
	//array('label'=>'Manage Survey', 'url'=>array('admin')),
);
?>

<!--<h1>Surveys</h1>-->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
            array(
                    'name' => 'id_survey',
                    'value' => 'CHtml::encode($data->id_survey)'
            ),
            array(
                    'name' => 'name_' . Yii::app()->language,
                    'value' => 'CHtml::encode($data->name_' . Yii::app()->language . ')'
            ),
            array(
                    'name' => 'year',
                    'value' => 'CHtml::encode($data->year)'
            ),
            array(
                    'name' => 'date_till',
                    'value' => 'CHtml::encode($data->date_till)'
            ),
            array(
                    'class' => 'CButtonColumn',
                    'template' => '{view}{update}{delete}',
                    'buttons' => array(
                        'view' => array(
                            'url' => 'Yii::app()->createUrl("survey/view",array("id" => $data->id_survey));'
                        ),
                        'update' => array(
                            'url' => 'Yii::app()->createUrl("survey/update",array("id"=>$data->id_survey));'
                        ),
                        'delete' => array(
                            'url' => 'Yii::app()->createUrl("survey/delete", array("id" => $data->id_survey));'
                        ),
                    )
                ),
            array(
                    'class' => 'CLinkColumn',
                    'label' => Yii::t('survey','universities'),
                    'urlExpression' => 'Yii::app()->createUrl("surveyInUniversity/index", array("survey_id" => $data->id_survey));',
                    //'header' => 'add_university',
            )
        ),
)); ?>
