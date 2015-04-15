<style>
/* general styles */

div #st-table table, div #st-table td{
	font:100% Arial, Helvetica, sans-serif; 
}
div #st-table table{width:100%;border-collapse:collapse;margin:1em 0;}
div #st-table th, div #st-table td{text-align:left;padding:.5em;border:1px solid #fff;}
div #st-table th{background:#328aa4; color:#fff;}
div #st-table td{background:#e5f1f4;}

/* tablecloth styles */

div #st-table tr.even td{background:#e5f1f4;}
div #st-table tr.odd td{background:#f8fbfc;}

div #st-table th.over, div #st-table tr.even th.over, div #st-table tr.odd th.over{background:#4a98af;}
div #st-table th.down, div #st-table tr.even th.down, div #st-table tr.odd th.down{background:#bce774;}
div #st-table th.selected, div #st-table tr.even th.selected, div #st-table tr.odd th.selected{}

div #st-table td.over, div #st-table tr.even td.over, div #st-table tr.odd td.over{background:#ecfbd4;}
div #st-table td.down, div #st-table tr.even td.down, div #st-table tr.odd td.down{background:#bce774;color:#fff;}
div #st-table td.selected, div #st-table tr.even td.selected, div #st-table tr.odd td.selected{background:#bce774;color:#555;}

/* use this if you want to apply different styleing to empty table cells*/
div #st-table td.empty, div #st-table tr.odd td.empty, div #st-table tr.even td.empty{background:#ECF2FF/*fff*/;}
</style>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/tablecloth.js"></script>
<div id="st-table">
                <table>
			<tr>
                            <td>&nbsp;</td>
                                <?php 
                                    $country_element = new Country;
                                    $countries = Country::model()->findAll();
                                    foreach ( $countries as $country ) {
                                        echo '<th>'.$country->getAttribute('name_' . Yii::app()->language).'</th>';
                                    }
                                ?>
			</tr>
			<tr>
                            <th><?php echo Yii::t('analytic', 'Students'); ?></th>                        
                                <?php 
                                    $student_element = new Student;
                                    $student = new StudentStatistic();
                                    $teacher = new TeacherStatistic();
                                    $teacher->setCount();
                                    $student->setCount();
//                                    $data = array_merge($student->getData(true), $teacher->getData(true));
                                    $stud = $student->getData(true);
                                    $teach = $teacher->getData(true);
                                    foreach ($stud as $st){
                                        echo '<td>' . "$st[num]" . '</td>';
                                    }
                                ?>                           
			</tr>
                        <tr>
                            <th><?php echo Yii::t('analytic', 'Teachers'); ?></th>
                                <?php 
                                    foreach ($teach as $t){
                                        echo '<td>' . "$t[num]" . '</td>';
                                    }
                                ?>
                        </tr>
                </table>
</div>