<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<section class="grid-wrap" >
    <header class="grid col-full">
    <?php if(isset($this->breadcrumbs)):?>
    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>$this->breadcrumbs,
    )); ?><!-- breadcrumbs -->
    <?php endif?><!-- breadcrumbs -->
    </header>
    <div style="min-height:350px;">
    <div class="span-20">
        <?php echo $content; ?>
    </div>
    <div class="span-5">
            <div id="sidebar">
            <?php
                    $this->beginWidget('zii.widgets.CPortlet', array(
                            'title' => Yii::t('site', 'operations'),
                    ));
                    $this->widget('zii.widgets.CMenu', array(
                            'items'=>$this->menu,
                            'htmlOptions'=>array('class'=>'operations'),
                    ));
                    $this->endWidget();
            ?>
            </div><!-- sidebar -->
    </div>
    </div>
    <?php $this->endContent(); ?>
</section>