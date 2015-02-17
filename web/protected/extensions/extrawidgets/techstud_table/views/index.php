<style>
/* general styles */

div #st-table table, td{
	font:100% Arial, Helvetica, sans-serif; 
}
div #st-table table{width:100%;border-collapse:collapse;margin:1em 0;}
div #st-table th, td{text-align:left;padding:.5em;border:1px solid #fff;}
div #st-table th{background:#328aa4; color:#fff;}
div #st-table td{background:#e5f1f4;}

/* tablecloth styles */

div #st-table tr.even td{background:#e5f1f4;}
div #st-table tr.odd td{background:#f8fbfc;}

div #st-table th.over, tr.even th.over, tr.odd th.over{background:#4a98af;}
div #st-table th.down, tr.even th.down, tr.odd th.down{background:#bce774;}
div #st-table th.selected, tr.even th.selected, tr.odd th.selected{}

div #st-table td.over, tr.even td.over, tr.odd td.over{background:#ecfbd4;}
div #st-table td.down, tr.even td.down, tr.odd td.down{background:#bce774;color:#fff;}
div #st-table td.selected, tr.even td.selected, tr.odd td.selected{background:#bce774;color:#555;}

/* use this if you want to apply different styleing to empty table cells*/
div #st-table td.empty, tr.odd td.empty, tr.even td.empty{background:#fff;}
</style>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/tablecloth.js"></script>
<div id="st-table">
                <table>
			<tr>
                            <td>&nbsp;</td>
                                <?php 
                                    $country_element = new Country;
                                    $countries = Country::model()->findAll();
                                    foreach ( $countries as $country ) {
                                        echo '<td>'.$country->name.'</td>';
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
                                    $data = array_merge($student->getData(true), $teacher->getData(true));
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