<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2013
 */

class Helper
 {

	public static function PlayVideo($model)
	{ 
		
				  $player = Yii::app()->controller->widget('ext.Yiitube', array('v' =>$model->video,'size'=>'small'));
		

		return '<div class="VideoPlay">'.$player->play().'</div>';


	}
	
	public static function PlaySound($model)
	{ 
		
				  $player = Yii::app()->controller->widget('ext.Yiitube', array('v' =>$model->sound,'size'=>'small'));
		

		return '<div class="VideoPlay">'.$player->play().'</div>';


	}


	public static function yiiparam($name, $default = null)
		{
			if ( isset(Yii::app()->params[$name]) )
				return Yii::app()->params[$name];
			else
				return $default;
		}



	public static function DrawPageLink($page_id)
	{
		$page= Pages::model()->findByPk($page_id);
		if($page  === null)
		{
			return 'Not-Found';
		}

		return  'home/page/view/'.$page->url;

	}
	public static function slugify($text) {
        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

        // trim
        $text = trim($text, '-');

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // lowercase
        $text = strtolower($text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

 }
?>