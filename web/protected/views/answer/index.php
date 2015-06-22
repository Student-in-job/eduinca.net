<?php
/* @var $this AnswerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
		Yii::t('site','statistics') => array('/statistics/index'),
        ($person == 1)?Yii::t('statistics','answers_teachers'):Yii::t('statistics','answers_students')//'Answer Teachers',
);
$active1 = '';
$active2 = '';
switch ($person)
{
    case 1: $active1='active';break;
    case 2: $active2='active';break;
}
?>

<ul class="nav nav-pills">
    <li class="<?php echo $active1;?>"><?php echo CHtml::link(Yii::t('answer','teachers'), array('index', 'person' => 1));?></li>
    <li class="<?php echo $active2;?>"><?php echo CHtml::link(Yii::t('answer','students'), array('index', 'person' => 2));?></li>
</ul>
<br/>
<ul class="nav nav-pills">
    <?php
        foreach ($years as $year)
        {
            $class = ($chosen_year == $year)?'class = active':'';
            echo '<li ' . $class . '>' . CHtml::link($year, array('index', 'person' => $person, 'year' => $year)) . '</li>';
        }
    ?>
</ul>
<?php
    if($person == 1){
        $this->widget('zii.widgets.grid.CGridView', array(
            'dataProvider' => $dataProvider,
            'columns' => array(
                array(
                    'name' => 'id_answer',
                    'value' => 'CHtml::encode($data->id_answer)',
                ),
                array(
                    'name' => 'code',
                    'value' => 'CHtml::encode($data->code)',
                ),
                array(
                    'name' => 'age',
                    'value' => 'CHtml::encode($data->age)',
                ),
                array(
                    'name' => 'university_id',
                    'value' => '$this->grid->controller->_university[$data->university_id]',
                ),
                array(
                    'name' => 'person_type_id',
                    'value' => '$this->grid->controller->_persontype[$data->person_type_id]',
                ),
                array(
                    'name' => 'involved_person_id',
                    'value' => '$this->grid->controller->_involved[$data->involved_person_id]',
                ),
                array(
                    'class' => 'CButtonColumn',
                    'template' => '{view}{update}{delete}',
                    'buttons' => array(
                        'view' => array(
                            'url' => 'Yii::app()->createUrl("teacher/view",array("id" => $data->id_answer, "involved" => $data->involved_person_id));'
                        ),
                        'update' => array(
                            'url' => 'Yii::app()->createUrl("teacher/update",array("id"=>$data->id_answer, "involved" => $data->involved_person_id));'
                        ),
                        'delete' => array(
                            'url' => 'Yii::app()->createUrl("teacher/delete", array("id" => $data->id_answer))'
                        ),
                    )
                ),
            ),
            'pager' => array ('class' => 'CLinkPager'),
            'pager' => array(
                    'firstPageCssClass' => 'previous',
                    'lastPageCssClass' => 'previous',
                    'prevPageLabel' => false,
                    'nextPageLabel' => false,
            )
        ));
    }
    else{
        $this->widget('zii.widgets.grid.CGridView', array(
            'dataProvider' => $dataProvider,
            'columns' => array(
                array(
                    'name' => 'id_answer',
                    'value' => 'CHtml::encode($data->id_answer)',
                ),
                array(
                    'name' => 'code',
                    'value' => 'CHtml::encode($data->code)',
                ),
                array(
                    'name' => 'age',
                    'value' => 'CHtml::encode($data->age)',
                ),
                array(
                    'name' => 'university_id',
                    'value' => '$this->grid->controller->_university[$data->university_id]',
                ),
                array(
                    'name' => 'person_type_id',
                    'value' => '$this->grid->controller->_persontype[$data->person_type_id]',
                ),
                array(
                    'name' => 'involved_person_id',
                    'value' => '$this->grid->controller->_involved[$data->involved_person_id]',
                ),
                array(
                    'class' => 'CButtonColumn',
                    'template' => '{view}{update}{delete}',
                    'buttons' => array(
                        'view' => array(
                            'url' => 'Yii::app()->createUrl("student/view",array("id" => $data->id_answer,"involved" => $data->involved_person_id))'
                        ),
                        'update' => array(
                            'url' => 'Yii::app()->createUrl("student/update",array("id"=>$data->id_answer, "involved" => $data->involved_person_id))'
                        ),
                        'delete' => array(
                            'url' => 'Yii::app()->createUrl("student/delete", array("id" => $data->id_answer))'
                        ),
                    )
                )
            ),
            'pager' => array ('class' => 'CLinkPager'),
            'pager' => array(
                    'firstPageCssClass' => 'previous',
                    'lastPageCssClass' => 'previous',
                    'prevPageLabel' => false,
                    'nextPageLabel' => false,
            )
        ));
    }
?>
