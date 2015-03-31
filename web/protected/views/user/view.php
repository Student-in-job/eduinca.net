<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	Yii::t('site','settings') => array('settings/index'),
        Yii::t('site', 'users')=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('user', 'update_user'), 'url'=>array('update', 'id'=>$model->id_user)),
	array('label'=>Yii::t('user', 'delete_user'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_user),'confirm'=> Yii::t('site','confirm_delete') . '?')),
);
?>

<h1>View User #<?php echo $model->id_user; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_user',
		'name',
		'age',
		'email',
                'login',
		'password',
		'last_login',
	),
)); ?>
