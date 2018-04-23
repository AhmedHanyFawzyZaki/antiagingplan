<?php
$this->breadcrumbs=array(
	'Contacts'=>array('index'),
	$model->id,
);

$this->menu=array(
/*	array('label'=>'List All Contact','url'=>array('index')),

	array('label'=>'Update Contact','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Contact','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
*/
);
?>

<h1>View Contact <?php //echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
	     'title',
		'desc',
		array(
		'name'=>'image',
		'type'=>'raw',
		'value'=>CHtml::image(Yii::app()->request->baseUrl.'/media/'.$model->image,$model->image,array('width'=>250)),
		),

		'email',
		'address',
	),
)); ?>
