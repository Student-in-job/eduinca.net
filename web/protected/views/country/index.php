<?php
/* @var $this CountryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
        Yii::t('site', 'editor') => array('editor/index'),
	Yii::t('country', 'countries'),
);

$this->menu=array(
	array('label' => Yii::t('country', 'createcountry'), 'url' => array('create')),
	//array('label'=>'Manage Country', 'url'=>array('admin')),
);
?>

<ul class="nav nav-pills">
  <li role="presentation" class="active"><?php echo CHtml::link(Yii::t('country','countries'), array('country/index'));?></li>
  <li role="presentation"><?php echo CHtml::link(Yii::t('university','universities'), array('university/index'));?></li>
</ul>

<h1>Countries</h1>

<table class="table table-striped">
    <thead>
    <tr>
        <th><?php echo Yii::t('country', 'id')?></th>
        <th><?php echo Yii::t('country', 'code')?></th>
        <th><?php echo Yii::t('country', 'name')?></th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
        <?php $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$dataProvider,
                'itemView'=>'_view',
                'enableSorting' => true,
        )); ?>
    </tbody>
</table>