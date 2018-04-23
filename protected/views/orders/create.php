<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List All Orders','url'=>array('index')),
	
);
?>

<h1>Create Orders</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>