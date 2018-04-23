<?php

class HomeController extends FrontController
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewActionM',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		//loadPage();
		$homegallery= Gallary::model()->findAll();
		$this->render('index',array('gallery'=>$homegallery));

	}
	public function actionPost()
	{
		//loadPage();
		$slug=$_REQUEST['slug'];
		$model=Article::model()->find(array('condition'=>'slug="'.$slug.'"'));
		$this->render('post',array('model'=>$model));

	}
	public function actionPostComment()
	{
		$model=new ArticleComment;
		$model->article_id=$_POST['art_id'];
		$model->title=$_POST['name'];
		$model->email=$_POST['email'];
		$model->phone=$_POST['phone'];
		$model->subject=$_POST['message'];
		if ($model->save(false)) {
			Yii::app()->user->setFlash('comment','Thank you! Your comment has been added successfuly.');
			$this->redirect(Yii::app()->request->baseUrl.'/home/post/'.$_POST['slug']);
		} 
	}
	public function actionAbout()
	{
		//loadPage();
		$homegallery= Gallary::model()->findAll();
		$page=Pages::model()->findByPk('2');
		$this->render('staticpage',array('page'=>$page,'gallery'=>$homegallery));

	}
	public function actionsubscribe()
	{
		$email=$_GET['email'];
		$arr=Subscriber::model()->findAll(array('condition'=>'email like "%'.$email.'%"'));
		if(count($arr)>=1)
		{
			echo '0';
		}
		else
		{
			$model=new Subscriber;
			$model->email=$email;
			if($model->save(false))
			{
				echo '1';
			}
		}
	}
	public function actionOrder()
	{
		//loadPage();
		$this->render('order');

	}
	public function actionArticle()
	{
		//loadPage();
		$criteria=new CDbCriteria;
		$criteria->order='id desc';
		$criteria->limit=4;
		$articles=Article::model()->findAll($criteria);
		$this->render('article',array('articles'=>$articles));

	}
	public function actionArticleAll()
	{
		$criteria=new CDbCriteria;
		$criteria->order='id desc';
		$articles=Article::model()->findAll($criteria);
		$this->renderPartial('all_articles',array('articles'=>$articles));
	}
	//////// insert into shopping cart
	public function actionCart($id , $action='')
	{
		//echo $id;die();
		$Musicstore=Musicstore::model()->findByPk($id);

		if($action=='')
		{
			Yii::app()->shoppingCart->put($Musicstore); //1 item with id=1, quantity=1.
			$action=1;
		}
		elseif($action=='remove'){
			Yii::app()->shoppingCart->remove($Musicstore->getId()); //no items
			$action=2;
		}
		elseif($action=='clear'){
			Yii::app()->shoppingCart->clear(); //no items
		}

		$this->redirect(array('shoppingCart','action'=>$action));
	}
	public function actionupdateCart()
	{

		$id=$_POST['id'];
		$quant=$_POST['quantity'];
		/*echo '*******************'.$id.'<br/>'.'--------------'.$quant; exit();*/
		$Musicstore=Musicstore::model()->findByPk($id);
		Yii::app()->shoppingCart->update($Musicstore,$quant);
		echo Yii::app()->shoppingCart->getCost();
		/*echo '<script>alert("aaaa")</script>';*/
	}

	public function actionshoppingCart($action='' )
	{
		$cart =   Yii::app()->shoppingCart->getPositions();

		$this->render('shoppingCart',array('cart'=>$cart , 'action'=>$action));
	}



	public function actionFaq()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$model= Faq::model()->findAll();
		$this->render('faq',array('faqs'=>$model ,));
	}



	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$this->render('contact');
	}


	

