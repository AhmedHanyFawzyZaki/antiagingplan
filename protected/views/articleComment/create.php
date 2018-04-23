<?php
$this->breadcrumbs=array(
	'Article Comments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ArticleComment','url'=>array('index')),
	//array('label'=>'Manage ArticleComment','url'=>array('admin')),
);
?>

<h1>Create ArticleComment</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>