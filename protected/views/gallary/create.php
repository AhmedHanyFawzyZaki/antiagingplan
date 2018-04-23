<?php
$this->breadcrumbs=array(
	'Gallaries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Gallary','url'=>array('index')),
	//array('label'=>'Manage Gallary','url'=>array('index')),
);
?>

<h1>Create Gallary</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>