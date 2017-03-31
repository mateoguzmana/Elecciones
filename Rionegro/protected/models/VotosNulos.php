<?php

/**
 * This is the model class for table "VotosNulos".
 *
 * The followings are the available columns in table 'VotosNulos':
 * @property integer $Id
 * @property string $Usuario
 * @property integer $Cantidad
 * @property integer $CodRegion
 * @property string $Fecha
 * @property string $Hora
 *
 * The followings are the available model relations:
 * @property Administrator $usuario
 */
class VotosNulos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'VotosNulos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Usuario, Cantidad, CodRegion, Fecha, Hora', 'required'),
			array('Cantidad, CodRegion', 'numerical', 'integerOnly'=>true),
			array('Usuario', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, Usuario, Cantidad, CodRegion, Fecha, Hora', 'safe', 'on'=>'search'),
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
			'usuario' => array(self::BELONGS_TO, 'Administrator', 'Usuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' 		=> 'ID',
			'Usuario' 	=> 'Usuario',
			'Cantidad' 	=> 'Cantidad',
			'CodRegion' => 'Cod Region',
			'Fecha' 	=> 'Fecha',
			'Hora' 		=> 'Hora',
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

		$criteria->compare('Id',	   $this->Id);
		$criteria->compare('Usuario',  $this->Usuario,true);
		$criteria->compare('Cantidad', $this->Cantidad);
		$criteria->compare('CodRegion',$this->CodRegion);
		$criteria->compare('Fecha',	   $this->Fecha,true);
		$criteria->compare('Hora',	   $this->Hora,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VotosNulos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
