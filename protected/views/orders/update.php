<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List All Orders','url'=>array('index')),

	array('label'=>'View Orders','url'=>array('view','id'=>$model->id)),

);
?>

<h1>Update Orders <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>