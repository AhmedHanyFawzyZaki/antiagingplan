<?php
$this->breadcrumbs=array(
	'Gallaries'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Gallary','url'=>array('index')),
	array('label'=>'Create Gallary','url'=>array('create')),
	array('label'=>'View Gallary','url'=>array('view','id'=>$model->id)),
	//array('label'=>'Manage Gallary','url'=>array('index')),
);
?>

<h1>Update Gallary <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>