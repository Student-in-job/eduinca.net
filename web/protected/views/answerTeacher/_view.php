<?php
/* @var $this AnswerTeacherController */
/* @var $data AnswerTeacher */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_answer')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_answer), array('view', 'id'=>$data->id_answer)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('age')); ?>:</b>
	<?php echo CHtml::encode($data->age); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sex')); ?>:</b>
	<?php echo CHtml::encode($data->sex); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('faculty')); ?>:</b>
	<?php echo CHtml::encode($data->faculty); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_teach')); ?>:</b>
	<?php echo CHtml::encode($data->student_teach); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('common_q1')); ?>:</b>
	<?php echo CHtml::encode($data->common_q1); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('common_q2')); ?>:</b>
	<?php echo CHtml::encode($data->common_q2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('common_q3')); ?>:</b>
	<?php echo CHtml::encode($data->common_q3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('common_q4')); ?>:</b>
	<?php echo CHtml::encode($data->common_q4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('common_q5')); ?>:</b>
	<?php echo CHtml::encode($data->common_q5); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('common_q6')); ?>:</b>
	<?php echo CHtml::encode($data->common_q6); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('common_q7')); ?>:</b>
	<?php echo CHtml::encode($data->common_q7); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('common_q8')); ?>:</b>
	<?php echo CHtml::encode($data->common_q8); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('common_q9')); ?>:</b>
	<?php echo CHtml::encode($data->common_q9); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('common_comment')); ?>:</b>
	<?php echo CHtml::encode($data->common_comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('methodic_q1')); ?>:</b>
	<?php echo CHtml::encode($data->methodic_q1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('methodic_q2')); ?>:</b>
	<?php echo CHtml::encode($data->methodic_q2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('methodic_q3')); ?>:</b>
	<?php echo CHtml::encode($data->methodic_q3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('methodic_q4')); ?>:</b>
	<?php echo CHtml::encode($data->methodic_q4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('methodic_q5')); ?>:</b>
	<?php echo CHtml::encode($data->methodic_q5); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('methodic_q6')); ?>:</b>
	<?php echo CHtml::encode($data->methodic_q6); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('methodic_q7')); ?>:</b>
	<?php echo CHtml::encode($data->methodic_q7); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('methodic_q8')); ?>:</b>
	<?php echo CHtml::encode($data->methodic_q8); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('methodic_q9')); ?>:</b>
	<?php echo CHtml::encode($data->methodic_q9); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('methodic_q10')); ?>:</b>
	<?php echo CHtml::encode($data->methodic_q10); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('methodic_q11')); ?>:</b>
	<?php echo CHtml::encode($data->methodic_q11); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('methodic_q12')); ?>:</b>
	<?php echo CHtml::encode($data->methodic_q12); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('methodic_q13')); ?>:</b>
	<?php echo CHtml::encode($data->methodic_q13); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('methodic_comment')); ?>:</b>
	<?php echo CHtml::encode($data->methodic_comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('labs')); ?>:</b>
	<?php echo CHtml::encode($data->labs); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_labs')); ?>:</b>
	<?php echo CHtml::encode($data->num_labs); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('labs_comment')); ?>:</b>
	<?php echo CHtml::encode($data->labs_comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('practice')); ?>:</b>
	<?php echo CHtml::encode($data->practice); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('practice_place')); ?>:</b>
	<?php echo CHtml::encode($data->practice_place); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('practice_duration')); ?>:</b>
	<?php echo CHtml::encode($data->practice_duration); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_of_papers')); ?>:</b>
	<?php echo CHtml::encode($data->num_of_papers); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_of_papers_theoretical')); ?>:</b>
	<?php echo CHtml::encode($data->num_of_papers_theoretical); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_of_papers_practical')); ?>:</b>
	<?php echo CHtml::encode($data->num_of_papers_practical); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('private_papers')); ?>:</b>
	<?php echo CHtml::encode($data->private_papers); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('private_comments')); ?>:</b>
	<?php echo CHtml::encode($data->private_comments); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('university_id')); ?>:</b>
	<?php echo CHtml::encode($data->university_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('person_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->person_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('involved_person_id')); ?>:</b>
	<?php echo CHtml::encode($data->involved_person_id); ?>
	<br />

	*/ ?>

</div>