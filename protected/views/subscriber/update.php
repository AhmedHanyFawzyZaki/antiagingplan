<?php
$this->breadcrumbs=array(
	'Subscribers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Subscribers','url'=>array('index')),
	array('label'=>'Create Subscribers','url'=>array('create')),
	array('label'=>'View Subscribers','url'=>array('view','id'=>$model->id)),
//	array('label'=>'Manage Subscribers','url'=>array('index')),
);
?>

<h1>Update Subscribers <?php echo $model->email; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>