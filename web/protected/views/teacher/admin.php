<?php
/* @var $this TeacherController */
/* @var $model Teacher */

$this->breadcrumbs=array(
	'Teachers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Teacher', 'url'=>array('index')),
	array('label'=>'Create Teacher', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#teacher-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Teachers</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'teacher-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_answer',
		'code',
		'age',
		'sex',
		'faculty',
		'student_teach1',
		/*
		'common_q1',
		'common_q2',
		'common_q3',
		'common_q4',
		'common_q5',
		'common_q6',
		'common_q7',
		'common_q8',
		'common_q9',
		'common_comment',
		'methodic_q1',
		'methodic_q2',
		'methodic_q3',
		'methodic_q4',
		'methodic_q5',
		'methodic_q6',
		'methodic_q7',
		'methodic_q8',
		'methodic_q9',
		'methodic_q10',
		'methodic_q11',
		'methodic_q12',
		'methodic_q13',
		'methodic_comment',
		'labs',
		'num_labs',
		'labs_comment',
		'practice',
		'practice_place',
		'practice_duration',
		'num_of_papers',
		'num_of_papers_theoretical',
		'num_of_papers_practical',
		'private_papers',
		'private_comments',
		'university_id',
		'person_type_id',
		'involved_person_id',
		'year',
		'methodic_qq1',
		'methodic_qq2',
		'methodic_qq3',
		'methodic_qq4',
		'methodic_qq5',
		'methodic_qq6',
		'methodic_qq7',
		'methodic_qq8',
		'methodic_qq9',
		'methodic_qq10',
		'methodic_qq11',
		'methodic_qq12',
		'methodic_qq13',
		'student_teach2',
		'student_teach3',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
