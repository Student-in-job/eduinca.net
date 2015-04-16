<?php
/* @var $this StatisticsController */
$this->breadcrumbs=array(
	Yii::t('site', 'statistics'),
);
$this->menu=array(
	array('label'=>Yii::t('statistics','answers_teachers'), 'url'=>array('answer/index', 'person' => 1)),
	array('label'=>Yii::t('statistics','answers_students'), 'url'=>array('answer/index', 'person' => 2)),
    //array('label'=>Yii::t('answerstudent','member'), 'url'=>array('student/create', 'involved' => 1)),
	//array('label'=>Yii::t('answerstudent','notmember'), 'url'=>array('student/create', 'involved' => 2)),
    );
?>
<?php
    //var_dump($dataProvider);die ();
    $this->widget('zii.widgets.grid.CGridView', array(
            'dataProvider' => $dataProvider,
            'columns' => array(
                    array(
                        'name' => Yii::t('statistics', 'id'),
                        'type' => 'raw',
                        'value' => 'CHtml::encode($data["id"])',
                    ),
                    array(
                        'name' => Yii::t('statistics', 'name'),
                        'type' => 'raw',
                        'value' => 'CHtml::encode($data["name"])',
                    ),
                    array(
                        'name' => Yii::t('statistics', 'year'),
                        'type' => 'raw',
                        'value' => 'CHtml::encode($data["year"])',
                    ),
                    array(
                        'name' => Yii::t('statistics', 'universities'),
                        'type' => 'raw',
                        'value' => 'CHtml::encode($data["universities"])',
                    ),
                    array(
                        'name' => Yii::t('statistics', 'date'),
                        'type' => 'raw',
                        'value' => 'CHtml::encode($data["date"])',
                    ),
                    array(
                        'name' => Yii::t('statistics', 'teachers_involved'),
                        'type' => 'raw',
                        'value' => 'CHtml::encode($data["teachers_involved"])',
                    ),
                    array(
                        'name' => Yii::t('statistics', 'teachers_not_involved'),
                        'type' => 'raw',
                        'value' => 'CHtml::encode($data["teachers_not_involved"])',
                    ),
                    array(
                        'name' => Yii::t('statistics', 'students_involved'),
                        'type' => 'raw',
                        'value' => 'CHtml::encode($data["students_involved"])',
                    ),
                    array(
                        'name' => Yii::t('statistics', 'students_not_involved'),
                        'type' => 'raw',
                        'value' => 'CHtml::encode($data["students_not_involved"])',
                    ),
                    array(
                        'name' => Yii::t('statistics', 'active_codes'),
                        'type' => 'raw',
                        'value' => 'CHtml::encode($data["active_codes"])',
                    ),
                    array(
                        'name' => Yii::t('statistics', 'complete_codes'),
                        'type' => 'raw',
                        'value' => 'CHtml::encode($data["complete_codes"])',
                    ),
            )
    ));
?>