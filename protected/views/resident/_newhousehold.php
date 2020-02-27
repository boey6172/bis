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
		<div class="col-md-10 ">
			<?php
			$resident = CHtml::listData( Resident::model()->findAll(array()), 'resident_id', 'Fullname'); ?>

			<?php echo $form->select2Group(
				$vm->householdResident,
				'resident_id',
				array(

					'widgetOptions' => array(
						'data' => $resident,
						'options' => array(
							'placeholder' => 'Search Resident',
							'width' =>'100%',
						
						),
					),
				)
			);?>
		</div>
	</div>


    <div class="row">
		<div class="col-md-3">
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
		<div class="col-md-3">
			<?php
				echo $form->textFieldGroup($vm->houseHold, 'type_of_house', array(
					'widgetOptions' => array(
						'htmlOptions' => array(
							'autocomplete' => 'off',
						)
					)
				));
			?>
		</div>	
		<div class="col-md-3">
			<!-- <?php
				echo $form->checkBoxGroup($vm->houseHold, 'house_ownership', array(
					'widgetOptions' => array(
						'htmlOptions' => array(
							'autocomplete' => 'off',
						)
					)
				));
			?> -->
		</div>	
	</div>
    <div class="row">

		<div class="col-md-4">
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
		<div class="col-md-4">
			<?php
				echo $form->textFieldGroup($vm->houseHold, 'barangay', array(
					'widgetOptions' => array(
						'htmlOptions' => array(
							'autocomplete' => 'off',
							'value' =>'Bulusan',
							'readOnly' =>'true',
						)
					)
				));
			?>
		</div>
		<div class="col-md-4">
			<?php
				echo $form->textFieldGroup($vm->houseHold, 'province', array(
					'widgetOptions' => array(
						'htmlOptions' => array(
							'autocomplete' => 'off',
							'value' =>'Oriental Mindoro',
							'readOnly' =>'true',
						)
					)
				));
			?>
		</div>		
	</div>
    <div class="row">
		<div class="col-md-3">
			<?php
				echo $form->textFieldGroup($vm->houseHold, 'district_name', array(
					'widgetOptions' => array(
						'htmlOptions' => array(
							'autocomplete' => 'off',
							'value' =>'First District',
							'readOnly' =>'true',
						)
					)
				));
			?>
		</div>	

		<div class="col-md-3">
			<?php
				echo $form->textFieldGroup($vm->houseHold, 'city', array(
					'widgetOptions' => array(
						'htmlOptions' => array(
							'autocomplete' => 'off',
							'value' =>'Calapan City',
							'readOnly' =>'true',

						)
					)
				));
			?>
		</div>	

		<div class="col-md-1">
			<?php
				echo $form->textFieldGroup($vm->houseHold, 'postal_code', array(
					'widgetOptions' => array(
						'htmlOptions' => array(
							'autocomplete' => 'off',
							'value' =>'5200',
							'readOnly' =>'true',
						)
					)
				));
			?>
		</div>	

		<div class="col-md-5">
			<?php
				echo $form->textFieldGroup($vm->houseHold, 'country', array(
					'widgetOptions' => array(
						'htmlOptions' => array(
							'autocomplete' => 'off',
							'value' =>'Philippines',
							'readOnly' =>'true',
						)
					)
				));
			?>
		</div>	
	</div>
    
</div>


<div class="box-footer">
		<!-- <?php
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
		?> -->
</div>


<?php $this->endWidget(); ?>
<?php

Yii::app()->clientScript->registerScript('reservation', "


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

