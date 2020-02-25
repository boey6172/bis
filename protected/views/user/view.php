
<div class="page-header">
	<h3><span class="fa fa-user"></span>&nbsp;<b> <?php echo Yii::app()->user->getFirst_Name(); ?>"Account details"</b></h3>
	<hr>
</div>
<div class=" box box-info">

			<div class="box-header with-border">
              <h3 class="box-title"><span class="fa fa-list"></span> Project Details</h3>
    			<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                	</button>
           		</div>
           		<?php $this->widget('zii.widgets.CDetailView', array(
					'data'=>$vm->user,
					'attributes'=>array(
						'username',
				        'email',
				        'password',
				        'first_name',
				        'surname',
				        
					),
				)); ?>
			</div>
</div>
