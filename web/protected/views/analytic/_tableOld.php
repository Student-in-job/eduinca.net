<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

    <table class="table table-bordered tab">
        <caption><?php echo $caption; ?></caption>
        <thead>
            <tr>
                <?php
                    echo '<th></th>';
                    foreach($header as $item)
                    {
                        echo '<th>' . $item . '</th>';
                    }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
                $counter = 1;
                foreach($data as $row)
                {
                    echo '<tr>';
                    foreach($row as $key => $value)
                    {
                        echo '<td style="width:18px">' . $counter++ . '. </td>';
                        echo '<td style="width:400px">'  . Yii::t($translate, $key) . '</td>';
                        foreach ($value as $data)
                        {
                            echo '<td class="tab td">'. $data .'</td>';
                        }
                    }
                    echo '</tr>';
                }
            ?>
            
        </tbody>
    </table>
