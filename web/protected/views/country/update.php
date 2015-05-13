<?php
/* @var $this CountryController */
/* @var $model Country */

$this->breadcrumbs=array(
        Yii::t('site', 'editor') => array('editor/index'),
	Yii::t('country', 'countries') => array('index'),
	$model->getAttribute('name_' . Yii::app()->language) => array('view','id'=>$model->id_country),
	Yii::t('country', 'updating'),
);

$updateMessage = Yii::t('country', 'changecountry');
?>

    <?php echo Yii::t(
        'country',
        '{changecountry} «{name}»',
        array(
            '{changecountry}' => $updateMessage,
            '{name}' => $model->getAttribute('name_' . Yii::app()->language),
        )
    );
	?>

<?php $this->renderPartial('_form', array('model'=>$model, 'read' => true)); ?>