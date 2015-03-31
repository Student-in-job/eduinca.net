<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->

<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
	<meta charset="UTF-8">
	
	<!-- Remove this line if you use the .htaccess -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	<link rel="shortcut icon" type="image/png" href="favicon.png">
	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css">
	
        <!-- bootstrap -->
        <?php Yii::app()->bootstrap->register(); ?>
        <!-- jqplot -->
        <link class="include" rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/jquery.jqplot.css" />
        <script class="include" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/jquery.min.js"></script>
        
		<!-- blueprint CSS framework -->
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

        <!-- my own css -->
        <link class="include" rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/my.css" />
	
        <!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<?php Yii::app()->name = Yii::t('site', 'sitename');?>
</head>

<body>
<!-- Prompt IE 7 users to install Chrome Frame -->
<!--[if lt IE 8]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

    <div class="container">
	<header id="navtop">
            <a href="#" class="logo fleft">
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/logo.png" alt="">
            </a>
            <div style="display:inline;float:left;padding-left:10px;padding-top:10px;font-size:22px;font-weight:bold;line-height:1.2em;color:#1e582e;">Programme Professional<br>Education and Training<br>in Central Asia</div>
            <div style="clear: both"></div>
            <div id="mainmenu" class="navbar navbar-inner">
		<?php $this->widget('zii.widgets.CMenu',array(
                        'activateParents'=>true,
                        'activeCssClass'=>'active',
			'items'=>array(
                            array('label' => Yii::t('site','home'), 'url' => array('/site/index'), 'visible'=>!Yii::app()->user->isGuest),
                            array('label' => Yii::t('site','survey'), 'url' => array('/survey/index'), 'visible'=>!Yii::app()->user->isGuest),
                            array('label' => Yii::t('site','statistics'), 'url' => array('/statistics/index'), 'visible'=>!Yii::app()->user->isGuest),
                            array('label' => Yii::t('site','reports'), 'url' => array('/analytic/index'), 'visible'=>!Yii::app()->user->isGuest),
                            array('label' => Yii::t('site','editor'), 'url' => array('/editor/index'), 'visible'=>!Yii::app()->user->isGuest),
                            array('label' => Yii::t('site','help'), 'url' => array('/help/index'), 'visible'=>!Yii::app()->user->isGuest),
                            //array('label' => Yii::t('country', 'countries'), 'url' => array('country/index')),
                            //array('label' => Yii::t('university', 'universities'), 'url' => array('university/index')),
                            //array('label' => Yii::t('answerteacher', 'answerteacher'), 'url' => array('answer/index', 'person' => '1')),
                            //array('label' => Yii::t('analytic', 'Analytic'), 'url' => array('analytic/index')),
                            //array('label' => Yii::t('site', 'about'), 'url' => array('/site/page', 'view'=>'about')),
                            //array('label' => Yii::t('site', 'contact'), 'url' => array('/site/contact')),
                            //array('label' => Yii::t('site', 'login'), 'url' => array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                            array('label' => Yii::t('site', 'logout').' ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                            //array('label' => Yii::t('site', 'user'), 'url' => array('/TblUser/index')),
			),
                        'htmlOptions' => array('class' => 'nav'),
		)); ?>
                <div id="language-selector" style="float:right; margin:5px;">
                    <?php $this->widget('application.extensions.widgets.LanguageSelector');?>
                </div>
            </div>
            
            <div style="clear: both"></div>
	</header>
        
        <!--<div style="clear: both"></div>-->
        <div class="home-page main">
            <?php echo $content; ?>
        </div> 
        <div class="divide-top">
            <footer class="grid-wrap">
                <ul class="grid col-one-third social">
                    <li><a href="#">RSS</a></li>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Google+</a></li>
                    <li><a href="#">Flickr</a></li>
		</ul>
		<div class="up grid col-one-third ">
			<a href="#navtop" title="Go back up">&uarr;</a>
		</div>
		<nav class="grid col-one-third ">
		<div style="color:#cccccc;font-size:12px;text-align:right;"><p>Copyright © 2014 - <?php echo date('Y'); ?> by PPETCA</p>All rights reserved.</div>
		</nav>
            </footer>
        </div>
    </div>
</body>
</html>
