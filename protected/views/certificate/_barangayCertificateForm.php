<?php /** @var TbActiveForm $form */
$form = $this->beginWidget(
	'booster.widgets.TbActiveForm',
	array(
		'id' => 'formBarangaycertificate',
		'type' => 'vertical',
	)
);
?>

<div class="box-body">
    <div class="row">
    
		<div class="col-md-4">
            <span class="info-box-number"> <?php echo $vm->resident->Fullname?> </span>
		</div>
    </div>
    <div class="row">
		<div class="col-md-4">
			<?php
				echo $form->textFieldGroup($vm->barangayClearance, 'age', array(
					'widgetOptions' => array(
						'htmlOptions' => array(
                            'autocomplete' => 'off',
                            'value'=>  $vm->resident->age,
						)
					)
				));
			?>
		</div>	

		<div class="col-md-4">
			<?php
				echo $form->textFieldGroup($vm->barangayClearance, 'purpose', array(
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
                $this->widget(
                    'booster.widgets.TbButton',
                    array(
                        // 'buttonType' => 'Submit',
                        'label' => 'Create Certificate',
                        'icon' => 'fa fa-save ',
                        'context' => 'success',
                        'htmlOptions' => array(
                            'class' => 'save_certificate btn cus_btn btn-mp btn-primary pull-right',
                        ),
                    )
                );
            ?>	
        </div>
	</div>
</div>
<?php $this->endWidget(); ?>
