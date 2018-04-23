<?php
$this->pageTitle = Yii::app()->name . ' - Contact Us';
?>

<section id="banner" class="row" style="height:310px;">
<div id="map-canvas" style="height:100%;"></div>
    <script>
		function initialize() {
		  var myLatlng = new google.maps.LatLng(<?=Yii::app()->params['lat']?>,<?=Yii::app()->params['long']?>);
		  var mapOptions = {
			zoom: 14,
			center: myLatlng
		  }
		  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
		
		  var marker = new google.maps.Marker({
			  position: myLatlng,
			  map: map,
			  title: ''
		  });
		}
		
		google.maps.event.addDomListener(window, 'load', initialize);

    </script>
    <!--<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d448182.5073807705!2d77.0932634!3d28.646965499999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1396869444634" width="100%" height="300" frameborder="0" style="border:0"></iframe>-->
</section>

<section id="middle" class="row1 grey">
    <div class="center">
        <div class="main_bg">
            <div class="columns">
                <div class="middle_text_new2">
                    <div class="middle_section1">
                        <form method="post" action="<?=Yii::app()->request->baseUrl?>/home/send" id="contact_us">
                        	<?
								if(Yii::app()->user->hasFlash('contact'))
								{
                            ?>
                                    <div class="contact_us" id="done">
                                    	<label class="alert alert-success"><?=Yii::app()->user->getFlash('contact')?></label>
                                    </div>
                            <?
								}
                            ?>
                            <div class="contact_us">
                                <h1>Name</h1>
                            </div>
                            <div class="contact_us">
                                <input type="text" name="name" class="input_new" id="name" required autocomplete="off">
                            </div>

                            <div class="contact_us">
                                <h1>E-mail</h1>
                            </div>
                            <div class="contact_us">
                                <input type="email" name="email" class="input_new" id="email" required autocomplete="off">
                            </div>

                            <div class="contact_us">
                                <h1>Phone</h1>
                            </div>
                            <div class="contact_us">
                                <input type="text" name="phone" class="input_new" id="phone" required autocomplete="off">
                            </div>

                            <div class="contact_us">
                                <h1>Subject</h1>
                            </div>
                            <div class="contact_us">
                                <textarea name="message" class="input_new1" id="message" required autocomplete="off"></textarea>
                            </div>

                            <div class="contact_us">
                                <button type="submit" name="button" class="submit" id="button" value="Submit">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="middle_text_new3">
                    <div class="middle_section_right1_bg_kk">
                        <div class="get">
                            <h1>Get in Touch</h1>
                        </div>

                        <div class="get">
                            <div class="get_img">
                                <img src="<?= Yii::app()->request->baseUrl ?>/images/map.png">
                            </div>
                            <div class="get_img1">
                                <h1><?=Yii::app()->params['address']?></h1>
                            </div>
                        </div>

                        <div class="get">
                            <div class="get_img">
                                <img src="<?= Yii::app()->request->baseUrl ?>/images/mail.png">
                            </div>
                            <div class="get_img1">
                                <h1><a href="mailto:<?=Yii::app()->params['email']?>" class="mail"><?=Yii::app()->params['email']?></a></h1>
                            </div>
                        </div>

                        <div class="get">
                            <div class="get_img">
                                <img src="<?= Yii::app()->request->baseUrl ?>/images/phone.png">
                            </div>
                            <div class="get_img1">
                                <h1><?=Yii::app()->params['phone']?></h1>
                            </div>
                        </div>

                        <!--<div class="get">
                            <h2>This book was written because we live in a vain society and people value looking their best. Work, school and social life are all connected to how we feel about ourselves.</h2> 
                        </div>-->

                    </div>


                </div>
            </div>
        </div>
    </div>
</section>