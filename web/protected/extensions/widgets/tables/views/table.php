<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id = "st-table">
    <table>
        <?php echo '<caption style ="padding-left:4px;margin:2px 0;background:#D0FFCF;">' . $this->caption . '</caption>'; ?>
        <thead>
            <?php
                foreach($this->header as $row)
                {
                    
                    echo '<tr>';
                    foreach($row as $colname => $colspan)
                    {
                        if ($colname == ' ')
                            echo '<th colspan = "' . $colspan . '" style="background:#fff">' . $colname . '</th>';
                        else
                            echo '<th colspan = "' . $colspan . '">' . $colname . '</th>';
                    }
                    echo '</tr>';
                }
            ?>
        </thead>
        <tbody>
            <?php
                foreach($this->GetNormalizedArray() as $row)
                {
                    echo '<tr>';
                    foreach($row as $key => $value)
                    {
                        echo '<td' . $this->SetBackground() . '>'  . $value . '</td>';
                    }
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</div>