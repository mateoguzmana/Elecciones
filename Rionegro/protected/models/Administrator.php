<?php

/**
 * This is the model class for table "Administrator".
 *
 * The followings are the available columns in table 'Administrator':
 * @property integer $Id
 * @property string $Document
 * @property string $User
 * @property string $Password
 * @property string $Name
 * @property string $Email
 * @property string $Phone
 * @property string $Cellphone
 * @property integer $IdProfile
 * @property string $Address
 * @property integer $Status
 */
class Administrator extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Administrator';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Document, User, Password, Name, Email, Phone, Cellphone, IdProfile, Address', 'required'),
			array('IdProfile, Status', 'numerical', 'integerOnly'=>true),
			array('Document, User, Email, Address', 'length', 'max'=>50),
			array('Password', 'length', 'max'=>16),
			array('Name', 'length', 'max'=>25),
			array('Phone, Cellphone', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, Document, User, Password, Name, Email, Phone, Cellphone, IdProfile, Address, Status', 'safe', 'on'=>'search'),
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
			'Id' 	    => 'ID',
			'Document'  => 'Document',
			'User' 		=> 'User',
			'Password'  => 'Password',
			'Name' 		=> 'Name',
			'Email' 	=> 'Email',
			'Phone' 	=> 'Phone',
			'Cellphone' => 'Cellphone',
			'IdProfile' => 'Id Profile',
			'Address' 	=> 'Address',
			'Status' 	=> 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('Id',$this->Id);
		$criteria->compare('Document',$this->Document,true);
		$criteria->compare('User',$this->User,true);
		$criteria->compare('Password',$this->Password,true);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Phone',$this->Phone,true);
		$criteria->compare('Cellphone',$this->Cellphone,true);
		$criteria->compare('IdProfile',$this->IdProfile);
		$criteria->compare('Address',$this->Address,true);
		$criteria->compare('Status',$this->Status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Administrator the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
