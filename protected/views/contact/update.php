<?php
$this->breadcrumbs=array(
	'Contacts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	/*array('label'=>'List Contact','url'=>array('index')),
	
	array('label'=>'View Contact','url'=>array('view','id'=>$model->id)),
*/
);
?>

<h1>Update Contact <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>