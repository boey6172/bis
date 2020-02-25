<?php /** @var TbActiveForm $form */
$form = $this->beginWidget(
	'booster.widgets.TbActiveForm',
	array(
		'id' => 'formNewHouseHold',
		'type' => 'vertical',
	)
);
?>

<br/>
<div class="box-body">
    <div class="row">
		<div class="col-md-10">
			<?php
				echo $form->textFieldGroup($vm->houseHold, 'first_resided', array(
					'widgetOptions' => array(
						'htmlOptions' => array(
							'autocomplete' => 'off',
						)
					)
				));
			?>
		</div>	
	</div>
    <div class="row">
		<div class="col-md-10">
			<?php
				echo $form->textFieldGroup($vm->houseHold, 'unit_number', array(
					'widgetOptions' => array(
						'htmlOptions' => array(
							'autocomplete' => 'off',
						)
					)
				));
			?>
		</div>	
	</div>
    <div class="row">
		<div class="col-md-10">
			<?php
				echo $form->textFieldGroup($vm->houseHold, 'house_number', array(
					'widgetOptions' => array(
						'htmlOptions' => array(
							'autocomplete' => 'off',
						)
					)
				));
			?>
		</div>	
	</div>
    <div class="row">
		<div class="col-md-10">
			<?php
				echo $form->textFieldGroup($vm->houseHold, 'street', array(
					'widgetOptions' => array(
						'htmlOptions' => array(
							'autocomplete' => 'off',
						)
					)
				));
			?>
		</div>	
	</div>
    <div class="row">
		<div class="col-md-10">
			<?php
				echo $form->textFieldGroup($vm->houseHold, 'barangay', array(
					'widgetOptions' => array(
						'htmlOptions' => array(
							'autocomplete' => 'off',
						)
					)
				));
			?>
		</div>	
	</div>
    <div class="row">
		<div class="col-md-10">
			<?php
				echo $form->textFieldGroup($vm->houseHold, 'district_name', array(
					'widgetOptions' => array(
						'htmlOptions' => array(
							'autocomplete' => 'off',
						)
					)
				));
			?>
		</div>	
	</div>
    <div class="row">
		<div class="col-md-10">
			<?php
				echo $form->textFieldGroup($vm->houseHold, 'city', array(
					'widgetOptions' => array(
						'htmlOptions' => array(
							'autocomplete' => 'off',
						)
					)
				));
			?>
		</div>	
	</div>
    <div class="row">
		<div class="col-md-10">
			<?php
				echo $form->textFieldGroup($vm->houseHold, 'postal_code', array(
					'widgetOptions' => array(
						'htmlOptions' => array(
							'autocomplete' => 'off',
						)
					)
				));
			?>
		</div>	
	</div>
    <div class="row">
		<div class="col-md-10">
			<?php
				echo $form->textFieldGroup($vm->houseHold, 'country', array(
					'widgetOptions' => array(
						'htmlOptions' => array(
							'autocomplete' => 'off',
						)
					)
				));
			?>
		</div>	
	</div>
    
</div>


<div class="box-footer">
		<?php
			$this->widget(
			    'booster.widgets.TbButton',
			    array(
			    	'buttonType' => 'ajaxSubmit',
			        'label' => 'Save',
			        'icon' => 'fa fa-save ',
			        'context' => 'success',
			        'htmlOptions' => array(
			        	'class' => 'save_resident btn cus_btn btn-mp btn-primary pull-right',
			        ),
			    )
			);
		?>
</div>


<?php $this->endWidget(); ?>
<?php

Yii::app()->clientScript->registerScript('reservation', "
$('#Resident_birthday').change(function(){
	alert('The text has been changed.');
  });

var settings = 'placeholder: yehey,width: 100%,';

$('#Resident_gender').select2({
	placeholder: 'Select/Enter Gender',
	width: '100%'
});
$('#Resident_civil_status').select2({
	placeholder: 'Select/Enter Civil Status',
	width: '100%'
});

");
?>

