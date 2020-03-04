<!-- CONTENTS -->

<div class="page-header">
	<!-- <h3><span class="fa  fa-dashboard"></span>&nbsp;<b> Barangay Bulusan Information System</b></h3>
	<hr> -->
</div>
<?php /** @var TbActiveForm $form */
$form = $this->beginWidget(
	'booster.widgets.TbActiveForm',
	array(
		'id' => 'formCode',
		'type' => 'vertical',
		// 'action'=>Yii::app()->createUrl("project/view"),
		'method'=>'get',
	)
);
?>

<?php $this->endWidget(); ?>


<div class="row">
	<div class="col-md-10">
	<div class=" box box-info">
		<div class="box-header with-border">
			<h3 class="box-title"><span class="fa fa-dashboard"></span> Dashboard  </h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				</button>
			</div>
		</div>
		<div class="wizard">
			<div class="wizard-inner">
				<div class="connecting-line">
				<div class="connecting-success"></div>
				</div>
				<ul class="nav nav-tabs line" role="tablist">

					<li role="presentation" class="active">
						<a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
							<span class="round-tab">
								<i class="fa fa-search fa-lg"></i>
							</span>
						</a>
					</li>

					<li role="presentation" class="disabled starting">
						<a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
							<span class="round-tab">
								<i class="fa fa-user fa-lg"></i>
							</span>
						</a>
					</li>

					<li role="presentation" class="disabled lasting">
						<a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
							<span class="round-tab">
								<i class="fa fa-home fa-lg"></i>
							</span>
						</a>
					</li>
					<li role="presentation" class="disabled">
						<a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
							<span class="round-tab">
								<i class="fa fa-file-text-o fa-lg"></i>
							</span>
						</a>
					</li>

				</ul>
			</div> <!-- End of Inner-wizard  -->

			<div class="tab-content">
				<div class="tab-pane active" role="tabpanel" id="step1">
					<?php 
						echo $this->renderPartial('/resident/_searchResident', array(
							'vm' => $vm
						), true)
					?>
					<ul class="list-inline pull-right">
						<button id="last" type="button" class="btn cus_btn btn-primary btn-mp button-last hidden"><i class="fa fa-chevron-circle-right"></i> Next</button>
							<!-- <li><button id="submit_form_btn" type="button" class="btn cus_btn btn-primary btn-mp next-step"><i class="fa fa-chevron-circle-right"></i> Next</button></li> -->
					</ul>
				</div>

				<div class="tab-pane" role="tabpanel" id="step2">
					<?php 
						echo $this->renderPartial('/resident/_newResidentProfile', array(
							'vm' => $vm
						), true)
					?>
					<ul class="list-inline pull-left">
							<li><button type="button" class="btn cus_btn btn-primary btn-mp prev-step "><i class="fa fa-chevron-circle-left"></i> Previous</button></li>
					</ul>
					<ul class="list-inline pull-right">
							<li><button id="submit_form_btn" type="button" class="btn cus_btn btn-primary btn-mp validateResident"><i class="fa fa-chevron-circle-right"></i> Next</button></li>
					</ul>
				</div>

				<div class="tab-pane" role="tabpanel" id="step3">
					<?php 
						echo $this->renderPartial('/resident/_newHousehold', array(
							'vm' => $vm
						), true)
					?>

					<ul class="list-inline pull-left">
						<li><button type="button" class="btn cus_btn btn-primary btn-mp prev-step"><i class="fa fa-chevron-circle-left"></i> Previous</button></li>
					</ul>
					<ul class="list-inline pull-right">
							<li><button id="submit_form_btn" type="button" class="btn cus_btn btn-primary btn-mp validateHouseHold"><i class="fa fa-chevron-circle-right"></i> Next</button></li>
					</ul>
				</div>
				<div class="tab-pane" role="tabpanel" id="complete">				
							<?php 
								echo $this->renderPartial('/certificate/_chooseCertificate', array(
									'vm' => $vm
								), true)
							?>		

					<ul class="list-inline pull-left">
						<li><button type="button" class="btn cus_btn btn-primary btn-mp start"><i class="fa fa-chevron-circle-left"></i> Previous</button></li>
					</ul>
				<!-- <button type="button" class="btn cus_btn btn-success btn-mp pull-right" id="save_reservation_btn"><i class="fa fa-check-circle-o"></i> Save</button> -->
				</div>
				<div class="clearfix"></div>
			</div> <!-- end of Tab Content -->
		</div>
		</div>
	</div>
