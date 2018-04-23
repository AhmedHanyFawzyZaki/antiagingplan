<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'contact-form',
	'enableAjaxValidation'=>false,
		'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>255)); ?>
	<?php echo $form->textFieldRow($model,'desc',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->fileFieldRow($model,'image',array('class'=>'span5','maxlength'=>255));
	
	if($model->isNewRecord != '1' and $model->image!='')
	{
		echo "<p>". Chtml::image(Yii::app()->baseUrl.'/media/'.$model->image ,'image',array('width'=>200)) ."</p>";

	}
	 ?>    
    
    

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'address',array('class'=>'span5','maxlength'=>255)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
