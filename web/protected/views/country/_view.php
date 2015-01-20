<?php
/* @var $this CountryController */
/* @var $data Country */
?>
<tr>
<!--<div class="view">-->
	<td>
            <?php echo CHtml::encode($data->id_country); ?>
	</td>

	<td>
            <?php echo CHtml::link(CHtml::encode($data->code), array('view', 'id' => $data->id_country)); ?>
	</td>

	<td>
            <?php echo \CHtml::encode($data->name); ?>
	</td>

        <td>
            <?php echo CHtml::link(Yii::t('country', 'update'), array('update', 'id' => $data->id_country)); ?>
        </td>
	<td>
            <?php echo CHtml::link(
                Yii::t('country', 'delete'),
                '#',
                array('submit' => array(
                    'delete',
                    'id'=>$data->id_country
                ),
                'confirm'=>'Are you sure you want to delete this item?')
            ); ?>
        </td>
<!--</div>-->
</tr>