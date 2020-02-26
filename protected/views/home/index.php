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

					<li role="presentation" class="disabled">
						<a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
							<span class="round-tab">
								<i class="fa fa-home fa-lg"></i>
							</span>
						</a>
					</li>

					<li role="presentation" class="disabled">
						<a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
							<span class="round-tab">
								<i class="fa fa-user fa-lg"></i>
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
					<ul class="list-inline pull-left">
							<li><button type="button" class="btn cus_btn btn-primary btn-mp prev-step"><i class="fa fa-chevron-circle-left"></i> Previous</button></li>
					</ul>
					<ul class="list-inline pull-right">
							<li><button id="submit_form_btn" type="button" class="btn cus_btn btn-primary btn-mp next-step"><i class="fa fa-chevron-circle-right"></i> Next</button></li>
					</ul>
				</div>

				<div class="tab-pane" role="tabpanel" id="step2">
					<?php 
						echo $this->renderPartial('/resident/_newHousehold', array(
							'vm' => $vm
						), true)
					?>
					<ul class="list-inline pull-left">
							<li><button type="button" class="btn cus_btn btn-primary btn-mp prev-step"><i class="fa fa-chevron-circle-left"></i> <!-- Previous --></button></li>
					</ul>
					<ul class="list-inline pull-right">
							<li><button id="submit_form_btn" type="button" class="btn cus_btn btn-primary btn-mp"><i class="fa fa-chevron-circle-right"></i> <!-- Next --></button></li>
					</ul>
				</div>

				<div class="tab-pane" role="tabpanel" id="step3">
					<!-- <br>
					<div class="alert alert-info">
						<b><span class="fa fa-question-circle"></span>  Please enter details Customer Details </b>
					</div> -->
					
					<div class="row-fluid">
						<div class="list-view">
							<div class="row">
								<div id="step3-content"></div>
									<?php 
											echo $this->renderPartial('/resident/_newResidentProfile', array(
												'vm' => $vm
											), true)
									?>
							</div>
						</div>
					</div>
					<div style="clear: both;"></div>
					<ul class="list-inline pull-left">
						<li><button type="button" class="btn cus_btn btn-primary btn-mp prev-step"><i class="fa fa-chevron-circle-left"></i> <!-- Previous --></button></li>
					</ul>
					<ul class="list-inline pull-right">
							<li><button id="submit_form_btn" type="button" class="btn cus_btn btn-primary btn-mp fillSummary"><i class="fa fa-chevron-circle-right"></i> <!-- Next --></button></li>
					</ul>
				</div>
				<div class="tab-pane" role="tabpanel" id="complete">
						<div class="list-view">
							<div class="row">
								<div id="complete-content"></div>

							</div>
						</div>
				<button type="button" class="btn cus_btn btn-primary btn-mp prev-step pull-left"><i class="fa fa-chevron-circle-left"></i> Back</button>

				<button type="button" class="btn cus_btn btn-success btn-mp pull-right" id="save_reservation_btn"><i class="fa fa-check-circle-o"></i> Save</button>
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
	$index = Yii::app()->createUrl( "home/index" );
	$success = 'success';
	$error = 'error';
	$csrf = Yii::app()->request->csrfToken;

   Yii::app()->clientScript->registerScript('home_script', "

   	function nextStep() {
		var active = $('.wizard .nav-tabs li.active');
		var success = $('.connecting-line .connecting-success');
		var containerWidth = ($('.connecting-line .connecting-success').width() / $('.connecting-line').width())* 100;
		$('.connecting-line .connecting-success').width(containerWidth + (25 / 100) * 100  + '%');
		active.next().removeClass('disabled');
		nextTab(active);
	}
	$(document).on('click', '.next-step', function(){
		$('#quantity_form').submit();		
	});
	
	$('#Resident_resident_id').on('change', function(){
		viewResident();
	});


	function viewResident()
	{
	var sd = $('#Resident_resident_id').val();

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
								//$('#sowModal').modal('hide');
								myAlert('The Project was edited Successfully', 'myalert-' + json.retVal);
								setTimeout(function() {
								 	$('.residentInformation').html(json.retMessage.details1);
									//refreshScope();
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

   ");
?>