<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<section class="grid-wrap" >
    <header class="grid col-full">
        <?php if(isset($this->breadcrumbs)):?>
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'links'=>$this->breadcrumbs,
        )); ?><!-- breadcrumbs -->
        <?php endif?><!-- breadcrumbs -->
    </header>
    <div class="grid col-one-half mq2-col-full">
        <h1><i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
    </div>

    <div class="grid col-one-half mq2-col-full">
        <?php 
        if (Yii::app()->user->IsGuest)
        {
            $this->widget('application.extensions.widgets.Login', array('model' => $model));
        }
        else
        {
            echo CHtml::link(
                        Yii::t('site', 'logout'),
                        array('site/logout'),
                        array('class' => 'btn btn-primary')
                );
        }
        ?>
    </div>
		
</section>
<section class="services grid-wrap">
    <header class="grid col-full">
        <hr>
        <p class="fleft"></p>
    </header>

    <article class="grid col-one-third mq3-col-full">
        <h5>О программе</h5>
        <p>Данный опрос предназначен для определения методики преподавания в высших и средних профессиональных учебных заведениях-партнерах Программы,  а также для выявления потенциала для улучшения образовательных процессов в этих учреждениях.</p>
    </article>
        
    <article class="grid col-one-third mq3-col-full">
        <h5>Web development</h5>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim.</p>
    </article>
		
    <article class="grid col-one-third mq3-col-full">
        <h5>Контакты</h5>
	<p>Адрес:</p>
	<p>Телефон:</p>
	<p>E-mail:</p>
    </article>
</section>
<!--main-->
        
        
<!-- Javascript - jQuery -->
<script src="http://code.jquery.com/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.7.2.min.js"><\/script>')</script>
	<script>
jQuery(document).ready(function($) {
	tab = $('.tabs h3 a');

	tab.on('click', function(event) {
		event.preventDefault();
		tab.removeClass('active');
		$(this).addClass('active');

		tab_content = $(this).attr('href');
		$('div[id$="tab-content"]').removeClass('active');
		$(tab_content).addClass('active');
	});
});
</script>
<!--[if (gte IE 6)&(lte IE 8)]>
<script src="js/selectivizr.js"></script>
<![endif]-->

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.flexslider-min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/scripts.js"></script>