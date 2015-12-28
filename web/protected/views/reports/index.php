<?php
/* @var $this ReportsController */

$this->breadcrumbs=array(
	Yii::t('site', 'reports'),
);

$this->menu=array(
	array('label'=>Yii::t('reports','create_reports'), 'url'=>array('create')),
);

$this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider' => $dataProvider,
        'columns' => array(
                array(
                        'name' => 'id_report',
                        'value' => 'CHtml::encode($data->id_report)',
                ),
                array(
                        'name' => 'name',
                        'value' => 'CHtml::encode($data->name)',
                ),
                array(
                        'name' => 'year',
                        'value' => 'CHtml::encode($data->year)',
                ),
                array(
                        'class' => 'CLinkColumn',
                        'label' => Yii::t('reports','view'),
                        'urlExpression' => 'Yii::app()->createUrl("reports/view", array("id" => $data->id_report));',
                        //'header' => 'add_university',
                ),
                array(
                        'class' => 'CLinkColumn',
                        'label' => Yii::t('reports','generate'),
                        'urlExpression' => 'Yii::app()->createUrl("reports/generate", array("id" => $data->id_report));',
                        //'header' => 'add_university',
                )
        ),
        'pager' => array(
                'firstPageCssClass' => 'previous',
                'lastPageCssClass' => 'previous',
                'prevPageLabel' => false,
                'nextPageLabel' => false,
        )
));