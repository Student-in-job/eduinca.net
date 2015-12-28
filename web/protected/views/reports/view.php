<?php
/* @var $this ReportsController */

$this->breadcrumbs=array(
	Yii::t('site', 'reports') => array('index'),
	Yii::t('reports', 'view'),
);

$this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes'=>array(
		'id_report',
		'name',
		'year',
		'created_date',
                array(
                        'label' => Yii::t('reports','countries'),
                        'type' => 'raw',
                        'value' => $this->encodeJSON($model->countries ,$countries), //CHtml::encode($model->countries)
                ),
		array(
                        'label' => Yii::t('reports','chapter2'),
                        'type' => 'raw',
                        'value' => '<table><thead><tr><th style="text-align:center">' .
                                Yii::t('answer','teachers') .
                                '</th><th style="text-align:center">' . 
                                Yii::t('answer','students') .
                                '</th></tr></thead><tbody><tr><td>' . 
                                $this->encodeJSON($model->chapter2, $teachers_questions, 'teachers_questions') .
                                '</td><td>' . 
                                $this->encodeJSON($model->chapter2, $students_questions, 'students_questions') . 
                                '</td></tr></tbody></table>',
                ),
                array(
                        'label' => Yii::t('reports','chapter3'),
                        'type' => 'raw',
                        'value' => $this->encodeJSON($model->chapter3 ,$methodic), //CHtml::encode($model->countries)
                ),
	),
));
echo '<br/>';
echo CHtml::link('← '.Yii::t('site','back'),Yii::app()->request->urlReferrer, array('class'=>'button'));
?>