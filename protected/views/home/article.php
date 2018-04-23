<?
$this->pageTitle = Yii::app()->name . ' - Articles';
?>
<div class="loader" style="display:none;"></div>
<section id="banner" class="row grey_article" style="background:url(<?=Yii::app()->request->baseUrl?>/media/<?=Yii::app()->params['article_banner']?>)">
    <div class="center">

    </div>
</section>

<section id="middle" class="row1 grey">
    <div class="center">
        <div class="main_bg">
            <div class="columns">
                <div class="middle_text_new2">
                    <div class="middle_section1" id="view_all">
						<?
							foreach($articles as $article)
							{
                        ?>
                        		<div class="main_repeat">
                                    <div class="contact_us">
                                        <h2><a href="<?=Yii::app()->request->baseUrl?>/home/post/<?=$article->slug;?>" class="article_heading"><?=$article->title?></a></h2>
                                    </div>
        
                                    <div class="contact_us">
                                        <div class="alignRight imgHolder"><img src="<?= Yii::app()->request->baseUrl ?>/media/<?=$article->image?>"></div>
                                        <p><?=$article->intro;?></p>
                                    </div>
        
                                    <div class="contact_us">
                                        <div class="article_text"><a href="<?=Yii::app()->request->baseUrl?>/home/post/<?=$article->slug?>" class="continue">Continue reading...</a></div>
                                        <div class="article_text1">
                                        	<a href="<?=Yii::app()->params['e_junkie']?>" target="ej_ejc" class="ec_ejc_thkbx order_now" onClick="javascript:return EJEJC_lc(this);">Order Now</a>
                                        </div>
                                    </div>
        
                                    <div class="comment">
                                        <div class="comment1_1">
                                            <img src="<?= Yii::app()->request->baseUrl ?>/images/mail.jpg">
                                        </div>
                                        <div class="comment1">
                                            <h1>Posted by: <?=$article->posted_by?></h1>
                                        </div>
        
                                        <div class="comment_right">
                                            <div class="comment_right1"><img src="<?= Yii::app()->request->baseUrl ?>/images/comment.png"></div>
                                            <div class="comment_right2"><h1><?=ArticleComment::GetCommentsNumber($article->id)?></h1></div>
                                        </div>
                                    </div>
        
                                </div>
                        <?
							}
                        ?>

                        <div class="main_repeat">
                            <div class="order_now1">
                                <a href="javascript:void(0);" onclick="ViewAll();" class="order_btn">Load More Articles</a>
                            </div>
                        </div>


                    </div>

                </div>
                <?= $this->renderPartial('right-side-article'); ?>
            </div>
        </div>
    </div>
</section>
<script>
	function ViewAll()
	{
		$(".loader").fadeIn(1000);
		$(".loader").fadeOut("slow");
		$.ajax({
			url:'<?=Yii::app()->request->baseUrl?>/home/articleAll',
			success: function(data)
			{
				$('#view_all').html(data);
			}
		});
	}
</script>