</div>


<script type="text/javascript">
$(document).ready(function () {

		//Wizard
$('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

		var $target = $(e.target);

		if ($target.parent().hasClass('disabled')) {
				return false;
		}
});

$(".next-step").click(function (e) {

		var $active = $('.wizard .nav-tabs li.active');
		var $success = $('.connecting-line .connecting-success');
		var containerWidth = ($(".connecting-line .connecting-success").width() / $(".connecting-line").width())* 100;
		$('.connecting-line .connecting-success').width(containerWidth +(25 / 100) * 100 + '%');
		$active.next().removeClass('disabled');
		nextTab($active);
		


	});
	$("#last").click(function (e) {

		var $active = $('.lasting');
		var $success = $('.connecting-line .connecting-success');
		var containerWidth = ($(".connecting-line .connecting-success").width() / $(".connecting-line").width())* 100;
		$('.connecting-line .connecting-success').width(containerWidth +(75 / 100) * 100 + '%');
		$active.next().removeClass('disabled');
		nextTab($active);

	});
	$(".start").click(function (e) {
			var $active = $('.starting');
			 var containerWidth = ($(".connecting-line .connecting-success").width() / $(".connecting-line").width())* 100;
			 $('.connecting-line .connecting-success').width(containerWidth -  (75 / 100) * 100 + '%');
			prevTab($active);
	});


	$(".prev-step").click(function (e) {
			var $active = $('.wizard .nav-tabs li.active');
			 var containerWidth = ($(".connecting-line .connecting-success").width() / $(".connecting-line").width())* 100;
			 $('.connecting-line .connecting-success').width(containerWidth -  (25 / 100) * 100 + '%');
			prevTab($active);
	});

});

function nextTab(elem) {
	$(elem).next().find('a[data-toggle="tab"]').click();
}

function prevTab(elem) {
		$(elem).prev().find('a[data-toggle="tab"]').click();
}

</script>


