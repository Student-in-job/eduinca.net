<?php
/* @var $this AnswerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Answer Teachers',
);

$this->menu=array(
	array('label'=>Yii::t('answerteacher','member'), 'url'=>array('teacher/create', 'involved' => 1)),
	array('label'=>Yii::t('answerteacher','notmember'), 'url'=>array('teacher/create', 'involved' => 2)),
        array('label'=>Yii::t('answerstudent','member'), 'url'=>array('student/create', 'involved' => 1)),
	array('label'=>Yii::t('answerstudent','notmember'), 'url'=>array('student/create', 'involved' => 2)),
);?>

<h1>Answer Teachers</h1>
<?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider' => $dataProvider,
        'columns' => array(
            array(
                'name' => 'id_answer',
                'value' => 'CHtml::encode($data->id_answer)',
            ),
            array(
                'name' => 'code',
                'value' => 'CHtml::encode($data->code)',
            ),
            array(
                'name' => 'age',
                'value' => 'CHtml::encode($data->age)',
            ),
            array(
                'name' => 'university_id',
                'value' => '$data->university_name',
            ),
            array(
                'name' => 'person_type_id',
                'value' => '$data->person_type_name',
            ),
            array(
                'name' => 'involved_person_id',
                'value' => '$data->involved_name',
            ),
            array(
                'class' => 'CButtonColumn',
                'template' => '{view}{update}{delete}',
                'buttons' => array(
                    'view' => array(
                        'url' => 'Yii::app()->createUrl("teacher/view",array("id" => $data->id_answer,"involved" => $data->involved_person_id))'
                    ),
                    'update' => array(
                        'url' => 'Yii::app()->createUrl("teacher/update",array("id"=>$data->id_answer, "involved" => $data->involved_person_id))'
                    ),
                    
                )
            )
        )
    ));
?>
<br />
<h1>Answer Students</h1>
<?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider' => $studentDataProvider,
        'columns' => array(
            array(
                'name' => 'id_answer',
                'value' => 'CHtml::encode($data->id_answer)',
            ),
            array(
                'name' => 'code',
                'value' => 'CHtml::encode($data->code)',
            ),
            array(
                'name' => 'age',
                'value' => 'CHtml::encode($data->age)',
            ),
            array(
                'name' => 'university_id',
                'value' => '$data->university_name',
            ),
            array(
                'name' => 'person_type_id',
                'value' => '$data->person_type_name',
            ),
            array(
                'name' => 'involved_person_id',
                'value' => '$data->involved_name',
            ),
            array(
                'class' => 'CButtonColumn',
                'template' => '{view}{update}{delete}',
                'buttons' => array(
                    'view' => array(
                        'url' => 'Yii::app()->createUrl("student/view",array("id" => $data->id_answer,"involved" => $data->involved_person_id))'
                    ),
                    'update' => array(
                        'url' => 'Yii::app()->createUrl("student/update",array("id"=>$data->id_answer, "involved" => $data->involved_person_id))'
                    ),
                    
                )
            )
        )
    ));
?>
<?php /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); */?>
