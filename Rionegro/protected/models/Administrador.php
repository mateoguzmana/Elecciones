<?php

/**
 * This is the model class for table "Administrador".
 *
 * The followings are the available columns in table 'Administrador':
 * @property integer $Id
 * @property string $Cedula
 * @property string $Usuario
 * @property string $Clave
 * @property string $Nombres
 * @property string $Email
 * @property string $Telefono
 * @property integer $Celular
 * @property integer $IdPerfil
 * @property string $Direccion
 * @property integer $Activo
 */
class Administrador extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Administrador';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Cedula, Usuario, Clave, Nombres, Email, Telefono, Celular, IdPerfil, Direccion', 'required'),
			array('Celular, IdPerfil, Activo', 'numerical', 'integerOnly'=>true),
			array('Cedula, Usuario, Email, Direccion', 'length', 'max'=>50),
			array('Clave', 'length', 'max'=>16),
			array('Nombres', 'length', 'max'=>25),
			array('Telefono', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, Cedula, Usuario, Clave, Nombres, Email, Telefono, Celular, IdPerfil, Direccion, Activo', 'safe', 'on'=>'search'),
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
			'Id' 		    => 'ID',
			'Cedula' 	  => 'Cedula',
			'Usuario' 	=> 'Usuario',
			'Clave' 	  => 'Clave',
			'Nombres' 	=> 'Nombres',
			'Email' 	  => 'Email',
			'Telefono'  => 'Telefono',
			'Celular'   => 'Celular',
			'IdPerfil'  => 'Id Perfil',
			'Direccion' => 'Direccion',
			'Activo' 	  => 'Activo',
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

		$criteria->compare('Id',		    $this->Id);
		$criteria->compare('Cedula',	  $this->Cedula,true);
		$criteria->compare('Usuario',	  $this->Usuario,true);
		$criteria->compare('Clave',		  $this->Clave,true);
		$criteria->compare('Nombres',	  $this->Nombres,true);
		$criteria->compare('Email',		  $this->Email,true);
		$criteria->compare('Telefono',	$this->Telefono,true);
		$criteria->compare('Celular',	  $this->Celular);
		$criteria->compare('IdPerfil',	$this->IdPerfil);
		$criteria->compare('Direccion', $this->Direccion,true);
		$criteria->compare('Activo',	  $this->Activo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Administrador the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
