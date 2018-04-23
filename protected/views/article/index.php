<?php
$this->breadcrumbs=array(
	'Articles'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Article','url'=>array('index')),
	array('label'=>'Create Article','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('article-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Articles</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'article-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'title',
		'posted_by',
		//'desc',
		array(
			'name'=>'image',
			'type'=>'html',
			'value'=>'(!empty($data->image))?CHtml::image(Yii::app()->request->baseUrl."/media/".$data->image,"",array("style"=>"width:100px;height:75px;")):"no image"',
			'filter'=>''
		) ,
		array(
				'class'=>'CLinkColumn',
				'label'=>'Manage Comments',
				'urlExpression'=>'Yii::app()->request->baseUrl."/articleComment/index?id=".$data->id',
				'header'=>'Article Comments'
			  ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
