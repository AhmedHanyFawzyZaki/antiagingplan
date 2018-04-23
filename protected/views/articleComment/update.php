<?php
$this->breadcrumbs=array(
	'Article Comments'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ArticleComment','url'=>array('index')),
	//array('label'=>'Create ArticleComment','url'=>array('create')),
	array('label'=>'View ArticleComment','url'=>array('view','id'=>$model->id)),
	//array('label'=>'Manage ArticleComment','url'=>array('admin')),
);
?>

<h1>Update ArticleComment <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>