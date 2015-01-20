<?php
/* @var $this UniversityController */
/* @var $data University */
?>
<!--
<div class="view">
-->
<tr>
	<td>
            <?php echo CHtml::encode($data->id_university); ?>
	</td>

	<td>
            <?php echo CHtml::link(CHtml::encode($data->code),array('view','id'=>$data->id_university));?>
        </td>

        <td>
            <?php echo CHtml::encode($data->name); ?>
	</td>

	<td>
            <?php echo CHtml::encode($widget->viewData['type'][$data->university_type_id]); ?>
        </td>

	<td>            
            <?php echo CHtml::encode($widget->viewData['country'][$data->country_id]); ?>
        </td>
        
        <td>
            <?php echo CHtml::link(Yii::t('country', 'update'), array('update', 'id' => $data->id_university)); ?>
        </td>
        <td>
            <?php echo CHtml::link(
                Yii::t('country', 'delete'),
                '#',
                array('submit' => array(
                    'delete',
                    'id'=>$data->id_university,
                ),
                'confirm'=>'Are you sure you want to delete this item?')
            ); ?>
        </td>
</tr>
<!--
</div>
-->