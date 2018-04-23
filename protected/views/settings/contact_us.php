<?php
$this->breadcrumbs=array(
	'Update',
);

$this->menu=array(
	array('label'=>'Update Contact Us','url'=>array('contactUs')),
	//array('label'=>'Create Settings','url'=>array('create')),
	//array('label'=>'View Settings','url'=>array('view','id'=>$model->id)),
	//array('label'=>'Manage Settings','url'=>array('admin')),
);
?>

<h1>Update Contact Us </h1>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'pages-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'type'=>'horizontal',
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>
    
    <?
		if(Yii::app()->user->hasFlash('added'))
		{
	?>
			<div class="contact_us" id="done">
				<label class="alert alert-success"><?=Yii::app()->user->getFlash('added')?></label>
			</div>
	<?
		}
	?>

	<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'website',array('class'=>'span5','maxlength'=>255)); ?>
	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>255)); ?>
	<?php //echo $form->textFieldRow($model,'support_email',array('class'=>'span5','maxlength'=>255)); ?>
	<?php //echo $form->textFieldRow($model,'paypal_email',array('class'=>'span5','maxlength'=>255)); ?>
	<?php //echo $form->textFieldRow($model,'facebook',array('class'=>'span5','maxlength'=>255)); ?>
    <?php //echo $form->textFieldRow($model,'linkedin',array('class'=>'span5','maxlength'=>255)); ?>



	<?php //echo $form->textFieldRow($model,'google',array('class'=>'span5','maxlength'=>255)); ?>

	<?php //echo $form->textFieldRow($model,'twitter',array('class'=>'span5','maxlength'=>255)); ?>
    <?php echo $form->textFieldRow($model,'phone',array('class'=>'span5','maxlength'=>255)); ?>
    <?php echo $form->textAreaRow($model,'address',array('class'=>'span5','maxlength'=>255)); ?>
    
    <div class="map_div">
    <div class="control-group" style="margin-top: 15px;">
        <label class="control-label">Location On Map</label>
        <div class="controls">
                        <div id="searchAddress">
                <?php echo CHtml::textField('location', '', array('id' => 'Address', 'class'=>'span5')); ?>
<!--                    <button type='button' class='btn map_search' jsaction="omnibox.search"><i class='icon-search icon-white'></i></button>-->
                </div>
            <?php
            Yii::import('ext.gmap.*');
            $gMap = new EGMap();
            $gMap->setWidth(700);
            $gMap->setHeight(300);
            $gMap->zoom = 2;
            $mapTypeControlOptions = array(
                'position' => EGMapControlPosition::RIGHT_TOP,
                'style' => EGMap::MAPTYPECONTROL_STYLE_HORIZONTAL_BAR
            );

            $gMap->mapTypeId = EGMap::TYPE_ROADMAP;
            $gMap->mapTypeControlOptions = $mapTypeControlOptions;
            $gMap->zoomControl = EGMap::ZOOMCONTROL_STYLE_SMALL;
            $gMap->streetViewControl = false;
            $gMap->minZoom = 2;

            $gMap->htmlOptions = array(
                'class' => 'map'
            );

// Preparing InfoWindow with information about our marker.
            $info_window_a = new EGMapInfoWindow("<div class='gmaps-label' style='color: #000;'>Hi! I'm your marker!</div>");


// Saving coordinates after user dragged our marker.
            $dragevent = new EGMapEvent('dragend', "function (event) { 
			$('#h_lng').val(event.latLng.lng());
			$('#h_lat').val(event.latLng.lat());    
			}", false, EGMapEvent::TYPE_EVENT_DEFAULT);

// If we have already created marker - show it
            $lng = $model->longitude;
            $lat = $model->latitude;
            $zoom = 8;
            if ($model->isNewRecord) {
                $lng = 40.348850;
                $lat = 38.348850;
                $zoom = 0;
            }

            $marker = new EGMapMarker($lat, $lng, array('title' => Yii::app()->name, 'draggable' => true), $gMap->getJsName() . '_marker', array('dragevent' => $dragevent));
            $marker->addHtmlInfoWindow($info_window_a);
            $gMap->addMarker($marker);
            $gMap->setCenter($lat, $lng);
            $gMap->zoom = $zoom;

            //$gMap->addAutocomplete('Address');
        $gMap->additionScript = "
          input_address_temp = document.getElementById('Address');
          search_div = document.getElementById('searchAddress');
          {$gMap->getJsName()}.controls[google.maps.ControlPosition.TOP_LEFT].push(search_div);
          var searchBox = new google.maps.places.SearchBox((input_address_temp));
          var markers = [];
            google.maps.event.addListener(searchBox, 'places_changed', function() {
    var places = searchBox.getPlaces();
var place = places[0];
    if (place.geometry.viewport) {
            ".$gMap->getJsName().".fitBounds(place.geometry.viewport);
          } else {
            ".$gMap->getJsName().".setCenter(place.geometry.location);
            ".$gMap->getJsName().".setZoom(17);  
          }
          ".$gMap->getJsName()."_marker.setPosition(place.geometry.location);
          
          var address = '';
          if (place.address_components) {
            address = [(place.address_components[0] &&
                        place.address_components[0].short_name || ''),
                       (place.address_components[1] &&
                        place.address_components[1].short_name || ''),
                       (place.address_components[2] &&
                        place.address_components[2].short_name || '')
                      ].join(' ');
          }

          ".$gMap->getJsName()."_info_window.setContent('<div><strong>' + place.name + '</strong><br />' + address);
          ".$gMap->getJsName()."_info_window.open(".$gMap->getJsName().", ".$gMap->getJsName()."_marker);
              
        /**edited by Ukpro**/
        $('#h_lng').val(place.geometry.location.lng());
        $('#h_lat').val(place.geometry.location.lat());
        /** end edited by Ukpro **/
        
  });
  

$('.map_search').click(function(){
        $('#Address').trigger('keypress');
        console.log($('#Address'));
        google.maps.event.trigger(autocomplete, 'place_changed');
        return false;
    });

          ";
          
            $gMap->renderMap(array(), Yii::app()->language);
            ?>
        </div>
    </div>
</div>
	<?php echo $form->hiddenField($model, 'longitude', array('id' => 'h_lng')); ?>
	<?php echo $form->hiddenField($model, 'latitude', array('id' => 'h_lat')); ?>

	<?php //echo $form->textFieldRow($model,'pinterest',array('class'=>'span5','maxlength'=>255)); ?>
    
    <?php //echo $form->textFieldRow($model,'video',array('class'=>'span5','maxlength'=>255)); ?>
	<?php /*echo $form->fileFieldRow($model,'image',array('class'=>'span5','maxlength'=>255));

	if($model->isNewRecord != '1' and $model->image!='')
	{
		echo "<p>". Chtml::image(Yii::app()->baseUrl.'/media/'.$model->image ,'image',array('width'=>200)) ."</p>";

	}*/
	 ?>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
