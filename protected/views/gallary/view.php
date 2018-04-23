<?php
$this->breadcrumbs=array(
	'Gallaries'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Gallary','url'=>array('index')),
	array('label'=>'Create Gallary','url'=>array('create')),
	array('label'=>'Update Gallary','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Gallary','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Gallary','url'=>array('index')),
);
?>

<h1>View Gallary <?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'title'=>array(
			'name'=>'title',
			'type'=>'raw',
		),
		array(
		'name'=>'image',
		'type'=>'raw',
		'value'=>CHtml::image(Yii::app()->request->baseUrl.'/media/'.$model->image,$model->title,array('width'=>250)),
		),
	),
)); ?>
