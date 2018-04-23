<?php
$this->breadcrumbs=array(
	'Newsletters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Subscribers','url'=>array('index')),
	array('label'=>'Create Subscribers','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('Subscribers-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Subscribers</h1>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'Subscribers-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'email',
		//'name',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
