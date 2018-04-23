<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<section id="banner" class="row grey1" style="background:url(<?=Yii::app()->request->baseUrl?>/media/<?=Yii::app()->params['home_banner']?>)">
    <div class="center">
    
    </div>
</section>
<section id="middle" class="row1 grey">
    <div class="center">
        <div class="columns">
            <div class="middle_text">
                <div class="middle_section">
                	<div class="middle_section1">
                        <span class='st_linkedin_hcount' displayText='LinkedIn'></span>
                        <span class='st_pinterest_hcount' displayText='Pinterest'></span>
                        <span class='st_twitter_hcount' displayText='Tweet'></span>
                        <span class='st_googleplus_hcount' displayText='Google +'></span>
                        <span class='st_facebook_hcount' displayText='Facebook'></span>
                        <span class='st_fblike_hcount' displayText='Facebook Like'></span>
                    </div>
                    <div class="main_link_new">
                    	<h1><span class="blue">The Anti Aging plan</span> offer solutions to</h1>
                    </div>
                    <div class="middle_section1">
                        <div class="columns">
                            <article class="news oneThird1">
                                <div>
                                    <div class="part">
                                    	<div class="part1"><img src="<?=Yii::app()->request->baseUrl?>/images/hair_loss.jpg" class="img_round"></div>
                                    	<div class="part1"><h1>hair loss</h1></div>
                                    </div>
                                </div>
                            </article>
                        
                            <article class="news oneThird1">
                                <div>
                                    <div class="part">
                                    	<div class="part1"><img src="<?=Yii::app()->request->baseUrl?>/images/wait_loss.jpg" class="img_round"></div>
                                    	<div class="part1"><h1>weight loss</h1></div>
                                    </div>
                                </div>
                            </article>
                        
                        <article class="news oneThird1">
                            <div>
                                <div class="part">
                                    <div class="part1"><img src="<?=Yii::app()->request->baseUrl?>/images/wrinkles.jpg" class="img_round"></div>
                                    <div class="part1"><h1>wrinkles</h1></div>
                                </div>
                            </div>
                        </article>
                        
                        </div>
                    
                        <div class="columns">
                            <article class="news oneThird1">
                                <div>
                                    <div class="part">
                                        <div class="part1"><img src="<?=Yii::app()->request->baseUrl?>/images/eye.jpg" class="img_round"></div>
                                        <div class="part1"><h1>dark eye circles</h1></div>
                                    </div>
                                </div>
                            </article>
                        
                        <article class="news oneThird1">
                            <div>
                                <div class="part">
                                    <div class="part1"><img src="<?=Yii::app()->request->baseUrl?>/images/muscle.jpg" class="img_round"></div>
                                    <div class="part1"><h1>build muscle</h1></div>
                                </div>
                            </div>
                        </article>
                        
                        <article class="news oneThird1">
                            <div>
                                <div class="part">
                                    <div class="part1"><img src="<?=Yii::app()->request->baseUrl?>/images/poor_sex.jpg" class="img_round"></div>
                                    <div class="part1"><h1>poor sex</h1></div>
                                </div>
                            </div>
                        </article>
                        
                        </div>
                    
                        <div class="main_link">
                        	<h1><?=Pages::model()->findByPk('1')->intro;?></h1>
                        </div>
                    
                        <div class="main_link1">
                        	<h2><?=Pages::model()->findByPk('1')->details;?></h2> 
                        </div>
                    
                        <div class="main_link1_1">
                            <div class="main_link1_2">
                            <a href="<?=Yii::app()->params['e_junkie']?>" target="ej_ejc" class="ec_ejc_thkbx order_now" onClick="javascript:return EJEJC_lc(this);">Order Now</a>
                            </div>
                        </div>
                    
                        <div class="last">
                        	<? foreach($gallery as $gl){?>
                            <div class="columns">
                            	<div class="alignLeft imgHolder"><img src="<?=Yii::app()->request->baseUrl?>/media/<?=$gl->image;?>"></div>
                            	<span class="for_blue"><?=$gl->title;?></span> 
                            </div>
                            <? }?>
                        
                        </div>
                    </div>
                </div>
            </div>
            <?=$this->renderPartial('right-side-index');?>
        </div>
    </div>
</section>