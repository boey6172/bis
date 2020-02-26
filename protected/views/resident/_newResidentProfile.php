<?php /** @var TbActiveForm $form */
$form = $this->beginWidget(
	'booster.widgets.TbActiveForm',
	array(
		'id' => 'formNewResident',
		'type' => 'vertical',
	)
);
?>

<br/>
<div class="box-body">
    <div class="row">
		<div class="col-md-4">
			<?php
				echo $form->textFieldGroup($vm->resident, 'first_name', array(
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
				echo $form->textFieldGroup($vm->resident, 'midle_name', array(
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
				echo $form->textFieldGroup($vm->resident, 'last_name', array(
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
		<div class="col-md-2">
			<?php
				echo $form->textFieldGroup($vm->resident, 'age', array(
					'widgetOptions' => array(
						'htmlOptions' => array(
							'autocomplete' => 'off',
						)
					)
				));
			?>
		</div>	
		<div class="col-md-4 ">
		<?php
		$gender = CHtml::listData( Gender::model()->findAll(array()), 'gender_id', 'description'); ?>

		<?php echo $form->select2Group(
			$vm->resident,
			'gender',
			array(

				'widgetOptions' => array(
					'data' => $gender,
					'options' => array(
						'placeholder' => 'Select/Enter Gender.',
						'width' =>'100%',
						
					),
				),
			)
		);?>
		</div>
		<div class="col-md-6 ">
			<?php
			$status = CHtml::listData( CivilStatus::model()->findAll(array()), 'status_id', 'description'); ?>

			<?php echo $form->select2Group(
				$vm->resident,
				'civil_status',
				array(

					'widgetOptions' => array(
						'data' => $status,
						'options' => array(
							'placeholder' => 'Select/Enter Civil Status.',
							'width' =>'100%',
						),
					),
				)
			);?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<?php
				echo $form->textFieldGroup($vm->resident, 'birthplace', array(
					'widgetOptions' => array(
						'htmlOptions' => array(
							'autocomplete' => 'off',
						)
					)
				));
			?>
		</div>	
		<div class="col-md-6">
			<?php echo $form->datePickerGroup(
				$vm->resident,
				'birthday',
				array(
					'widgetOptions' => array(
						'htmlOptions' => array(
							'readonly' => true,
						),
						'options' => array(
							'language' => 'en',
							'format' => 'yyyy-mm-dd',
						),
					),
					'wrapperHtmlOptions' => array(
					//	'class' => 'col-sm-5',
					),
					// 'hint' => 'Click inside! This is a super cool date field.',
					'append' => '<i class="fa fa-calendar"></i>',
					'readOnly'=>true,
				)
			); ?>
		</div>
	</div>	
	<div class="row">
		<div class="col-md-6">
			<?php
				echo $form->textFieldGroup($vm->resident, 'occupation', array(
					'widgetOptions' => array(
						'htmlOptions' => array(
							'autocomplete' => 'off',
						)
					)
				));
			?>
		</div>	
		<div class="col-md-6">
			<?php
				echo $form->textFieldGroup($vm->resident, 'educational_attainment', array(
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
		<!-- <?php
			$this->widget(
			    'booster.widgets.TbButton',
			    array(
			    	// 'buttonType' => 'ajaxSubmit',
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

