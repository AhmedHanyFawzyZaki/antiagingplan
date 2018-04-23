<?php
$this->breadcrumbs=array(
	'Subscriber'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Subscribers','url'=>array('index')),
//	array('label'=>'Manage Newsletters','url'=>array('index')),
);
?>

<h1>Create Subscribers</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>