<?php
/* @var $this GenderController */
/* @var $model Gender */

$this->breadcrumbs=array(
	'Genders'=>array('index'),
	$model->gender_id,
);

$this->menu=array(
	array('label'=>'List Gender', 'url'=>array('index')),
	array('label'=>'Create Gender', 'url'=>array('create')),
	array('label'=>'Update Gender', 'url'=>array('update', 'id'=>$model->gender_id)),
	array('label'=>'Delete Gender', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->gender_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Gender', 'url'=>array('admin')),
);
?>

<h1>View Gender #<?php echo $model->gender_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'gender_id',
		'description',
	),
)); ?>
