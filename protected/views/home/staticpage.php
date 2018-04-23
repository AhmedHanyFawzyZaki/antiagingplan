<?php

$this->pageTitle=Yii::app()->name.' - about us';
?>
<section id="banner" class="row grey2" style="background:url(<?=Yii::app()->request->baseUrl?>/media/<?=Yii::app()->params['about_banner']?>)">
    <div class="center">
    
    </div>
</section>

<section id="middle" class="row1 grey">
    <div class="center">
        <div class="columns">
            <div class="middle_text">
                <div class="middle_section">
                    <div class="about_us">
                    	<div class="alignLeft imgHolder1"><img src="<?=Yii::app()->request->baseUrl?>/media/<?=$page->image?>"></div>
                        <p><?=$page->details;?> </p>
                    </div>
                
                    <div class="middle_section1">
                        <div class="main_link1_1_order">
                        	<a href="<?=Yii::app()->params['e_junkie']?>" target="ej_ejc" class="ec_ejc_thkbx order_now" onClick="javascript:return EJEJC_lc(this);">Order Now</a>
                        </div>
                    
                        <div class="last">
                            <? foreach($gallery as $gl){?>
                            <div class="columns">
                                <div class="alignLeft imgHolder"><img src="<?=Yii::app()->request->baseUrl?>/media/<?=$gl->image?>"></div>
                                <span class="for_blue"><?=$gl->title?></span> 
                            </div>
                            <? }?>
                        </div>
                    </div>
                </div>
            </div>
            <?=$this->renderPartial('right-side-about');?>
        </div>
    </div>
</section>