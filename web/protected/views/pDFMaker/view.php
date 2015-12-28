<?php
/* @var $this PDFMakerControllerController */

$this->breadcrumbs=array(
	'PDFmaker Controller'=>array('/pDFMakerController'),
	'View',
);

$header = '';
$header .= '<div style="font-family:Arial;color:#AAA;font-size:13pt; width:100%;text-align:right;">'
        . '<img src="' . Yii::app()->baseUrl . '/images/GIZ_LOGO.png" style="float:left;margin-left:-22px;"/><div style="padding-top:5px;">' 
        . Yii::t('site', 'fullsitename') . '</div></div>';
$header .= '<div style="clear:both;position:relative;"><hr style="margin:0;"/></div>';

?>

<div style="width: 21cm"><?php echo $header; ?><?php echo $html; ?></div>