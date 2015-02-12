<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



?>

<script class="include" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/jquery.jqplot.js"></script>
<script class="include" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/plugins/jqplot.barRenderer.js"></script>
<script class="include" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jqplot/plugins/jqplot.pointLabels.js"></script>

<table>
    <thead class="tab">
        <tr>
            <th><span><?php echo Yii::t('analytic', 'Teachers');?></span></th>
            <th><span><?php echo Yii::t('analytic', 'Students');?></span></th>
        </tr>
    </thead>
    <tbody>
<?php //var_dump($dataTeacher);?>
<?php
    $stringArray = array();
    foreach ($dataTeacher as $key => $data){
        $stringArray[$key] ='[';
        foreach ($data as $item){
            $stringArray[$key] .= $item;
            $stringArray[$key] .= ',';
        }
        $stringArray[$key] .= '0';
        $stringArray[$key] .=']';
    }
    $stringArray1 = array();
    foreach ($dataTeacherNot as $key => $data){
        $stringArray1[$key] ='[';
        foreach ($data as $item){
            $stringArray1[$key] .= $item;
            $stringArray1[$key] .= ',';
        }
        $stringArray1[$key] .= '0';
        $stringArray1[$key] .=']';
    }
    $stringArray3 = array();
    foreach ($dataStudent as $key => $data){
        $stringArray3[$key] ='[';
        foreach ($data as $item){
            $stringArray3[$key] .= $item;
            $stringArray3[$key] .= ',';
        }
        $stringArray3[$key] .= '0';
        $stringArray3[$key] .=']';
    }
    $stringArray4 = array();
    foreach ($dataStudentNot as $key => $data){
        $stringArray4[$key] ='[';
        foreach ($data as $item){
            $stringArray4[$key] .= $item;
            $stringArray4[$key] .= ',';
        }
        $stringArray4[$key] .= '0';
        $stringArray4[$key] .=']';
    }
    //$stringArray .= ']';
    //var_dump($stringArray);
    foreach($stringArray as $key => $value){
        echo '<tr>';
        echo '<td>';
            $this->renderPartial(
                '_barSeveral',
                array(
                    'id' => 'T' . $key,
                    'data' => $stringArray[$key] . ',' . $stringArray1[$key],
                    'title' => $key,
                    'series' => '{label:\'' . Yii::t('analytic','involved') . '\'},{label: \'' . Yii::t('analytic','notinvolved') . '\'}'
                    )
            );
        echo '</td>';
        echo '<td>';
            $this->renderPartial(
                '_barSeveral',
                array(
                    'id' => 'S' . $key,
                    'data' => $stringArray3[$key] . ',' . $stringArray4[$key],
                    'title' => $key,
                    'series' => '{label:\'' . Yii::t('analytic','involved') . '\'},{label: \'' . Yii::t('analytic','notinvolved') . '\'}'
                    )
            );
        echo '</td>';
        echo '<tr>';
    }
?>
    </tbody>
</table>