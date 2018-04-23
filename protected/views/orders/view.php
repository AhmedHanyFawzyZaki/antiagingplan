<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List All Orders','url'=>array('index')),
	
	array('label'=>'Update Orders','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Orders','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>View Orders #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'price',
		'first_name',
		'last_name',
		'email',
		'address',
		'status',
		'order_date',
	    ),
	));
 ?>
