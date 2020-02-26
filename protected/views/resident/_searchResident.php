<?php /** @var TbActiveForm $form */
$form = $this->beginWidget(
	'booster.widgets.TbActiveForm',
	array(
		'id' => 'formSearchResident',
		'type' => 'vertical',
	)
);
?>
<div class="box-body">
    <div class="row">
		<div class="col-md-10 ">
		<?php
		$resident = CHtml::listData( Resident::model()->findAll(array()), 'resident_id', 'Fullname'); ?>

		<?php echo $form->select2Group(
			$vm->resident,
			'resident_id',
			array(

				'widgetOptions' => array(
					'data' => $resident,
					'options' => array(
                        'placeholder' => 'Select/Enter Resident.',
                        'width' =>'100%',
                       
					),
				),
			)
		);?>
		</div>
	</div>
    <div class="col-md-10 residentInformation">
 
					
    </div>

</div>

<?php $this->endWidget(); ?>
