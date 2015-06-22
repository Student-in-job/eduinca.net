<?php $this->beginContent('//layouts/main'); ?>
    <header>
        <?php if(isset($this->breadcrumbs)):?>
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
        'links'=>$this->breadcrumbs,
        )); ?><!-- breadcrumbs -->
        <?php endif?><!-- breadcrumbs -->
    </header>
    <div style="min-height:350px;">
    <?php echo $content ?>
    </div>
    <?php $this->endContent(); ?>