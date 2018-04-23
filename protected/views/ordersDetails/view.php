<?php
$this->breadcrumbs=array(
	'Orders Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List All OrdersDetails','url'=>array('index')),
	array('label'=>'Create OrdersDetails','url'=>array('create')),
	array('label'=>'Update OrdersDetails','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete OrdersDetails','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View OrdersDetails <?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'orders_id',
		'qty',
		'pro_id',
		'price',
		'first_name',
		'last_name',
		'email',
		'address',
		'start_date',
	),
)); ?>
