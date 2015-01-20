<?php
/* @var $this UniversityController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('university', 'universities'),
);

$this->menu=array(
	array('label' => Yii::t('university', 'createuniversity'), 'url'=>array('create')),
//	array('label'=>'Manage University', 'url'=>array('admin')),
);
?>
<?php echo CHtml::link('<div style="max-width: 50px;height: 30px; padding: 5px; background-color: #FFF6BF; text-align: center; float: left">Все</div>', array('index'));?>
<?php echo CHtml::link('<div style="max-width: 150px;height: 30px; padding: 5px; background-color: #FFF6BF; text-align: center; float: left">Колледжы</div>', array('index', 'id' => 2));?>
<?php echo CHtml::link('<div style="max-width: 150px;height: 30px; padding: 5px; background-color: #FFF6BF; text-align: center; float: left">Университеты</div>', array('index', 'id' => 1));?>
<div style="clear: both"></div>

<h1>Universities</h1>
<table class="table table-striped">
    <thead>
        <tr>
        <th><?php echo Yii::t('university', 'id');?></th>
        <th><?php echo Yii::t('university', 'code');?></th>
        <th><?php echo Yii::t('university', 'name');?></th>
        <th><?php echo Yii::t('university', 'type');?></th>
        <th><?php echo Yii::t('university', 'country');?></th>
        <th></th>
        <th></th>
        </tr>
    </thead>
    <tbody>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
        'viewData'=>array('country' => $data, 'type' => $type)
)); ?>
    </tbody>
</table>