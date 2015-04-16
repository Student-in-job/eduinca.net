<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <?php Yii::app()->name = Yii::t('site', 'sitename');?>
</head>

<body>
<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

        
        <div id="language-selector" style="float:right; margin:5px;">
            <?php 
                $this->widget('application.extensions.widgets.LanguageSelector');
            ?>
        </div>
        
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
                        'activateParents'=>true,
                        'activeCssClass'=>'active',
			'items'=>array(
                            array('label' => Yii::t('site','home'), 'url' => array('/site/index')),
                            array('label' => Yii::t('country', 'countries'), 'url' => array('country/index')),
                            array('label' => Yii::t('university', 'universities'), 'url' => array('university/index')),
                            array('label' => Yii::t('answerteacher', 'answerteacher'), 'url' => array('answer/index', 'person' => '1')),
                            array('label' => Yii::t('analytic', 'Analytic'), 'url' => array('analytic/index')),
                            //array('label' => Yii::t('site', 'about'), 'url' => array('/site/page', 'view'=>'about')),
                            //array('label' => Yii::t('site', 'contact'), 'url' => array('/site/contact')),
                            array('label' => Yii::t('site', 'login'), 'url' => array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                            array('label' => Yii::t('site', 'logout').' ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                            //array('label' => Yii::t('site', 'user'), 'url' => array('/TblUser/index')),
			),
		)); ?>
	</div>
        <!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Programme Professional Education and Training in Central Asia.<br/>
		<?php echo Yii::t('site', 'rightsreserved'); ?>.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
