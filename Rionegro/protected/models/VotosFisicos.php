<?php

/**
 * This is the model class for table "VotosFisicos".
 *
 * The followings are the available columns in table 'VotosFisicos':
 * @property integer $Id
 * @property integer $CodigoCandidato
 * @property integer $CodigoRegion
 * @property integer $CedulaDelegado
 * @property integer $CantidadVotos
 * @property string $Fecha
 * @property string $Hora
 *
 * The followings are the available model relations:
 * @property Candidatos $codigoCandidato
 * @property Regiones $codigoRegion
 */
class VotosFisicos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'VotosFisicos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CodigoCandidato, CodigoRegion, CedulaDelegado, CantidadVotos, Fecha, Hora', 'required'),
			array('CodigoCandidato, CodigoRegion, CedulaDelegado, CantidadVotos', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, CodigoCandidato, CodigoRegion, CedulaDelegado, CantidadVotos, Fecha, Hora', 'safe', 'on'=>'search'),
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
			'codigoCandidato' => array(self::BELONGS_TO, 'Candidatos', 'CodigoCandidato'),
			'codigoRegion'    => array(self::BELONGS_TO, 'Regiones', 'CodigoRegion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' 			        => 'ID',
			'CodigoCandidato' => 'Codigo Candidato',
			'CodigoRegion' 	  => 'Codigo Region',
			'CedulaDelegado'  => 'Cedula Delegado',
			'CantidadVotos'   => 'Cantidad Votos',
			'Fecha' 		      => 'Fecha',
			'Hora' 			      => 'Hora',
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

		$criteria->compare('Id',			        $this->Id);
		$criteria->compare('CodigoCandidato', $this->CodigoCandidato);
		$criteria->compare('CodigoRegion',	  $this->CodigoRegion);
		$criteria->compare('CedulaDelegado',  $this->CedulaDelegado);
		$criteria->compare('CantidadVotos',	  $this->CantidadVotos);
		$criteria->compare('Fecha',			      $this->Fecha,true);
		$criteria->compare('Hora',			      $this->Hora,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VotosFisicos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
