<?php
/* @var $this UniversityController */
/* @var $model University */

$this->breadcrumbs=array(
    Yii::t('site', 'editor') => array('editor/index'),
	Yii::t('university', 'educational')=>array('index'),
    $model->getAttribute('name_' . Yii::app()->language) => array('view','id'=>$model->id_university),
	Yii::t('university', 'updating'),
);
/*
$this->menu=array(
	array('label'=>'List University', 'url'=>array('index')),
	array('label'=>'Create University', 'url'=>array('create')),
	array('label'=>'View University', 'url'=>array('view', 'id'=>$model->id_university)),
	array('label'=>'Manage University', 'url'=>array('admin')),
);
*/
$updateMessage = Yii::t('university', 'changeuniversity');
?>

    <?php
        echo Yii::t(
        'country',
        '{changeuniversity} «{name}»',
        array(
            '{changeuniversity}' => $updateMessage,
            '{name}' => $model->getAttribute('name_' . Yii::app()->language),
        ));
    ?>

<?php $this->renderPartial('_form', array('model'=>$model, 'country'=>$data, 'universityType'=>$type, 'read' => true)); ?>