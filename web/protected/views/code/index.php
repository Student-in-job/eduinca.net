<?php
/* @var $this CodeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Codes',
);

$this->menu=array(
	array('label'=>'Create Code', 'url'=>array('create')),
	array('label'=>'Manage Code', 'url'=>array('admin')),
);
?>

<h1>Codes</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
                array(
                        'name' => 'id_code',
                        'value' => 'CHtml::encode($data->id_code)'
                ),
                array(
                        'name' => 'code',
                        'value' => 'CHtml::encode($data->code)'
                ),
                array(
                        'name' => 'completed',
                        'value' => 'CHtml::encode($data->completed)'
                ),
                array(
                        'name' => 'completed_date',
                        'value' => 'CHtml::encode($data->completed_date)'
                ),
                array(
                        'name' => 'survey_in_university_id',
                        'value' => 'CHtml::encode($data->survey_in_university_id)'
                ),
        ),
)); ?>
