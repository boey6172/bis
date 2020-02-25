<?php
/* @var $this GenderController */
/* @var $model Gender */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('TbActiveForm', array(
	'id'=>'gender-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
	<div class="col-md-10">
			<?php
				echo $form->textFieldGroup($model, 'description', array(
					'widgetOptions' => array(
						'htmlOptions' => array(
							'autocomplete' => 'off',
						)
					)
				));
			?>
		</div>	
	</div>

	<div class="row buttons">
	<?php
			$this->widget(
			    'booster.widgets.TbButton',
			    array(
			    	'buttonType' => 'Submit',
			        'label' => 'Save',
			        'icon' => 'fa fa-save ',
			        'context' => 'success',
			        'htmlOptions' => array(
			        	'class' => 'save_resident btn cus_btn btn-mp btn-primary ',
			        ),
			    )
			);
		?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->