<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/img/favicon.ico">
	<link rel="shortcut icon" type="image/png" href="<?php echo Yii::app()->theme->baseUrl; ?>/img/favicon.png">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link class="include" rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/my.css" />
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/raphael-min.js" type="text/javascript" charset="utf-8"></script>
	<!--[if lt IE 9]><script language="javascript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/excanvas.js"></script><![endif]-->
    <link class="include" rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/jquery.jqplot.css" />
    <script class="include" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/jquery.min.js"></script>
	<title><?php echo /*CHtml::encode($this->pageTitle).'-'.*/Yii::t('site','fullsitename'); ?></title>
</head>
<body>
<!-- Prompt IE 7 users to install Chrome Frame -->
<!--[if lt IE 8]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
    <div class="container">
	<header id="navtop">
        <a href="#" class="logo fleft">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/logo.png" alt="">
        </a>
        <div style="display:inline;float:left;padding-left:10px;padding-top:10px;font-size:22px;font-weight:bold;line-height:1.2em;color:#1e582e;"><?php echo nl2br(Yii::t('site','fullsname_title')); ?></div>
        <div id="language-selector"><?php $this->widget('application.extensions.widgets.LanguageSelector');?></div>
		<div style="clear:both;"></div>
			<div id="mainmenu" class="navbar navbar-inner">
				<?php
						$this->widget('zii.widgets.CMenu',array(
									'activateParents'=>true,
									'activeCssClass'=>'active',
									'items'=>array(
										/*array('label' => Yii::t('site','home'), 'url' => array('/site/index'), 'visible' => !Yii::app()->user->isGuest, 'active' => ($this->menuItem =='main')),*/
										array('label' => Yii::t('site','survey'), 'url' => array('/survey/index'), 'visible' => (Yii::app()->user->name == 'administrator'), 'active' => ($this->menuItem =='survey')),
										array('label' => Yii::t('site','statistics'), 'url' => array('/statistics/index'), 'visible' => (Yii::app()->user->name == 'administrator'), 'active' => ($this->menuItem =='statistic')),
										array('label' => Yii::t('site','reports'), 'url' => array('/analytic/index'), 'visible' => (Yii::app()->user->name == 'administrator'), 'active' => ($this->menuItem =='analytic')),
										array('label' => Yii::t('site','editor'), 'url' => array('/editor/index'), 'visible' => (Yii::app()->user->name == 'administrator'), 'active' => ($this->menuItem =='editor')),
										array('label' => Yii::t('site','settings'), 'url' => array('/settings/index'), 'visible' => (Yii::app()->user->name == 'administrator'), 'active' => ($this->menuItem =='settings')),
										array('label' => Yii::t('site','help'), 'url' => array('/help/index'), 'visible' => !Yii::app()->user->isGuest), 'active' => ($this->menuItem =='help'),
										//array('label' => Yii::t('site', 'about'), 'url' => array('/site/page', 'view'=>'about')),
										//array('label' => Yii::t('site', 'contact'), 'url' => array('/site/contact')),
										//array('label' => Yii::t('site', 'login'), 'url' => array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
										array('label' => Yii::t('site', 'logout').' ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
									),
								'htmlOptions' => array('class' => 'nav'),
						));
					?>
			</div>
			<div style="padding:2px;background-color:#1CBF17;"></div>
        <div style="clear:both;"></div>
	</header>
     <!-- header --> 
        <div class="home-page main">
            <?php echo $content; ?>
        </div>
		<!-- footer -->
        <div class="divide-top">
            <footer class="grid-wrap">
                <ul class="grid col-one-third social">
                    <li><a href="#order"><?php echo nl2br(Yii::t('site','terms_of_use')); ?></a></li>
				</ul>
					<div id="order" class="modalDialog">
						<div>
							<a href="#close" title="close" class="close">X</a>
							<h3><?php echo Yii::t('site','terms_of_use'); ?></h3>
							<p>
							
							</p>
						</div>
					</div>			
				<div class="up grid col-one-third ">
					<a href="#navtop" title="">&uarr;</a>
				</div>
				<nav class="grid col-one-third ">
					<div style="color:#cccccc;font-size:12px;text-align:right;"><p>Copyright © 2014 - <?php echo date('Y'); ?> by <a href="http://eduinca.net">PBBZ</a>.</p><?php echo Yii::t('site', 'rightsreserved')?>.</div>
				</nav>
            </footer>
        </div>
    </div>
</body>
</html>
