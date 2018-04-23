<?php
$this->breadcrumbs=array(
	'Settings'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Update Settings','url'=>array('index','id'=>$model->id)),
);
?>

<h1>View Settings</h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(

		//'email',
		'twitter',
		'facebook',
		'linkedin',
		'copy_right',
		'design_develop',
		//'phone',
		//'address',
		array(
		'name'=>'image',
		'type'=>'raw',
		'value'=>CHtml::image(Yii::app()->request->baseUrl.'/media/'.$model->image,$model->id,array('width'=>250)),
		),
		array(
		'name'=>'home_banner',
		'type'=>'raw',
		'value'=>CHtml::image(Yii::app()->request->baseUrl.'/media/'.$model->home_banner,$model->id,array('width'=>250)),
		),
		array(
		'name'=>'about_banner',
		'type'=>'raw',
		'value'=>CHtml::image(Yii::app()->request->baseUrl.'/media/'.$model->about_banner,$model->id,array('width'=>250)),
		),
		array(
		'name'=>'order_banner',
		'type'=>'raw',
		'value'=>CHtml::image(Yii::app()->request->baseUrl.'/media/'.$model->order_banner,$model->id,array('width'=>250)),
		),
		array(
		'name'=>'article_banner',
		'type'=>'raw',
		'value'=>CHtml::image(Yii::app()->request->baseUrl.'/media/'.$model->article_banner,$model->id,array('width'=>250)),
		),
		array(
		'name'=>'post_banner',
		'type'=>'raw',
		'value'=>CHtml::image(Yii::app()->request->baseUrl.'/media/'.$model->post_banner,$model->id,array('width'=>250)),
		),
		//'video',
		/*'website',
		'google',
		'twitter',
		'pinterest',
		'support_email',
		
		'facebook',
		'paypal_email',*/
	),
)); ?>