/*----  load dynamic pages -------*/
	public function loadPage($id)
	{
		$model=Pages::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}




	public function actionSend()
	{
		$mail = new YiiMailer();
		//$mail->clearLayout();//if layout is already set in config
		$mail->setFrom($_POST['email'],$_POST['name']);
		//$mail->setTo(Yii::app()->params['adminEmail']);

		$mail->setTo(Yii::app()->params['adminEmail']);
		$mail->setSubject('Contact Me "Phone no.: ('.$_POST['phone'].')"');
		$mail->setBody($_POST['message']);

		if ($mail->send()) {
			Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
			$this->redirect(Yii::app()->request->baseUrl.'/home/contact#done');
		} else {
			Yii::app()->user->setFlash('error','Error while sending email: '.$mail->getError());
		}







		//send attachements
		/*
		   $mail->setAttachment('something.pdf');
		   $mail->setAttachment(array('something.pdf','something_else.pdf','another.doc'));
		   $mail->setAttachment(array('something.pdf'=>'Some file','something_else.pdf'=>'Another file'));

		*/

	}

	///////// paypal actions


	public function actionConfirm()
	{
		$token = trim($_GET['token']);
		$payerId = trim($_GET['PayerID']);
		$criteria = new CDbCriteria;
		$criteria->condition='token=:Tokenw';
		$criteria->params=array(':Tokenw'=>$token);
		$orders= Orders::model()->find($criteria);
		$result = Yii::app()->Paypal->GetExpressCheckoutDetails($token);
		$result['PAYERID'] = $payerId;
		$result['TOKEN'] = $token;
		$result['ORDERTOTAL'] =  $orders->price ;
		if(!Yii::app()->Paypal->isCallSucceeded($result)){
			if(Yii::app()->Paypal->apiLive === true){
				//Live mode basic error message
				$error = 'We were unable to process your request. Please try again later';
			}else{
				//Sandbox output the actual error message to dive in.
				$error = $result['L_LONGMESSAGE0'];
			}
			echo $error;
			Yii::app()->end();
		}else{
			$paymentResult = Yii::app()->Paypal->DoExpressCheckoutPayment($result);
			//Detect errors
			if(!Yii::app()->Paypal->isCallSucceeded($paymentResult)){
				if(Yii::app()->Paypal->apiLive === true){
					//Live mode basic error message
					$error = 'We were unable to process your request. Please try again later';
				}else{
					//Sandbox output the actual error message to dive in.
					$error = $paymentResult['L_LONGMESSAGE0'];
				}
				echo $error;
				Yii::app()->end();
			}else{
				//payment was completed successfully
				if($orders->status=='1')
				{
					$orders->status='2';
					$orders->save();
					$criteria = new CDbCriteria;
					$criteria->select = 't.*';
					$criteria->condition='id IN (SELECT pro_id from orders_details WHERE orders_id IN (SELECT id FROM orders WHERE token="'.$_REQUEST['token'].'" and `status` =2))';
					$orders = Musicstore::model()->findAll($criteria);



					$criteria1 = new CDbCriteria;
					$criteria1->select = 't.*';
					$criteria1->condition='token="'.$_REQUEST['token'].'" and `status`=2';
					$orders_details = Orders::model()->find($criteria1);


					// need to clear cart
					Yii::app()->shoppingCart->clear();
				}
				$this->render('confirm',array('orders'=>$orders,
											  'orders_details'=>$orders_details));
			}
		}
	}

	public function actionCancel()
	{
		//The token of the cancelled payment typically used to cancel the payment within your application
		$token = trim($_GET['token']);
	//	$payerId = trim($_GET['PayerID']);


		$criteria = new CDbCriteria;
		$criteria->condition='token=:Tokenw';
		$criteria->params=array(':Tokenw'=>$token);

		$orders= Orders::model()->find($criteria);
		if($orders->status=='1')
		{
			$orders->status='3';
			$orders->save();

			// need to clear cart
			//Yii::app()->shoppingCart->clear();
		}

		$this->render('cancel');
	}



	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}


/*	public function actionupdate()
	{
		$prod_id = $_REQUEST['prod_id'];
		$order_id = $_REQUEST['order'];
		$prod_name = $_REQUEST['name'];

	    $criteria = new CDbCriteria;
		$criteria->select = 't.*';
		$criteria->condition='pro_id='.$prod_id;
		$criteria->addCondition('orders_id='.$order_id);
		$orders = OrdersDetails::model()->find($criteria);

		if($orders != null){
			$orders->no_downloads=1;
			$orders->save();
		}
		$this->redirect(array('download','prod_name'=>$prod_name));
	}*/

	public function actionDownload()
	{
		//$prod_id = $_REQUEST['prod_id'];
		//$order_id = $_REQUEST['order'];
		$prod_id = $_REQUEST['id'];

	    $criteria = new CDbCriteria;
		$criteria->select = 't.*';
		$criteria->condition='id='.$prod_id;
		//$criteria->addCondition('orders_id='.$order_id);
		$orders = Musicstore::model()->find($criteria);

       	$src = "musicStore/songs/".$orders->uploaded_data;
        if(file_exists($src)) {
                $path_parts = @pathinfo($src);
                //$mime = $this->__get_mime($path_parts['extension']);
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                //header('Content-Type: '.$mime);
                header('Content-Disposition: attachment; filename='.basename($src));
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Pragma: public');
                header('Content-Length: ' . filesize($src));
                ob_clean();
                flush();
                readfile($src);
		}
		else {
                header("HTTP/1.0 404 Not Found");
                exit();
        }
	}

}