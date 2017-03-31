<?php

/**
 * This is the model class for table "Elecciones".
 *
 * The followings are the available columns in table 'Elecciones':
 * @property integer $IdEleccion
 * @property string $Descripcion
 * @property string $FechaInicio
 * @property string $FechaFin
 * @property string $Logotipo
 * @property string $AprobadoPor
 * @property integer $Estado
 * @property string $Texto1
 * @property string $Texto2
 * @property string $Texto3
 * @property string $FechaInicioPostulaciones
 * @property string $FechaFinPostulaciones
 * @property string $Email
 *
 * The followings are the available model relations:
 * @property Candidatos[] $candidatoses
 * @property Regiones[] $regiones
 */
class Elecciones extends CActiveRecord {

    public static $estado = array(1 => 'Activo', 0 => 'Inactivo');

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'Elecciones';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Descripcion, FechaInicio, FechaFin, Estado, Texto1, Texto2, Texto3, FechaInicioPostulaciones, FechaFinPostulaciones, Email', 'required'),
            array('FechaInicio', 'type', 'type' => 'date', 'message' => '{attribute} no es una fecha válida.', 'dateFormat' => 'yyyy-MM-dd'),
            array('FechaFin', 'type', 'type' => 'date', 'message' => '{attribute} no es una fecha válida.', 'dateFormat' => 'yyyy-MM-dd'),
            array('Estado', 'numerical', 'integerOnly' => true),
            array('Email', 'email', 'message' => "El email es incorrecto."),
            array('Email', 'unique', 'message' => 'Este email ya existe.'),
            array('Descripcion, AprobadoPor', 'length', 'max' => 100),
            array('Logotipo', 'file', 'types' => 'jpg, gif, png', 'allowEmpty' => true, 'on' => 'update', 'maxSize' => 1024 * 1024 * 1, 'tooLarge' => 'El archivo es demasiado grande.'),
            array('Texto1, Texto2', 'length', 'max' => 200),
            array('Texto3', 'length', 'max' => 350),
            array('FechaInicioPostulaciones', 'type', 'type' => 'date', 'message' => '{attribute} no es una fecha válida.', 'dateFormat' => 'yyyy-MM-dd'),
            array('FechaFinPostulaciones', 'type', 'type' => 'date', 'message' => '{attribute} no es una fecha válida.', 'dateFormat' => 'yyyy-MM-dd'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Descripcion, FechaInicio, FechaFin, AprobadoPor, Estado, Texto1, Texto2, Texto3, FechaInicioPostulaciones, FechaFinPostulaciones, Email', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'candidatoses' => array(self::HAS_MANY, 'Candidatos', 'CodEleccion'),
            'regiones' => array(self::HAS_MANY, 'Regiones', 'CodEleccion'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'IdEleccion'               => 'Id Elección',
            'Descripcion'              => 'Descripción',
            'FechaInicio'              => 'Fecha Inicio',
            'FechaFin'                 => 'Fecha Fin',
            'Logotipo'                 => 'Logotipo',
            'AprobadoPor'              => 'Aprobado Por',
            'Estado'                   => 'Estado',
            'Texto1'                   => 'Encabezado',
            'Texto2'                   => 'Texto2',
            'Texto3'                   => 'Texto3',
            'FechaInicioPostulaciones' => 'Fecha Inicio Postulaciones',
            'FechaFinPostulaciones'    => 'Fecha Fin Postulaciones',
            'Email'                    => 'Email',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('IdEleccion', $this->IdEleccion);
        $criteria->compare('Descripcion', $this->Descripcion, true);
        $criteria->compare('FechaInicio', $this->FechaInicio, true);
        $criteria->compare('FechaFin', $this->FechaFin, true);
        $criteria->compare('Logotipo', $this->Logotipo, true);
        $criteria->compare('AprobadoPor', $this->AprobadoPor, true);
        $criteria->compare('Estado', $this->Estado);
        $criteria->compare('Texto1', $this->Texto1, true);
        $criteria->compare('Texto2', $this->Texto2, true);
        $criteria->compare('Texto3', $this->Texto3, true);
        $criteria->compare('FechaInicioPostulaciones', $this->FechaInicioPostulaciones, true);
        $criteria->compare('FechaFinPostulaciones', $this->FechaFinPostulaciones, true);
        $criteria->compare('Email', $this->Email, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function getListState($key = null) {
        if ($key !== null) {
            return self::$estado[$key];
        }
        return self::$estado;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Elecciones the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
