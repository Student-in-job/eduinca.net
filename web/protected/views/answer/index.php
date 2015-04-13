<?php
/* @var $this AnswerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('site','statistics') => array('/statistics/index'),
        ($person == 1)?Yii::t('statistics','answers_teachers'):Yii::t('statistics','answers_students')//'Answer Teachers',
);
/*
$this->menu=array(
	array('label'=>Yii::t('answerteacher','member'), 'url'=>array('teacher/create', 'involved' => 1)),
	array('label'=>Yii::t('answerteacher','notmember'), 'url'=>array('teacher/create', 'involved' => 2)),
        array('label'=>Yii::t('answerstudent','member'), 'url'=>array('student/create', 'involved' => 1)),
	array('label'=>Yii::t('answerstudent','notmember'), 'url'=>array('student/create', 'involved' => 2)),
);*/
$active1 = '';
$active2 = '';
switch ($person)
{
    case 1: $active1='active';break;
    case 2: $active2='active';break;
}
?>


<ul class="nav nav-pills">
    <li class="<?php echo $active1;?>"><?php echo CHtml::link(Yii::t('answer','teachers'), array('index', 'person' => 1));?></li>
    <li class="<?php echo $active2;?>"><?php echo CHtml::link(Yii::t('answer','students'), array('index', 'person' => 2));?></li>
</ul>

<!--<h1>Answer</h1>-->
<?php
    if($person == 1){
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
                            'url' => 'Yii::app()->createUrl("teacher/view",array("id" => $data->id_answer, "involved" => $data->involved_person_id));'
                        ),
                        'update' => array(
                            'url' => 'Yii::app()->createUrl("teacher/update",array("id"=>$data->id_answer, "involved" => $data->involved_person_id));'
                        ),
                        'delete' => array(
                            'url' => 'Yii::app()->createUrl("teacher/delete", array("id" => $data->id_answer))'
                        ),
                    )
                ),
            )
        ));
    }
    else{
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
                            'url' => 'Yii::app()->createUrl("student/view",array("id" => $data->id_answer,"involved" => $data->involved_person_id))'
                        ),
                        'update' => array(
                            'url' => 'Yii::app()->createUrl("student/update",array("id"=>$data->id_answer, "involved" => $data->involved_person_id))'
                        ),
                        'delete' => array(
                            'url' => 'Yii::app()->createUrl("student/delete", array("id" => $data->id_answer))'
                        ),
                    )
                )
            )
        ));
    }
?>
<?php /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); */?>
