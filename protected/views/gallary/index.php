<?php
$this->breadcrumbs=array(
	'Gallaries'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Gallary','url'=>array('index')),
	array('label'=>'Create Gallary','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('gallary-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Gallaries</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'gallary-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
	//	'id',
		'title'=>array(
			'name'=>'title',
			'type'=>'raw',
		),
		array(
			'name'=>'image',
			'type'=>'html',
			'value'=>'(!empty($data->image))?CHtml::image(Yii::app()->request->baseUrl."/media/".$data->image,"",array("style"=>"width:100px;height:75px;")):"no image"',
			'filter'=>''
		) ,
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
