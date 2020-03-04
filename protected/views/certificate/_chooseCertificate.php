<?php /** @var TbActiveForm $form */
$form = $this->beginWidget(
	'booster.widgets.TbActiveForm',
	array(
		'id' => 'formChooseCertificate',
		'type' => 'vertical',
	)
);
?>
<div class="box-body">
    <div class="row">
		<div class="col-md-10 ">
		<?php
		$type= CHtml::listData( TypeOfCertificate::model()->findAll(array()), 'id', 'description'); ?>

		<?php echo $form->select2Group(
			$vm->certificateRecord,
			'type_of_certificate',
			array(

				'widgetOptions' => array(
					'data' => $type,
					'options' => array(
                        'placeholder' => 'Select/Enter Certificte.',
                        'width' =>'100%',
                       
					),
				),
			)
		);?>
		</div>
	</div>
    <?php echo $form->hiddenField($vm->certificateRecord, 'resident_id', array());?>
    <div class="col-md-10 certificateInformation ">

					
    </div>

</div>

<?php $this->endWidget(); ?>
