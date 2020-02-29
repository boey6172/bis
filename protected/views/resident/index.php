<div class="page-header">
	<h3><span class="fa  fa-user"></span>&nbsp;<b> Residents</b></h3>

</div>



<div class="row">
	<div class="col-md-10">
		<div class=" box box-info">
			<div class="box-header with-border">
              <h3 class="box-title"><span class="fa fa-user-plus"></span> Residnent List  </h3>
    			<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                	</button>
           		</div>
			</div>
        	<div class="box-body ">
            
            <?php
                $this->widget(
                    'booster.widgets.TbButton',
                    array(
                        //'buttonType' => 'ajaxSubmit',
                        'label' => 'Edit Project',
                        'icon' => 'fa fa-user-plus ',
                        'context' => 'info',
                        'htmlOptions' => array(
                            'class' => 'newResident btn cus_btn btn-mp btn-primary',
                        ),
                    )
                );
            ?>
            
			<?php
				$this->renderPartial('_listResident', array(
					'vm' => $vm,
				));
			?>
			</div>
		</div>
	</div>

</div>
<?php
    echo $this->alenaModal( 'newResidentModal', array(
        'title' => "<span class='fa fa-search '></span>&nbsp;<span class='modalTitle'>New Resident</span>",
        // 'body' => $this->renderPartial('_newResidentProfile2', array(
        // 	'vm' => $vm,
        // ), true),
        'footer' =>
        	CHtml::button('Close', array("class" => "btn cus_btn btn-danger", "data-dismiss"=>"modal")).''.
        	CHtml::button('Save', array("class" => "btn edtProject cus_btn  btn-primary",  "data-dismiss"=>"modal"))
        ,

        'style' => '
        	width	: 95%;
        ',
    ));
?>
<?php
    echo $this->alenaModal( 'viewResidentmodal', array(
        'title' => "<span class='fa fa-edit '></span>&nbsp;<span class='modalTitle'>Edit Resident</span>",
        'body' => '',
        'footer' =>
            CHtml::button('Close', array("class" => "btn cus_btn btn-info", "data-dismiss"=>"modal"))
            .''.
        	CHtml::button('Save', array("class" => "btn edtresident cus_btn  btn-primary",  "data-dismiss"=>"modal"))
        ,

        'style' => '
        	width	: 95%;
        ',
    ));
?>

<?php

    $index = Yii::app()->createUrl( "resident/index" );
    $view_resident = Yii::app()->createUrl( "resident/view" );
    $view_resident_edit = Yii::app()->createUrl( "resident/viewResident" );
	$view_new_resident_edit = Yii::app()->createUrl( "resident/viewNewResident" );
    
    
	$success = 'success';
	$error = 'error';
	$csrf = Yii::app()->request->csrfToken;

   Yii::app()->clientScript->registerScript('home_script1', "
   var YII_CSRF_TOKEN = '{$csrf}';
   $(document).ready(function() {
    $('#resident_grid table').attr('id', 'ac_grid'); 

    }); 

    $(function () {
                $('#ac_grid').DataTable({
                    'stateSave': true,
                    'ordering': true,
                    'responsive': true,
                    'iDisplayLength': -1,
                    //'order': [[ 2, 'desc' ]],
                    'aLengthMenu': [
                                [10, 25, 50, 100, 200,300, -1],
                                [10, 25, 50, 100, 200,300, 'All']
                            ],


                        // 'dom': 'Blfrtip',
                        // 'buttons': [
                        //     {
                        //         extend: 'pdf',footer: true,
                        //         //orientation: 'landscape',
                        //         pageSize: 'LEGAL',
                        //         className: 'btn cus_btn btn-primary'
                        //     }
                        // ],

                })
    });

    $(document).on('click', '.newResident', function(){
        viewNewResidentEdit();
    });

    $(document).on('click', '.btn_view_resident', function(){
        var id = $(this).attr('ref');  
      
        viewResident(id);
      });

      $(document).on('click', '.btn_edit_resident', function(){
        var id = $(this).attr('ref');  
      
        viewResidentEdit(id);
      });
      

    function viewResident(id)
    {
        $.ajax({
        type: 'POST',
        url: '{$view_resident}',
        data: {
            'Resident[resident_id]':id,
            'YII_CSRF_TOKEN':YII_CSRF_TOKEN,
        },
        dataType:'json',
        success: function(data){
            var json = data;
            if(json.retVal == '{$success}')
            {
                myAlertSaving(true, 'Wait, loading...', 'myalert-info');
                setTimeout(function() { 
                    myAlertSaving(false);
                    //myAlert('The Project was edited Successfully', 'myalert-' + json.retVal);
                    setTimeout(function() {
                        $('#viewResidentmodal .modal-body').html(json.retMessage);
                        $('#viewResidentmodal .modal-footer').html('<input class=\"btn cus_btn btn-danger\"  data-dismiss=modal  type=button value=Close>');
                        $('#viewResidentmodal').modal('show');
                        
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
        })
    }
    function viewResidentEdit(id)
    {
        $.ajax({
        type: 'POST',
        url: '{$view_resident_edit}',
        data: {
            'Resident[resident_id]':id,
            'YII_CSRF_TOKEN':YII_CSRF_TOKEN,
        },
        dataType:'json',
        success: function(data){
            var json = data;
            if(json.retVal == '{$success}')
            {
                myAlertSaving(true, 'Wait, loading...', 'myalert-info');
           
                setTimeout(function() { 
                    myAlertSaving(false);
                    //myAlert('The Project was edited Successfully', 'myalert-' + json.retVal);
                    setTimeout(function() {
                       $('#viewResidentmodal .modal-body').html(json.retMessage);



                       $('#viewResidentmodal .modal-footer').html('<input class=\"btn cus_btn btn-danger\"  data-dismiss=modal  type=button value=Close> <input class=\"btn edtresident cus_btn  btn-primary\"  data-dismiss=modal  type=button value=Save>');
                        $('#viewResidentmodal').modal();
                        
                        
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
        })
     }
     function viewNewResidentEdit()
     {
         $.ajax({
         type: 'POST',
         url: '{$view_new_resident_edit}',
         data: {
             'YII_CSRF_TOKEN':YII_CSRF_TOKEN,
         },
         dataType:'json',
         success: function(data){
             var json = data;
             if(json.retVal == '{$success}')
             {
                 myAlertSaving(true, 'Wait, loading...', 'myalert-info');
            
                 setTimeout(function() { 
                     myAlertSaving(false);
                     //myAlert('The Project was edited Successfully', 'myalert-' + json.retVal);
                     setTimeout(function() {
                        $('#viewResidentmodal .modal-body').html(json.retMessage);
 
 
 
                        $('#viewResidentmodal .modal-footer').html('<input class=\"btn cus_btn btn-danger\"  data-dismiss=modal  type=button value=Close> <input class=\"btn edtresident cus_btn  btn-primary\"  data-dismiss=modal  type=button value=Save>');
                         $('#viewResidentmodal').modal();
                         
                         
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
         })
      }
     
    

   ");
?>