<?php
$this->pageTitle = Yii::app()->name . ' - Order';
?>
<section id="banner" class="row grey_order" style="background:url(<?=Yii::app()->request->baseUrl?>/media/<?=Yii::app()->params['order_banner']?>)">
    <div class="center">

    </div>
</section>

<section id="middle" class="row1 grey">
    <div class="center">
        <div class="main_bg">
            <div class="columns">
                <div class="middle_text_new">
                    <div class="middle_section1">
                        <div class="order_now1">
                            &nbsp;
                        </div>

                        <div class="pay_pal">
                            <div class="pay_pal_1"><img src="<?= Yii::app()->request->baseUrl ?>/images/visa.jpg"></div>
                            <div class="pay_pal_1"><img src="<?= Yii::app()->request->baseUrl ?>/images/master.jpg"></div>
                            <div class="pay_pal_1"><img src="<?= Yii::app()->request->baseUrl ?>/images/american.jpg"></div>
                            <div class="pay_pal_1"><img src="<?= Yii::app()->request->baseUrl ?>/images/discover.jpg"></div>
                            <div class="pay_pal_2"><span href="#" class="pay_link" style="font-size:16px;">Click the order now button if you would prefer to<br> Pay in Full Today</span></div>
                        </div>
                        <div style="margin-top:155px;text-align:center;">
                            <a href="<?=Yii::app()->params['e_junkie']?>" target="ej_ejc" class="ec_ejc_thkbx order_now" onClick="javascript:return EJEJC_lc(this);">Order Now</a>
                        </div>

                    </div>
                </div>
                <?= $this->renderPartial('right-side-order') ?>
            </div>
        </div>
    </div>
</section>