<?php
	
	$projectCreate = Yii::app()->createUrl( "home/createProject" );
	$projectView = Yii::app()->createUrl( "project/view" );
	$retResident = Yii::app()->createUrl( "home/viewResident" );
	$retCertifcateForm = Yii::app()->createUrl( "home/viewCertificate" );
	$saveResident = Yii::app()->createUrl( "home/saveResident" );
	$saveHouseHold = Yii::app()->createUrl( "home/saveHouseHold" );
	$saveBarangaycert = Yii::app()->createUrl( "home/saveBarangaycert" );
	$viewBarangaycert = Yii::app()->createUrl( "certificate/BarangayCertificate" );


	$index = Yii::app()->createUrl( "home/index" );
	$success = 'success';
	$error = 'error';
	$csrf = Yii::app()->request->csrfToken;

   Yii::app()->clientScript->registerScript('home_script', "
   initialSelect2();
   function nextStep() {
		var active = $('.wizard .nav-tabs li.active');
		var success = $('.connecting-line .connecting-success');
		var containerWidth = ($('.connecting-line .connecting-success').width() / $('.connecting-line').width())* 100;
		$('.connecting-line .connecting-success').width(containerWidth + (25 / 100) * 100  + '%');
		active.next().removeClass('disabled');
		nextTab(active);
	}



	function initialSelect2()
	{
		$('#Resident_resident_id').select2({
			language: {
				'noResults': function(){
					return ' <a href=# id=create class=btn btn-danger create>Create new Resident</a>';
				}
			},
			escapeMarkup: function (markup) {
				return markup;
			},
			placeholder: 'Select/Enter Resident.',
			width :'100%',
			
		});
	}
	$(document).on('click', '#chocho', function(){
		// $('#formNewResident').submit();
		// nextStep();
		// alert();
	
	});

	$(document).on('click', '#create', function(){
		nextStep();		
		hideSelect();
		initialSelect2();
	});

	function hideSelect()
	{
		$('#Resident_resident_id').select2('destroy');
		$('#Resident_resident_id').select2();
	}




	$(document).on('click', '.validateResident', function(){
		$('#formNewResident').submit();
		// nextStep();
	
	});

	$(document).on('click', '.validateHouseHold', function(){
		$('#formNewHouseHold').submit();
		// nextStep();
		
	});


	$('#Resident_gender').on('change', function() {
		$(this).valid();
	});
	$('#Resident_civil_status').on('change', function() {
		$(this).valid();
	});
	
	
	/// validator for resident
	$().ready(function() {
		$('#formNewResident').validate(
		{
			ignore: [], 
			submitHandler: function() {
				nextStep();
			},
			highlight: function (element, errorClass, validClass) {
				$(element).addClass(errorClass); //.removeClass(errorClass);
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},
			unhighlight: function (element, errorClass, validClass) {
				$(element).removeClass(errorClass); //.addClass(validClass);
				$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
			},
			errorElement : 'div',
			errorLabelContainer: '.error',
			errorPlacement: function (error, element) {
				if (element.parent('.input-group').length) { 
					error.insertAfter(element.parent());      // radio/checkbox?
				} else if (element.hasClass('select2')) {     
					error.insertAfter(element.next('form-control'));  // select2
				} else {                                      
					error.insertAfter(element);               // default
				}
			}
		});
	

		$('#Resident_first_name').rules('add', {
			required:true,
			minlength:2,
			messages : {
				required : 'First Name Required',
			}
		});
		$('#Resident_midle_name').rules('add', {
			required:false,
			minlength:2,
			messages : {
				required : 'Middle Name Required',
			}
		});
		$('#Resident_last_name').rules('add', {
			required:true,
			minlength:2,
			messages : {
				required : 'Last Name Required',
			}
		});
		$('#Resident_age').rules('add', {
			required:true,
			digits:true,
			minlength:1,
			messages : {
				required : 'Please Enter the age of the resident',
			}
		});
		$('#Resident_occupation').rules('add', {
			required:true,
			minlength:2,
			messages : {
				required : 'Please enter the occupation of the Resident',
			}
		});
		$('#Resident_birthplace').rules('add', {
			required:true,
			minlength:2,
			messages : {
				required : 'Please enter the birth place of the Resident',
			}
		});
		$('#Resident_gender').rules('add', {
			required:true,
			minlength:1,
			messages : {
				required : 'Please Select/Enter Gender',
			}
		});
		$('#Resident_educational_attainment').rules('add', {
			required:true,
			minlength:1,
			messages : {
				required : 'Please Select/Enter Educational Attainment',
			}
		});
		$('#Resident_civil_status').rules('add', {
			required:true,
			minlength:1,
			messages : {
				required : 'Please Select/Enter Civil Status',
			}
		});
		$('#Resident_birthday').rules('add', {
			required:true,
			minlength:1,
			messages : {
				required : 'Please Select/Enter Birthdate',
			}
			
		});

	});

	/// validator for household
	$().ready(function() {
		$('#formNewHouseHold').validate(
		{
			ignore: [], 
			submitHandler: function() {
				SaveHouseHoldResident();
			},
			highlight: function (element, errorClass, validClass) {
				$(element).addClass(errorClass); //.removeClass(errorClass);
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},
			unhighlight: function (element, errorClass, validClass) {
				$(element).removeClass(errorClass); //.addClass(validClass);
				$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
			},
			errorElement : 'div',
			errorLabelContainer: '.error',
			errorPlacement: function (error, element) {
				if (element.parent('.input-group').length) { 
					error.insertAfter(element.parent());      // radio/checkbox?
				} else if (element.hasClass('select2')) {     
					error.insertAfter(element.next('form-control'));  // select2
				} else {                                      
					error.insertAfter(element);               // default
				}
			}
		});
	

		$('#HouseHold_first_resided').rules('add', {
			required:true,
			minlength:2,
			messages : {
				required : 'Please enter what year that resident resided',
			}
		});
		$('#HouseHold_type_of_house').rules('add', {
			required:true,
			minlength:2,
			messages : {
				required : 'Please enter the type of house',
			}
		});
		$('#HouseHold_street').rules('add', {
			required:true,
			minlength:2,
			messages : {
				required : 'Please enter the Street/block/Lot',
			}
		});
		$('#HouseHold_barangay').rules('add', {
			required:true,
			minlength:2,
			messages : {
				required : 'Please enter the Street/block/Lot',
			}
		});
		$('#HouseHold_province').rules('add', {
			required:true,
			minlength:2,
			messages : {
				required : 'Please enter the Street/block/Lot',
			}
		});
		$('#HouseHold_district_name').rules('add', {
			required:true,
			minlength:2,
			messages : {
				required : 'Please enter the Street/block/Lot',
			}
		});
		$('#HouseHold_city').rules('add', {
			required:true,
			minlength:2,
			messages : {
				required : 'Please enter the Street/block/Lot',
			}
		});
		$('#HouseHold_postal_code').rules('add', {
			required:true,
			minlength:2,
			messages : {
				required : 'Please enter the Street/block/Lot',
			}
		});
		$('#HouseHold_country').rules('add', {
			required:true,
			minlength:2,
			messages : {
				required : 'Please enter the Street/block/Lot',
			}
		});

	});

	$(document).on('click', '.save_certificate', function(){
		Savebrangaycertificate();
	});


	





	$('#Resident_resident_id').on('change', function(){
		viewResident();
	});

	function viewResident()
	{
	var sd = $('#Resident_resident_id').val();
	
	$('#CertificateRecord_resident_id').val(sd);

	var YII_CSRF_TOKEN = '{$csrf}';

		$.ajax({
	        type        : 'POST',
	        url         : '{$retResident}',
	        data: {
				'Resident[resident_id]':sd,
				'YII_CSRF_TOKEN':YII_CSRF_TOKEN,
			},
	        dataType:'json',
			statusCode: {
			       403: function() { 
			       		window.location =  '{$index}';
				   },
				   200: function(data) {
						var json = data;

					    if(json.retVal == '{$success}')
						{
							myAlertSaving(true, 'Wait, loading...', 'myalert-info');
							setTimeout(function() { 
								myAlertSaving(false);
								myAlert('The Resident loaded Successfully', 'myalert-' + json.retVal);
								setTimeout(function() {
									$('#last').removeClass('hidden');
								 	$('.residentInformation').html(json.retMessage.details1);
								}, 1000);
							}, 1500);	
						}
						else if(json.retVal == '{$error}')
						{
						myAlert('Sorry for the Inconvinience this error was sent to our development Team. Please Refresh and Try again. ', 'myalert-' + json.retVal);
						}
						else
						{
							myAlert('Sorry for the Inconvinience this error was sent to our development Team. Please Refresh and Try again. ', 'myalert-' + json.retVal);
						}
				   }
				}
	    })
	}

	$('#CertificateRecord_type_of_certificate').on('change', function(){
		viewCertificateForm();
	});

	function viewCertificateForm()
	{
	var tc = $('#CertificateRecord_type_of_certificate').val();
	var ri = $('#CertificateRecord_resident_id').val();
	var YII_CSRF_TOKEN = '{$csrf}';

		$.ajax({
	        type        : 'POST',
	        url         : '{$retCertifcateForm}',
	        data: {
				'CertificateRecord[type_of_certificate]':tc,
				'Resident[resident_id]':ri,
				'YII_CSRF_TOKEN':YII_CSRF_TOKEN,
			},
	        dataType:'json',
			statusCode: {
			       403: function() { 
			       		window.location =  '{$index}';
				   },
				   200: function(data) {
						var json = data;

					    if(json.retVal == '{$success}')
						{
							myAlertSaving(true, 'Wait, loading...', 'myalert-info');
							setTimeout(function() { 
								myAlertSaving(false);
								myAlert('The Certificate form loaded Successfully', 'myalert-' + json.retVal);
								setTimeout(function() {
									 $('.certificateInformation').html(json.retMessage.details1);
								}, 1000);
				
							}, 1500);	
						}
						else if(json.retVal == '{$error}')
						{
						myAlert('Sorry for the Inconvinience this error was sent to our development Team. Please Refresh and Try again. ', 'myalert-' + json.retVal);
						}
						else
						{
							myAlert('Sorry for the Inconvinience this error was sent to our development Team. Please Refresh and Try again. ', 'myalert-' + json.retVal);
						}
				   }
				}
	    })
	}




	function SaveHouseHoldResident()
	{
		var resident_id ;
		$.ajax({
	        type        : 'POST',
	        url         : '{$saveResident}',
	        data: $('#formNewResident').serialize(),

	        dataType:'json',
			statusCode: {
			       403: function() { 
			       		window.location =  '{$index}';
				   },
				   200: function(data) {
						var json = data;

					    if(json.retVal == '{$success}')
						{
							$('#HouseHold_res_id').val(json.retMessage) ;
							myAlertSaving(true, 'Wait, loading...', 'myalert-info');
							$(document).ajaxStart(function() { Pace.restart(); });

							setTimeout(function() { 
								myAlertSaving(false);
								myAlert('The Resident was edited Successfully', 'myalert-' + json.retVal);
								
							}, 1500);
							
							$.ajax({
								type        : 'POST',
								url         : '{$saveHouseHold}',
								data: $('#formNewHouseHold').serialize() , 
								dataType:'json',
								statusCode: {
									   403: function() { 
											   window.location =  '{$index}';
									   },
									   200: function(data) {
											var json = data;
					
											if(json.retVal == '{$success}')
											{
												
												myAlertSaving(true, 'Wait, loading...', 'myalert-info');
					
												setTimeout(function() { 
													myAlertSaving(false);
													myAlert('The Resident was edited Successfully', 'myalert-' + json.retVal);
													$('#CertificateRecord_resident_id').val(json.retMessage);
													nextStep();
												}, 1500);
					
													
											}
											else
											{
												myAlert('Sorry for the Inconvinience this error was sent to our development Team. Please Refresh and Try again. ', 'myalert-' + json.retVal);
											}
									   }
									}
							})



								
						}
						else
						{
							myAlert('Sorry for the Inconvinience this error was sent to our development Team. Please Refresh and Try again. ', 'myalert-' + json.retVal);
						}
				   }
				}
		})
	}
	
	function Savebrangaycertificate()
	{
		
		var tc = $('#CertificateRecord_type_of_certificate').val();
		var ri = $('#CertificateRecord_resident_id').val();
		var age = $('#BarangayClearance_age').val();
		var p = $('#BarangayClearance_purpose').val();


		var YII_CSRF_TOKEN = '{$csrf}';
		$.ajax({
	        type        : 'POST',
	        url         : '{$saveBarangaycert}',
			data: 
			{
				'CertificateRecord[type_of_certificate]':tc,
				'Resident[resident_id]':ri,
				'BarangayClearance[age]':age,
				'BarangayClearance[purpose]':p,
				'YII_CSRF_TOKEN':YII_CSRF_TOKEN,
			},
	        dataType:'json',
			statusCode: {
			       403: function() { 
			       		window.location =  '{$index}';
				   },
				   200: function(data) {
						var json = data;

					    if(json.retVal == '{$success}')
						{

							myAlertSaving(true, 'Wait, loading...', 'myalert-info');

							setTimeout(function() { 
								myAlertSaving(false);
								myAlert('The Certificate was added was edited Successfully', 'myalert-' + json.retVal);
								window.location =  '{$viewBarangaycert}' + '&id=' + json.retMessage;
							}, 1500);
								
						}
						else
						{
							myAlert('Sorry for the Inconvinience this error was sent to our development Team. Please Refresh and Try again. ', 'myalert-' + json.retVal);
						}
				   }
				}
		})
	}

   ");
?>