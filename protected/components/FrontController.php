<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class FrontController extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/main';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();



	public function init()
	{
	  $parameters =Settings::model()->findByPk(1);


	 	Yii::app()->params['google'] =$parameters['google'];
		Yii::app()->params['twitter'] =$parameters['twitter'];
		Yii::app()->params['pinterest'] =$parameters['pinterest'];
		Yii::app()->params['linkedin'] =$parameters['linkedin'];
		Yii::app()->params['logo'] =$parameters['image'];
		Yii::app()->params['lat'] =$parameters['latitude'];
		Yii::app()->params['long'] =$parameters['longitude'];
		Yii::app()->params['support_email'] =$parameters['support_email'];
		Yii::app()->params['email'] =$parameters['email'];
		Yii::app()->params['facebook'] =$parameters['facebook'];
		Yii::app()->params['paypal_email'] =$parameters['paypal_email'];
		Yii::app()->params['adminEmail'] =$parameters['email'];
		Yii::app()->params['address'] =$parameters['address'];
		Yii::app()->params['phone'] =$parameters['phone'];
		Yii::app()->params['home_banner'] =$parameters['home_banner'];
		Yii::app()->params['about_banner'] =$parameters['about_banner'];
		Yii::app()->params['order_banner'] =$parameters['order_banner'];
		Yii::app()->params['post_banner'] =$parameters['post_banner'];
		Yii::app()->params['article_banner'] =$parameters['article_banner'];
		Yii::app()->params['copy_right'] =$parameters['copy_right'];
		Yii::app()->params['design_develop'] =$parameters['design_develop'];
		Yii::app()->params['e_junkie'] =$parameters['e_junkie'];

	}



	public function actions()
	{
		return array(
		    'captcha'=>array(
		        'class'=>'CCaptchaAction',
		        'backColor'=>0xFFFFFF,
		    ),
		    'page'=>array(
		        'class'=>'CViewAction',
		    ),
		    'yiichat'=>array('class'=>'YiiChatAction'), // <- ADD THIS LINE
		);
	}





}