<?php

/**
 * This is the model class for table "Usuarios".
 *
 * The followings are the available columns in table 'Usuarios':
 * @property string $CedulaAsociado
 * @property string $NombreIntegrado
 * @property string $Direccion
 * @property string $Telefono
 * @property string $Celular
 * @property string $NombreAgencia
 * @property integer $CodCiudad
 * @property string $NombreCiudad
 * @property integer $CodBarrio
 * @property string $Barrio
 * @property integer $Password
 */
class Usuarios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Usuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('CedulaAsociado, NombreIntegrado, Direccion, Telefono, Celular, NombreAgencia, CodCiudad, NombreCiudad, CodBarrio, Barrio, Password', 'required'),
				array('CodCiudad, CodBarrio, Password', 'numerical', 'integerOnly'=>true),
				array('CedulaAsociado, Telefono, Celular', 'length', 'max'=>20),
				array('NombreIntegrado, Direccion, NombreAgencia, NombreCiudad, Barrio', 'length', 'max'=>100),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array('CedulaAsociado, NombreIntegrado, Direccion, Telefono, Celular, NombreAgencia, CodCiudad, NombreCiudad, CodBarrio, Barrio, Password', 'safe', 'on'=>'search'),
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
			'CedulaAsociado'  => 'Cedula Asociado',
			'NombreIntegrado' => 'Nombre Integrado',
			'Direccion' 	    => 'Direccion',
			'Telefono' 		    => 'Telefono',
			'Celular' 		    => 'Celular',
			'NombreAgencia'   => 'Nombre Agencia',
			'CodCiudad' 	    => 'Cod Ciudad',
			'NombreCiudad' 	  => 'Nombre Ciudad',
			'CodBarrio' 	    => 'Cod Barrio',
			'Barrio' 		      => 'Barrio',
			'Password' 		    => 'Password',
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

		$criteria->compare('CedulaAsociado',	$this->CedulaAsociado,true);
		$criteria->compare('NombreIntegrado',	$this->NombreIntegrado,true);
		$criteria->compare('Direccion',			$this->Direccion,true);
		$criteria->compare('Telefono',			$this->Telefono,true);
		$criteria->compare('Celular',			$this->Celular,true);
		$criteria->compare('NombreAgencia',		$this->NombreAgencia,true);
		$criteria->compare('CodCiudad',			$this->CodCiudad);
		$criteria->compare('NombreCiudad',		$this->NombreCiudad,true);
		$criteria->compare('CodBarrio',			$this->CodBarrio);
		$criteria->compare('Barrio',			$this->Barrio,true);
		$criteria->compare('Password',			$this->Password);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
