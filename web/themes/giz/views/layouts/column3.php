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
    <div class="span-24">
            <div id="content">
                    <?php echo $content; ?>
            </div><!-- content -->
    </div>
    <?php $this->endContent(); ?>
</section>