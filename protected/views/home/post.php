<?
	$this->pageTitle = 'Article - '.$model->title;
?>
<section id="banner" class="row grey_article" style="background:url(<?=Yii::app()->request->baseUrl?>/media/<?=Yii::app()->params['article_banner']?>)">
    <div class="center">

    </div>
</section>

<section id="middle" class="row1 grey">
    <div class="center">
        <div class="main_bg">
            <div class="columns">
                <div class="middle_text_new2">
                    <div class="middle_section1">

                        <div class="main_repeat">
                        	<?
								if(Yii::app()->user->hasFlash('comment'))
								{
                            ?>
                                    <div class="contact_us" id="done">
                                    	<label class="alert alert-success"><?=Yii::app()->user->getFlash('comment')?></label>
                                    </div>
                            <?
								}
                            ?>
                            <div class="contact_us">
                                <h2><a href="javascript:void(0);" class="article_heading"><?=$model->title?></a></h2>
                            </div>

                            <div class="contact_us">
                                <img src="<?=Yii::app()->request->baseUrl?>/media/<?=$model->image?>">
                            </div>

                            <div class="contact_us">
                                <p><?=$model->desc?></p>
                            </div>

                            <div class="contact_us">
                                <div class="article_text1">
                                	<a href="<?=Yii::app()->params['e_junkie']?>" target="ej_ejc" class="ec_ejc_thkbx order_now" onClick="javascript:return EJEJC_lc(this);">Order Now</a>
                                </div>
                            </div>

                            <div class="comment">
                                <div class="comment1_1">
                                    <h1>Share:</h1>
                                </div>
                                <span class='st_facebook_hcount' displayText='Facebook'></span>
                                <span class='st_twitter_hcount' displayText='Tweet'></span>
                                <span class='st_linkedin_hcount' displayText='LinkedIn'></span>
                            </div>

                            <div class="contact_us">
                                <h2><a href="javascript:void(0)" onclick="comment()" class="article_heading">Leave Comment</a></h2>
                            </div>

                            <div class="contact_us" id="comment_div" style="display:none;">
                                <form method="post" action="<?=Yii::app()->request->baseUrl?>/home/postComment" id="contact_us">
                                	<input type="hidden" name="art_id" value="<?=$model->id?>">
                                    <input type="hidden" name="slug" value="<?=$model->slug?>">
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

                    </div>




                </div>
                <?=$this->renderPartial('right-side-article')?>
            </div>
        </div>
    </div>
</section>

<script>
	function comment()
	{
		$('#comment_div').toggle();
	}
</script>