<?php
/* @var $this CountryController */
/* @var $model Country */

$this->breadcrumbs=array(
	Yii::t('country', 'countries') => array('index'),
	$model->name => array('view','id'=>$model->id_country),
	Yii::t('country', 'updating'),
);

$updateMessage = Yii::t('country', 'changecountry');

/*$this->menu=array(
	array('label'=>'List Country', 'url'=>array('index')),
	array('label'=>'Create Country', 'url'=>array('create')),
	array('label'=>'View Country', 'url'=>array('view', 'id'=>$model->id_country)),
	array('label'=>'Manage Country', 'url'=>array('admin')),
);*/
?>

<h1>
    <?php echo Yii::t(
        'country',
        '{changecountry} {name}',
        array(
            '{changecountry}' => $updateMessage,
            '{name}' => $model->name,
        )
    )?>
</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'read' => true)); ?>