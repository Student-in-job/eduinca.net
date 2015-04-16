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