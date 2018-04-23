<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'gallary-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'type'=>'horizontal',
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<label for="details" style="display: inline; margin-left: 75px;">Header</label>
	<?php //echo $form->textAreaRow($model,'details',array('rows'=>6, 'cols'=>50, 'class'=>'span8'));
	 $this->widget('application.extensions.eckeditor.ECKEditor', array(
                'model'=>$model,
                'attribute'=>'title',
                ));

	?>

	<?php echo $form->fileFieldRow($model,'image',array('class'=>'span5','maxlength'=>255));

	if($model->isNewRecord != '1' and $model->image!='')
	{
		echo "<p>". Chtml::image(Yii::app()->baseUrl.'/media/'.$model->image ,'image',array('width'=>200)) ."</p>";

	}
	 ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
