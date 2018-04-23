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
		elseif(Yii::app()->controller->action->id=='article')
		{
			$str='article';
		}
		else
		{
			$str='home';
		}
	}
?>
        </div>
        	<footer id="footer">
            	<div class="center">
                    <div class="columns">
                        <div class="last_footer">
                            <div class="footer_btn">
                                <div class="columns">
                                    <article class="news oneThird">
                                        <div>
                                        	<a href='<?=Yii::app()->request->baseUrl?>/home' class="footer_link1 <?= $str=='home'?'factive':''?>">HOME</a>
                                        </div>
                                    </article>
                                    <article class="news oneThird">
                                        <div>
                                        	<a href='<?=Yii::app()->request->baseUrl?>/home/about' class="footer_link2 <?= $str=='about'?'factive':''?>">ABOUT</a>
                                        </div>
                                    </article>
                                    <article class="news oneThird">
                                        <div>
                                        	<a href='<?=Yii::app()->request->baseUrl?>/home/contact' class="footer_link2 <?= $str=='contact'?'factive':''?>">CONTACT</a>
                                        </div>
                                    </article>
                                    <article class="news oneThird">
                                        <div>
                                        	<a href='<?=Yii::app()->request->baseUrl?>/home/order' class="footer_link2 <?= $str=='order'?'factive':''?>">ORDER</a>
                                        </div>
                                    </article>
                                    <article class="news oneThird">
                                    	<div>
                                        	<a href='<?=Yii::app()->request->baseUrl?>/home/article' class="footer_link2 <?= $str=='article'?'factive':''?>">ARTICLES</a>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        <div class="footer_btn1"><h1><?=Yii::app()->params['copy_right']?></h1></div>
                        </div>
                        <div class="last_footer1">
                        	<div class="last_social"><h1>Stay Connected</h1></div>
                            <div class="scoial_new">
                                <div class="scoial_new1">
                                    <div class="fb"><a href="<?=Yii::app()->params['facebook']?>" target="_blank"><img src="<?=Yii::app()->request->baseUrl?>/images/facebook.jpg"></a></div>
                                    <div class="fb"><a href="<?=Yii::app()->params['linkedin']?>" target="_blank"><img src="<?=Yii::app()->request->baseUrl?>/images/linked.jpg"></a></div>
                                    <div class="fb"><a href="<?=Yii::app()->params['twitter']?>" target="_blank"><img src="<?=Yii::app()->request->baseUrl?>/images/twitter.jpg"></a></div>
                                </div>
                            </div>
                        <div class="scoial_new1_1"><h1><?=Yii::app()->params['design_develop']?></h1></div>
                        </div>
                    </div>
            	</div>
        	</footer>
        </div>
	</body>
</html>
