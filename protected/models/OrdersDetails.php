<?php

/**
 * This is the model class for table "orders_details".
 *
 * The followings are the available columns in table 'orders_details':
 * @property integer $id
 * @property integer $orders_id
 * @property integer $qty
 * @property integer $pro_id
 * @property string $price
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $address
 */
class OrdersDetails extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrdersDetails the static model class
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
		return '{{orders_details}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('orders_id', 'required'),
			array('orders_id, qty, pro_id', 'numerical', 'integerOnly'=>true),
			array('price', 'length', 'max'=>11),
			array('first_name, last_name, email, address', 'length', 'max'=>255),
			array('no_downloads','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, orders_id, qty, no_downloads, pro_id, price, first_name, last_name, email, address', 'safe', 'on'=>'search'),
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
			'orders_id' => 'Orders',
			'qty' => 'Qty',
			'pro_id' => 'Pro',
			'price' => 'Price',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'email' => 'Email',
			'address' => 'Address',
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
		$criteria->compare('orders_id',$this->orders_id);
		$criteria->compare('qty',$this->qty);
		$criteria->compare('pro_id',$this->pro_id);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('no_downloads',$this->no_downloads,true);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}