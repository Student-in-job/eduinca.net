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
        
        <img src="<?php echo Yii::app()->request->baseUrl;?>/images/asia.png"> 
    </div>

    <div class="grid col-one-half mq2-col-full">
        <?php 
        if (Yii::app()->user->IsGuest)
        {
            $this->widget('application.extensions.widgets.Login', array('model' => $model, 'code' => $code));
        }
        else
        {
            /*
            echo CHtml::link(
                        Yii::t('site', 'logout'),
                        array('site/logout'),
                        array('class' => 'btn btn-primary')
                );
             * 
             */
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
        <h5></h5>
        <p style="text-align:center;"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/slogan.png" border="0"></p>
    </article>
		
    <article class="grid col-one-third mq3-col-full">
        <h5>Контакты</h5>
	<p>Адрес: Chimkentskaya St. 7a, 100029, Tashkent, Uzbekistan</p>
	<p>Телефон: +998 71 140-04-90</p>
	<p>E-mail: <a href="mailto:ekaterina.golubina@giz.de">ekaterina.golubina@giz.de</a></p>
	<p>Web: www.eduinca.net</p>
    </article>
</section>
<!--main-->
        
        
<!-- Javascript - jQuery -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.7.2.min.js"></script>
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
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/selectivizr.js"></script>
<![endif]-->

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/scripts.js"></script>