<div class="middle_text1">
    <div class="middle_section_right">
        <div class="middle_section_right1"><h1>Top Posts</h1></div>
        <?
			$top_posts=Article::model()->findAll(array('limit'=>20));
			foreach($top_posts as $top_post)
			{
				echo '<div class="middle_section_right2"><a href="'.Yii::app()->request->baseUrl.'/home/post/'.$top_post->slug.'" class="top_post_link">'.$top_post->title.'</a></div>';
			}
        ?>
    
        <div class="middle_section_right1"><h1>Stay Connected</h1></div>
    
        <div class="social_main">
            <div class="fb"><a href="<?=Yii::app()->params['facebook']?>" target="_blank"><img src="<?=Yii::app()->request->baseUrl?>/images/facebook.jpg"></a></div>
            <div class="fb"><a href="<?=Yii::app()->params['linkedin']?>" target="_blank"><img src="<?=Yii::app()->request->baseUrl?>/images/linked.jpg"></a></div>
            <div class="fb"><a href="<?=Yii::app()->params['twitter']?>" target="_blank"><img src="<?=Yii::app()->request->baseUrl?>/images/twitter.jpg"></a></div>
        </div>
    
    </div>
</div>