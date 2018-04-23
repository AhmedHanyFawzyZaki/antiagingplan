<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'orders-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'price',array('class'=>'span5','maxlength'=>255,'readonly'=>true)); ?>

	<?php echo $form->textFieldRow($model,'first_name',array('class'=>'span5','maxlength'=>255,'readonly'=>true)); ?>

	<?php echo $form->textFieldRow($model,'last_name',array('class'=>'span5','maxlength'=>255,'readonly'=>true)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>255,'readonly'=>true)); ?>

	<?php echo $form->textFieldRow($model,'address',array('class'=>'span5','maxlength'=>255,'readonly'=>true)); ?>

    <?php echo $form->dropDownListRow($model,'status', CHtml::listData(OrderStatus::model()->findAll(array('order'=>'id DESC')),'id','title'), array('empty'=>'Select Status')); ?>
   
  
    <div>
    <?php 
	$this->widget('zii.widgets.jui.CJuiDatePicker',array(
	    'model'=>$model,   
		'attribute'=>'order_date',
	    'value'=>date('d-m-Y'),
	    'options'=>array(       
	        'showButtonPanel'=>true,
	        'minDate'=>-5,
	        'maxDate'=>"+1M +5D",
	    ),
	    'htmlOptions'=>array(
	        'style'=>''
	    ),
	));
	?>
    </div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
			
		)); ?>
	</div>

<?php $this->endWidget(); ?>
