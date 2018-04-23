<?php
$this->breadcrumbs=array(
	'Article Comments'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List ArticleComment','url'=>array('index')),
	//array('label'=>'Create ArticleComment','url'=>array('create')),
	array('label'=>'Update ArticleComment','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete ArticleComment','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage ArticleComment','url'=>array('admin')),
);
?>

<h1>View ArticleComment #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'title',
		'email',
		'phone',
		'subject',
		//'article_id',
	),
)); ?>
