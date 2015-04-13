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
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	<link rel="shortcut icon" type="image/png" href="favicon.png">
	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css">
	
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
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
	</header>


<div class="home-page main">
	<section class="grid-wrap" >
		<header class="grid col-full">
			<hr>
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
			)); ?><!-- breadcrumbs -->
			<a href="#" class="fright"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/flag_en.png" alt="EN_">En</a>	
			<a href="#" class="fright"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/flag_ru.png" alt="RU_">Ru</a>	
		</header>
		
		<div class="grid col-one-half mq2-col-full">
			<?php echo $content; ?>
		</div>
	
		 <div class="grid col-one-half mq2-col-full">
		<div class="form-wrap">
				<div class="tabs">
					<h3 class="signup-tab"><a class="active" href="#signup-tab-content">Sign Up</a></h3>
					<h3 class="login-tab"><a href="#login-tab-content">Login</a></h3>
				</div><!--.tabs-->

				<div class="tabs-content">
					<div id="signup-tab-content" class="active">
						<form class="signup-form" action="" method="post">
							<input type="email" class="input" id="user_email" autocomplete="off" placeholder="Code">
							<input type="submit" class="button" value="Sign Up">
						</form><!--.login-form-->
						<div class="help-text">
							<p>By signing up, you agree to our</p>
							<p><a href="#">Terms of service</a></p>
						</div><!--.help-text-->
					</div><!--.signup-tab-content-->

					<div id="login-tab-content">
						<form class="login-form" action="" method="post">
							<input type="text" class="input" id="user_login" autocomplete="off" placeholder="Email or Username">
							<input type="password" class="input" id="user_pass" autocomplete="off" placeholder="Password">
							<input type="checkbox" class="checkbox" id="remember_me">
							<label for="remember_me">Remember me</label>

							<input type="submit" class="button" value="Login">
						</form><!--.login-form-->
						<div class="help-text">
							<p><a href="#">Forget your password?</a></p>
						</div><!--.help-text-->
					</div><!--.login-tab-content-->
				</div><!--.tabs-content-->
			</div><!--.form-wrap-->
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
	</div> <!--main-->

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
</body>
</html>
