<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('site','settings') => array('settings/index'),
        Yii::t('site', 'users'),
);

$this->menu=array(
	array('label'=>Yii::t('user','create_user'), 'url'=>array('create')),
	array('label'=>Yii::t('user','manage_user'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('site','users'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
