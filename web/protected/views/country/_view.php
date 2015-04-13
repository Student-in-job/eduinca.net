<?php
/* @var $this CountryController */
/* @var $data Country */
?>
<tr>
<!--<div class="view">-->
	<td>
            <?php echo CHtml::encode($data->id_country); ?>
	</td>

<!--	<td>
            <?php //echo CHtml::link(CHtml::encode($data->code), array('view', 'id' => $data->id_country)); ?>
	</td>-->

	<td>
            <?php echo CHtml::link($data->getAttribute('name_' . Yii::app()->language), array('view', 'id' => $data->id_country)); ?>
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
                'confirm'=> Yii::t('site', 'confirm_delete')
            )); ?>
        </td>
<!--</div>-->
</tr>