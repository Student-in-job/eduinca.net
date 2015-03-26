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
<?php
    $active1 ='';
    $active2 ='';
    $active3 ='';
    switch ($active){
        case 1:
            $active3 = 'active';
            break;
        case 2:
            $active2 = 'active';
            break;
        default :
            $active1 = 'active';
            break;
    }
?>
<ul class="nav nav-pills">
  <li role="presentation" class="<?php echo $active1;?>"><?php echo CHtml::link(Yii::t('university','all'), array('index'));?></li>
  <li role="presentation" class="<?php echo $active2;?>"><?php echo CHtml::link(Yii::t('university','colleges'), array('index', 'id' => 2));?></li>
  <li role="presentation" class="<?php echo $active3;?>"><?php echo CHtml::link(Yii::t('university','universities'), array('index', 'id' => 1));?></li>
</ul>

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