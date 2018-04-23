<?php

/**
 * This is the model class for table "article_comment".
 *
 * The followings are the available columns in table 'article_comment':
 * @property integer $id
 * @property string $title
 * @property string $email
 * @property string $phone
 * @property string $subject
 * @property integer $article_id
 */
class ArticleComment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ArticleComment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{article_comment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('article_id', 'numerical', 'integerOnly'=>true),
			array('title, email, phone', 'length', 'max'=>255),
			array('subject', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, email, phone, subject, article_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Name',
			'email' => 'Email',
			'phone' => 'Phone',
			'subject' => 'Subject',
			'article_id' => 'Article',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('article_id',$this->article_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public static function GetCommentsNumber($id)
	{
		return count(ArticleComment::model()->findAll(array('condition'=>'article_id='.$id)));
	}
}