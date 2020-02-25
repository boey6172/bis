<?php
/* @var $this GenderController */
/* @var $data Gender */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->gender_id), array('view', 'id'=>$data->gender_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>