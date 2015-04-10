<?php $this->beginContent('//layouts/main'); ?>
    <header>
        <?php if(isset($this->breadcrumbs)):?>
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
        'links'=>$this->breadcrumbs,
        )); ?><!-- breadcrumbs -->
        <?php endif?><!-- breadcrumbs -->
    </header>
    <?php echo $content ?>
    <?php $this->endContent(); ?>