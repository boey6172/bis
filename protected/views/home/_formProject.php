<?php /** @var TbActiveForm $form */
$form = $this->beginWidget(
	'booster.widgets.TbActiveForm',
	array(
		'id' => 'formProject',
		'type' => 'vertical',
	)
);
?>

<br/>
<div class="box-body">
	<div class="row">

		<div class="col-md-10">
			<?php
				echo $form->textFieldGroup($vm->project, 'proj_name', array(
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
					echo $form->numberFieldGroup($vm->project, 'budget', array(
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
					echo $form->textFieldGroup($vm->project, 'location', array(
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
					echo $form->textFieldGroup($vm->project, 'scope_of_work', array(
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
		<div class="col-md-5">
				<?php
					echo $form->numberFieldGroup($vm->project, 'lot_size', array(
						'widgetOptions' => array(
							'htmlOptions' => array(
								'autocomplete' => 'off',
							)
						)
					));
				?>
		</div>
		<div class="col-md-5">
			<?php
			$units = CHtml::listData( Unit::model()->findAll(array()), 'unit_id', 'description'); ?>

			<?php echo $form->select2Group(
				$vm->project,
				'unit',
				array(

					'widgetOptions' => array(
						'data' => $units,
						'options' => array(
							'placeholder' => 'Select/Enter Unit.',
						),
					),
				)
			);?>

		</div>
	</div>
</div>
<div class="box-footer">
		<?php
			$this->widget(
			    'booster.widgets.TbButton',
			    array(
			    	//'buttonType' => 'ajaxSubmit',
			        'label' => 'Save',
			        'icon' => 'fa fa-save ',
			        'context' => 'success',
			        'htmlOptions' => array(
			        	'class' => 'create_project btn cus_btn btn-mp btn-primary pull-right',
			        ),
			    )
			);
		?>
</div>

<?php $this->endWidget(); ?>
