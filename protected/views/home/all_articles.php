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


                    </div>