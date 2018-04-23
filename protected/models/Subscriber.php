<?php

/**
 * This is the model class for table "Subscriber".
 *
 * The followings are the available columns in table 'Subscriber':
 * @property integer $id
 * @property string $email
 * @property string $name
 */
class Subscriber extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Subscriber the static model class
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
		return '{{subscriber}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email', 'length', 'max'=>250),
			array('name', 'length', 'max'=>50),
			array('email','email','on'=>'newsletter'),
			array('email','unique'),
			array('email','required','message'=>'Please fill in your {attribute}.'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, email, name', 'safe', 'on'=>'search'),
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
			'email' => 'Email',
			'name' => 'Name',
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
		$criteria->compare('email',$this->email,true);
		$criteria->compare('name',$this->name,true);
$criteria->order = 'id DESC';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function getsubscribers()
	{
		return CHtml::listData(Subscriber::model()->findAll(array('order'=>'id DESC')),'id','email');
	}

}