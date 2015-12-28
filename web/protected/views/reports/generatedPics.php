<?php
/* @var $this ReportsController */

$this->breadcrumbs=array(
	Yii::t('site', 'reports') => array('index'),
	Yii::t('reports', 'generate'),
);
$this->layout='//layouts/column1';
?>
<style>
 .circle{
 width:150px;
 height:150px;
 display:block;
 border-radius:75px;
 -moz-border-radius:75px;
 -webkit-border-radius:75px;
 -khtml-border-radius:75px;
 font-size:20px; color:#fff;
 line-height:150px;
 text-align:center;
 background:#015C3B;
}
 .active{
     background:#1CBF17;
     opacity:0.95;
 }
 .passive{opacity:0.75;}
 .first{
     position: relative;
     top:50%;
     left:50%;
     margin:75px 0 0 -275px;
 }
 .second{
     position: relative;
     top:50%;
     left:50%;
     margin:-150px 0 0 -75px;
 }
 .third{
     position: relative;
     top:50%;
     left:50%;
     margin:-150px 0 0 125px;
 }
</style>
<?php
    $form = $this->beginWidget('CActiveForm', array(
            'id'=>'generate-form',
    ));
?>
    <h3 style="text-align:center"><?php echo Yii::t('reports','select_language');?></h3>
    <div class="row buttons">
        <?php
            echo CHtml::submitButton(Yii::t('reports','next') . ' →', array(
                    'submit' => array('generate', 'id' => $id, 'finish' => true, 'lang' => $lang),
                    'style' => 'width:auto',
            ));
        ?>
    </div>
<?php $this->endWidget();?>

<?php //echo CHtml::link(Yii::t('reports','next') . ' →',array('generate', 'id' => $id), array('class'=>'button', 'style'=>'float:right;'));?>

<div>
    <div class="circle passive first">Выбор языка</div>
    <div class="circle active second">Подготовка данных</div>
    <div class="circle passive third">Завершение</div>
</div>