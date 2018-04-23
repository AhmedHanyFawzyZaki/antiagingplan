<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
 
	<title><?php echo CHtml::encode($this->pageTitle); ?> </title>
   
   
   <?php Yii::app()->bootstrap->register(); ?>
   
   
    <!-- Le fav and touch icons -->
	<!--<link rel="shortcut icon" href="img/favicon.png"/>-->
    <!-- Le styles -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" rel="stylesheet"/>
    <!-- custom styles -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome-ie7.min.css" rel="stylesheet"/>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "ebf579d1-ed95-47e9-8c16-2fa5d7ef21aa", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Simple markers</title>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" type="text/css" media="all">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/new.css" type="text/css" media="all">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    
    <!--for_menu-->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/responsivemobilemenu.css" type="text/css"/>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/responsivemobilemenu.js"></script>
    <script>
		function subscribe()
		{
			var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			var email=$('#id_subscribe').val();
			if(re.test(email))
			{
				$.ajax({
					url:'<?=Yii::app()->request->baseUrl?>/home/subscribe?email='+email,
					type:'GET',
					success: function(data)
					{
						if(data=='1')
						{
							alert("Thank You For Subscribing With Us!");
							$('#id_subscribe').val('');
						}
						else
						{
							alert("This E-Mail Address Is Already Subscribed With Us!");
						}
					}
				});
			}
			else
			{
				alert("Wrong E-Mail! Please Enter A Valid E-Mail Address");
			}
		}
	</script>
    <!--for_menu-->

  </head>
  <body data-spy="scroll" data-target=".bs-docs-sidebar">
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////end row -->
    <div id="pagewidth">
        <header id="header">
            <div class="center">
                <div class="columns">
                    <div class="logo">
                        <div class="logo_main">
                        	<a href="<?=Yii::app()->request->baseUrl?>"><img src="<?=Yii::app()->request->baseUrl?>/media/<?=Yii::app()->params['logo']?>" style="width:162px;height:32px;"></a>
                        </div>
                    </div>
                    <div class="subscribe">
                        <div class="right_subs">
                            <div class="right_subs1_search">
                            	<input type="text" name="subscribe" placeholder="Your-email" id="id_subscribe">
                            </div>
                            <div class="right_subs1">
                            	<a href="javascript:void(0);" onClick="subscribe();" class="subscribe_btn">Subscribe</a>
                            </div>
                        	<div class="right_subs1_social"><a href="<?=Yii::app()->params['facebook']?>" target="_blank"><img src="<?=Yii::app()->request->baseUrl?>/images/facebook.png"></a></div>
                        	<div class="right_subs1_social"><a href="<?=Yii::app()->params['twitter']?>" target="_blank"><img src="<?=Yii::app()->request->baseUrl?>/images/twitter.png"></a></div>
                        	<div class="right_subs1_social"><a href="<?=Yii::app()->params['linkedin']?>" target="_blank"><img src="<?=Yii::app()->request->baseUrl?>/images/linkedin.png"></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    
    <div id="content">
    <?
		if(Yii::app()->controller->id=='home')
		{
			if(Yii::app()->controller->action->id=='about')
			{
				$str='about';
			}
			elseif(Yii::app()->controller->action->id=='contact')
			{
				$str='contact';
			}
			elseif(Yii::app()->controller->action->id=='order')
			{
				$str='order';
			}
			elseif(Yii::app()->controller->action->id=='article' || Yii::app()->controller->action->id=='post')
			{
				$str='article';
			}
			else
			{
				$str='home';
			}
		}
    ?>
    
    <section id="menu" class="row1_1 grey3">
        <div class="center">
            <div class="top_menu">
                <div class="rmm">
                    <ul>
                        <li><a href='<?=Yii::app()->request->baseUrl?>/home' class="<?= $str=='home'?'active':''?>">Home</a></li>
                        <li><a href='<?=Yii::app()->request->baseUrl?>/home/about' class="<?= $str=='about'?'active':''?>">About</a></li>
                        <li><a href='<?=Yii::app()->request->baseUrl?>/home/article' class="<?= $str=='article'?'active':''?>">ARTICLES</a></li>
                        <li><a href='<?=Yii::app()->request->baseUrl?>/home/order' class="<?= $str=='order'?'active':''?>">ORDER</a></li>
                        <li><a href='<?=Yii::app()->request->baseUrl?>/home/contact' class="<?= $str=='contact'?'active':''?>">CONTACT</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    