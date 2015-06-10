<?php

$this->breadcrumbs=array(
        
	Yii::t('site', 'analytic') => array('analytic/index'),
        Yii::t('analytic', 'common')
);
?>

    <h3><?php echo Yii::t('analytic', 'respondents')?></h3>
<?php
    $header = array(
            0 => array(
                    ' ' => 1,
                    Yii::t('analytic', 'teachers') => 2,
                    Yii::t('analytic', 'students') => 2,
            ),
            1 => array(
                    ' ' => 1,
                    Yii::t('analytic', 'involved') => 1,
                    Yii::t('analytic', 'notinvolved') => 1,
                    Yii::t('analytic', 'involved') . ' ' => 1,
                    Yii::t('analytic', 'notinvolved'). ' ' => 1,
            )
    );
    
    $this->widget('application.extensions.widgets.tables.Table', array(
        'header' => $header,
        'data' => $data,
        'labels' => $countries,
    ));
?>
<br/>

<?php
//    $this->widget('application.extensions.widgets.jplot.jBarChart', array(
//            'data' => $dataPersonType,
//            'labels' => array(Yii::t('analytic','teachers'), Yii::t('analytic','students')),
//            'barWidth' => 40,
//            'width' => 650,
//            'height' => 400,
//            'xAxesLegend' => $axes,
//    ));
    
    $this->widget('application.extensions.widgets.charts.BarChart', array(
            'data' => $dataPersonType1,
            'xAxes' => $axes,
            'name' => 'draw11',
            'legend_left' => 500,
            'axisName' => '%',
    ));
?>