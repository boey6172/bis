 <div class="page-header">
	<h3><span class="fa  fa-check-circle"></span>&nbsp;<b> Registration</b></h3>
	<hr>
</div>

<style>
.has-error .select2-selection {

}
.error{
	color:red;
}
</style>


<div class="row">
	<div class="col-md-6">
		<div class=" box box-info">
			<div class="box-header with-border">
              <h3 class="box-title"><span class="fa fa-user"></span> Household head Personal Information  </h3>
    			<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                	</button>
           		</div>
			</div>
        	<div class="box-body ">
			<?php
				$this->renderPartial('_newResidentProfile', array(
					'vm' => $vm,
				));
			?>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class=" box box-info">
			<div class="box-header with-border">
              <h3 class="box-title"><span class="fa fa-building"></span> Household Information </h3>
    			<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                	</button>
           		</div>
			</div>
        	<div class="box-body ">
			<?php
				$this->renderPartial('_newhousehold', array(
					'vm' => $vm,
				));
			?>
			</div>
		</div>
	</div>
</div>
<?php
$success = 'success';
$error = 'error';
$return = 'return';
$csrf = Yii::app()->request->csrfToken;

$saveResident = Yii::app()->createUrl( "resident/save" );
$index = Yii::app()->createUrl( "resident/new" );

Yii::app()->clientScript->registerScript('reservation', "
///submit form
$(document).on('click', '.save_resident', function(){
	$('#formNewResident').submit();
	// saveResident();
});

$.validator.setDefaults({
	submitHandler: function() {
		saveResident();
	}
});
function saveResident()
	{
$('save_resident').addClass('disabled');
		var YII_CSRF_TOKEN = '{$csrf}';

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
							
							myAlertSaving(true, 'Wait, loading...', 'myalert-info');

							setTimeout(function() { 
								myAlertSaving(false);
								myAlert('The Project was edited Successfully', 'myalert-' + json.retVal);
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


/// validator
$().ready(function() {
	$('#formNewResident').validate(
	{
		 ignore: [], 
	});
   

	$('#Resident_first_name').rules('add', {
		required:true,
		minlength:2,
		messages : {
			required : 'First Name Required',
		}
	});
	$('#Resident_midle_name').rules('add', {
		required:true,
		minlength:2,
		messages : {
			required : 'Middle Name Required',
		}
	});
	$('#Resident_last_name').rules('add', {
		required:true,
		minlength:2,
		messages : {
			required : 'Middle Name Required',
		}
	});
	$('#Resident_age').rules('add', {
		required:true,
		digits:true,
		minlength:1,
		messages : {
			required : 'Please Enter age',
		}
	});
	$('#Resident_occupation').rules('add', {
		required:true,
		minlength:2,
		messages : {
			required : 'Age  Required',
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
			required : 'Please Select/Enter Gender',
		}
	});
	$('#Resident_civil_status').rules('add', {
		required:true,
		minlength:1,
		messages : {
			required : 'Please Select/Enter Gender',
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


");
?>

