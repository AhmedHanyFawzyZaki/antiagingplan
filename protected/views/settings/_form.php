<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'pages-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'type'=>'horizontal',
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'website',array('class'=>'span5','maxlength'=>255)); ?>
	<?php //echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>255)); ?>
	<?php //echo $form->textFieldRow($model,'support_email',array('class'=>'span5','maxlength'=>255)); ?>
	<?php //echo $form->textFieldRow($model,'paypal_email',array('class'=>'span5','maxlength'=>255)); ?>
	<?php echo $form->textFieldRow($model,'facebook',array('class'=>'span5','maxlength'=>255)); ?>
    <?php echo $form->textFieldRow($model,'linkedin',array('class'=>'span5','maxlength'=>255)); ?>



	<?php //echo $form->textFieldRow($model,'google',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'twitter',array('class'=>'span5','maxlength'=>255)); ?>
    <?php echo $form->textAreaRow($model,'copy_right',array('class'=>'span5','maxlength'=>255)); ?>
    <?php echo $form->textAreaRow($model,'design_develop',array('class'=>'span5','maxlength'=>255)); ?>
    <?php echo $form->textAreaRow($model,'e_junkie',array('class'=>'span5','maxlength'=>255)); ?>
    <?php //echo $form->textFieldRow($model,'phone',array('class'=>'span5','maxlength'=>255)); ?>
    <?php //echo $form->textAreaRow($model,'address',array('class'=>'span5','maxlength'=>255)); ?>

	<?php //echo $form->textFieldRow($model,'pinterest',array('class'=>'span5','maxlength'=>255)); ?>
    
    <?php //echo $form->textFieldRow($model,'video',array('class'=>'span5','maxlength'=>255)); ?>
	<?php echo $form->fileFieldRow($model,'image',array('class'=>'span5','maxlength'=>255));

	if($model->isNewRecord != '1' and $model->image!='')
	{
		echo "<p>". Chtml::image(Yii::app()->baseUrl.'/media/'.$model->image ,'image',array('width'=>200)) ."</p>";

	}
	 ?>
     <?php echo $form->fileFieldRow($model,'home_banner',array('class'=>'span5','maxlength'=>255));

	if($model->isNewRecord != '1' and $model->home_banner!='')
	{
		echo "<p>". Chtml::image(Yii::app()->baseUrl.'/media/'.$model->home_banner ,'home page banner',array('width'=>200)) ."</p>";

	}
	 ?>
     <?php echo $form->fileFieldRow($model,'about_banner',array('class'=>'span5','maxlength'=>255));

	if($model->isNewRecord != '1' and $model->about_banner!='')
	{
		echo "<p>". Chtml::image(Yii::app()->baseUrl.'/media/'.$model->about_banner ,'about page banner',array('width'=>200)) ."</p>";

	}
	 ?>
     <?php echo $form->fileFieldRow($model,'order_banner',array('class'=>'span5','maxlength'=>255));

	if($model->isNewRecord != '1' and $model->order_banner!='')
	{
		echo "<p>". Chtml::image(Yii::app()->baseUrl.'/media/'.$model->order_banner ,'order page banner',array('width'=>200)) ."</p>";

	}
	 ?>
     <?php echo $form->fileFieldRow($model,'article_banner',array('class'=>'span5','maxlength'=>255));

	if($model->isNewRecord != '1' and $model->article_banner!='')
	{
		echo "<p>". Chtml::image(Yii::app()->baseUrl.'/media/'.$model->article_banner ,'article page banner',array('width'=>200)) ."</p>";

	}
	 ?>
     <?php echo $form->fileFieldRow($model,'post_banner',array('class'=>'span5','maxlength'=>255));

	if($model->isNewRecord != '1' and $model->post_banner!='')
	{
		echo "<p>". Chtml::image(Yii::app()->baseUrl.'/media/'.$model->post_banner ,'post page banner',array('width'=>200)) ."</p>";

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