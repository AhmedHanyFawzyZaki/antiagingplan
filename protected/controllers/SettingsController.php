<?php

class SettingsController extends AdminController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
		//	'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Settings;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Settings']))
		{
			$model->attributes=$_POST['Settings'];
			$rnd = rand(0,9999);  // generate random number between 0-9999
			$uploadedFile=CUploadedFile::getInstance($model,'image');

			if(! empty ($uploadedFile)){
				$fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
				$model->image = $fileName;
				$uploadedFile->saveAs(Yii::app()->basePath.'/../media/'.$fileName);
			}
			/********************home page***********************/
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Settings']))
		{
			if( $model->image != ''){
					$_POST['Settings']['image'] = $model->image;
			}
			$model->attributes=$_POST['Settings'];
			
			$uploadedFile=CUploadedFile::getInstance($model,'image');

			if(! empty ($uploadedFile)){
				if($model->image =='')
				{
					$rnd = rand(0,9999);
					$fileName = "{$rnd}-{$uploadedFile}";
					$model->image=$fileName;
				}

					$uploadedFile->saveAs(Yii::app()->basePath.'/../media/'.$model->image);
			}
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=$this->loadModel(1);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Settings']))
		{
			if( $model->image != ''){
					$_POST['Settings']['image'] = $model->image;
			}
			/********************home page***********************/
			if( $model->home_banner != ''){
					$_POST['Settings']['home_banner'] = $model->home_banner;
			}
			/********************about page***********************/
			if( $model->about_banner != ''){
					$_POST['Settings']['about_banner'] = $model->about_banner;
			}
			/********************order page***********************/
			if( $model->order_banner != ''){
					$_POST['Settings']['order_banner'] = $model->order_banner;
			}
			/********************article page***********************/
			if( $model->article_banner != ''){
					$_POST['Settings']['article_banner'] = $model->article_banner;
			}
			/********************article page***********************/
			if( $model->post_banner != ''){
					$_POST['Settings']['post_banner'] = $model->post_banner;
			}
			
			$model->attributes=$_POST['Settings'];
			
			$uploadedFile=CUploadedFile::getInstance($model,'image');

			if(! empty ($uploadedFile)){
				if($model->image =='')
				{
					$rnd = rand(0,9999);
					$fileName = "{$rnd}-{$uploadedFile}";
					$model->image=$fileName;
				}

				$uploadedFile->saveAs(Yii::app()->basePath.'/../media/'.$model->image);
			}
			/********************home page***********************/
			$uploadedFile1=CUploadedFile::getInstance($model,'home_banner');

			if(! empty ($uploadedFile1)){
				if($model->home_banner =='')
				{
					$rnd1 = rand(0,9999);
					$fileName1 = "{$rnd1}-{$uploadedFile1}";
					$model->home_banner=$fileName1;
				}

				$uploadedFile1->saveAs(Yii::app()->basePath.'/../media/'.$model->home_banner);
			}
			/********************about page***********************/
			$uploadedFile2=CUploadedFile::getInstance($model,'about_banner');

			if(! empty ($uploadedFile2)){
				if($model->about_banner =='')
				{
					$rnd2 = rand(0,9999);
					$fileName2 = "{$rnd2}-{$uploadedFile2}";
					$model->about_banner=$fileName2;
				}

				$uploadedFile2->saveAs(Yii::app()->basePath.'/../media/'.$model->about_banner);
			}
			/********************order page***********************/
			$uploadedFile3=CUploadedFile::getInstance($model,'order_banner');

			if(! empty ($uploadedFile3)){
				if($model->order_banner =='')
				{
					$rnd3 = rand(0,9999);
					$fileName3 = "{$rnd3}-{$uploadedFile3}";
					$model->order_banner=$fileName3;
				}

				$uploadedFile3->saveAs(Yii::app()->basePath.'/../media/'.$model->order_banner);
			}
			/********************article page***********************/
			$uploadedFile4=CUploadedFile::getInstance($model,'article_banner');

			if(! empty ($uploadedFile4)){
				if($model->article_banner =='')
				{
					$rnd4 = rand(0,9999);
					$fileName4 = "{$rnd4}-{$uploadedFile4}";
					$model->article_banner=$fileName4;
				}

				$uploadedFile4->saveAs(Yii::app()->basePath.'/../media/'.$model->article_banner);
			}
			/********************article page***********************/
			$uploadedFile5=CUploadedFile::getInstance($model,'post_banner');

			if(! empty ($uploadedFile5)){
				if($model->post_banner =='')
				{
					$rnd5 = rand(0,9999);
					$fileName5 = "{$rnd5}-{$uploadedFile5}";
					$model->post_banner=$fileName5;
				}

				$uploadedFile5->saveAs(Yii::app()->basePath.'/../media/'.$model->post_banner);
			}
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('index',array(
		'model'=>$model,
	));
	}
	
	public function actionContactUs()
	{
		$model=Settings::model()->findByPk(1);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Settings']))
		{
			if( $model->image != ''){
					$_POST['Settings']['image'] = $model->image;
			}
			/********************home page***********************/
			if( $model->home_banner != ''){
					$_POST['Settings']['home_banner'] = $model->home_banner;
			}
			/********************about page***********************/
			if( $model->about_banner != ''){
					$_POST['Settings']['about_banner'] = $model->about_banner;
			}
			/********************order page***********************/
			if( $model->order_banner != ''){
					$_POST['Settings']['order_banner'] = $model->order_banner;
			}
			/********************article page***********************/
			if( $model->article_banner != ''){
					$_POST['Settings']['article_banner'] = $model->article_banner;
			}
			
			$model->attributes=$_POST['Settings'];
			
			$uploadedFile=CUploadedFile::getInstance($model,'image');

			if(! empty ($uploadedFile)){
				if($model->image =='')
				{
					$rnd = rand(0,9999);
					$fileName = "{$rnd}-{$uploadedFile}";
					$model->image=$fileName;
				}

				$uploadedFile->saveAs(Yii::app()->basePath.'/../media/'.$model->image);
			}
			/********************home page***********************/
			$uploadedFile1=CUploadedFile::getInstance($model,'home_banner');

			if(! empty ($uploadedFile1)){
				if($model->home_banner =='')
				{
					$rnd1 = rand(0,9999);
					$fileName1 = "{$rnd1}-{$uploadedFile1}";
					$model->home_banner=$fileName1;
				}

				$uploadedFile1->saveAs(Yii::app()->basePath.'/../media/'.$model->home_banner);
			}
			/********************about page***********************/
			$uploadedFile2=CUploadedFile::getInstance($model,'about_banner');

			if(! empty ($uploadedFile2)){
				if($model->about_banner =='')
				{
					$rnd2 = rand(0,9999);
					$fileName2 = "{$rnd2}-{$uploadedFile2}";
					$model->about_banner=$fileName2;
				}

				$uploadedFile2->saveAs(Yii::app()->basePath.'/../media/'.$model->about_banner);
			}
			/********************order page***********************/
			$uploadedFile3=CUploadedFile::getInstance($model,'order_banner');

			if(! empty ($uploadedFile3)){
				if($model->order_banner =='')
				{
					$rnd3 = rand(0,9999);
					$fileName3 = "{$rnd3}-{$uploadedFile3}";
					$model->order_banner=$fileName3;
				}

				$uploadedFile3->saveAs(Yii::app()->basePath.'/../media/'.$model->order_banner);
			}
			/********************article page***********************/
			$uploadedFile4=CUploadedFile::getInstance($model,'article_banner');

			if(! empty ($uploadedFile4)){
				if($model->article_banner =='')
				{
					$rnd4 = rand(0,9999);
					$fileName4 = "{$rnd4}-{$uploadedFile4}";
					$model->article_banner=$fileName4;
				}

				$uploadedFile4->saveAs(Yii::app()->basePath.'/../media/'.$model->article_banner);
			}
			if($model->save())
			{
				Yii::app()->user->setFlash('added','Done! Your contact us settings has been updated successfuly.');
				$this->redirect(array('contactUs'));
			}
		}

		$this->render('contact_us',array(
		'model'=>$model,
	));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Settings('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Settings']))
			$model->attributes=$_GET['Settings'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Settings::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='settings-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
