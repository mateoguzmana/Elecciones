<?php

/**
 * This is the model class for table "Candidatos".
 *
 * The followings are the available columns in table 'Candidatos':
 * @property integer $IdCandidato
 * @property string $Nombres
 * @property string $Documento
 * @property string $Direccion
 * @property string $Telefono
 * @property string $Email
 * @property string $NroRadicado
 * @property string $FechaInscripcion
 * @property string $Foto
 * @property string $Celular
 * @property integer $CodEleccion
 * @property integer $CodRegion
 * @property integer $CodigoBarrio
 *
 * The followings are the available model relations:
 * @property ZonasBarrios $codBarrio
 * @property Elecciones $codEleccion
 * @property Regiones $codRegion
 */
class Candidatos extends CActiveRecord {

    public $Eleccion;
    public $Region;
    public $Barrio;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'Candidatos';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Nombres, Documento, Direccion, Telefono, Email, Foto, CodEleccion, CodRegion, CodigoBarrio', 'required'),
            array('CodEleccion, CodRegion, CodigoBarrio', 'numerical', 'integerOnly' => true),
            array('Nombres, Email', 'length', 'max' => 100),
            array('Documento, Direccion, Telefono, Foto', 'length', 'max' => 50),
            array('NroRadicado, Celular', 'length', 'max' => 20),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('IdCandidato, Nombres, Documento, Direccion, Telefono, Email, NroRadicado, FechaInscripcion, Foto, Celular, Eleccion, Region, Barrio', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'codBarrio'   => array(self::BELONGS_TO, 'ZonasBarrios', 'CodigoBarrio'),
            'codEleccion' => array(self::BELONGS_TO, 'Elecciones', 'CodEleccion'),
            'codRegion'   => array(self::BELONGS_TO, 'Regiones', 'CodRegion'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'IdCandidato'      => 'Nro Candidato',
            'CodEleccion'      => 'Elección',
            'CodRegion'        => 'Cod Region',
            'FechaInscripcion' => 'Fecha Inscripción',
            'NroRadicado'      => 'Nro Radicado',
            'Nombres'          => 'Nombres',
            'Documento'        => 'Documento',
            'Direccion'        => 'Dirección',
            'Telefono'         => 'Teléfono',
            'Email'            => 'Email',
            'Foto'             => 'Foto',
            'CodigoBarrio'     => 'Barrio',
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

	$criteria->together = true;
	$criteria->with = array('codBarrio','codEleccion','codRegion');
        $criteria->compare('IdCandidato',             $this->IdCandidato, true);
        $criteria->compare('CodEleccion',             $this->CodEleccion);
        $criteria->compare('codEleccion.Descripcion', $this->Eleccion, true);
        $criteria->compare('CodRegion',               $this->CodRegion);
        $criteria->compare('codRegion.Nombre',        $this->Region, true);
        $criteria->compare('FechaInscripcion',        $this->FechaInscripcion, true);
        $criteria->compare('NroRadicado',             $this->NroRadicado, true);
        $criteria->compare('Nombres',                 $this->Nombres, true);
        $criteria->compare('Documento',               $this->Documento, true);
        $criteria->compare('Direccion',               $this->Direccion, true);
        $criteria->compare('Telefono',                $this->Telefono, true);
        $criteria->compare('t.Email',                 $this->Email, true);
        $criteria->compare('Foto',                    $this->Foto);
        $criteria->compare('CodigoBarrio',            $this->CodigoBarrio);
        $criteria->compare('codBarrio.NombreBarrio',  $this->Barrio, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Candidatos the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function consulta_region($eleccion) {
        $connection = Yii::app()->db;

        $sql = "SELECT * FROM Regiones r ,ZonasBarrios z WHERE z.CodigoZona = r.IdRegion AND z.CodigoBarrio ='" . $eleccion . "' ";
        $command = $connection->createCommand($sql);
// Se obtiene el resultado de la base de datos
        $dataReader = $command->queryAll();
        return $dataReader;
    }

    public function consulta_radicado($eleccion) {
        $connection = Yii::app()->db;

        $sql = "SELECT IFNULL(MAX(IdCandidato)+1,1) maximo,(select Texto1 FROM Elecciones  WHERE IdEleccion = '" . $eleccion . "') texto1,(select Texto2 FROM Elecciones  WHERE IdEleccion = '" . $eleccion . "') texto2,(select Texto3 FROM Elecciones  WHERE IdEleccion = '" . $eleccion . "') texto3  FROM Candidatos ";
        $command = $connection->createCommand($sql);
// Se obtiene el resultado de la base de datos
        $dataReader = $command->queryAll();
        return $dataReader;
    }

    public function consulta_eleccion() {
        $connection = Yii::app()->db;

        $sql = "SELECT * FROM Elecciones WHERE Estado = 1 ";
        $command = $connection->createCommand($sql);
// Se obtiene el resultado de la base de datos
        $dataReader = $command->queryAll();
        return $dataReader;
    }

    public function consultar_datos($cedula) {
        $connection = Yii::app()->db;

        $sql = "SELECT * FROM Usuarios WHERE CedulaAsociado = '" . $cedula . "' ";
        $command = $connection->createCommand($sql);
// Se obtiene el resultado de la base de datos
        $dataReader = $command->queryAll();
        return $dataReader;
    }

    public function consultar_barrio() {
        $connection = Yii::app()->db;

        $sql = "SELECT * FROM ZonasBarrios ORDER BY NombreBarrio ASC ";
        $command = $connection->createCommand($sql);
// Se obtiene el resultado de la base de datos
        $dataReader = $command->queryAll();
        return $dataReader;
    }

    /*
      public function consulta_eleccion_textos($elegido) {
      $connection = Yii::app()->db;

      $sql = "SELECT * FROM Elecciones WHERE Estado = 1 AND IdEleccion= '".$elegido."' ";
      $command = $connection->createCommand($sql);
      // Se obtiene el resultado de la base de datos
      $dataReader = $command->queryAll();
      return $dataReader;
      }
     */

    public function guardar($eleccion, $region, $fechainscricion, $radicado, $nombres, $apellidos, $codigo_candidato, $nro_documento, $direccion, $telefono, $email, $foto, $celular, $CodigoBarrio) {
        $connection = Yii::app()->db;
        $sql = "INSERT INTO Candidatos(CodEleccion,CodRegion,FechaInscripcion,NroRadicado,Nombres,Documento,Direccion,Telefono,Email,Foto,Celular,CodigoBarrio) "
                . "VALUES ('" . $eleccion . "','" . $region . "','" . $fechainscricion . "','" . $radicado . "','" . $nombres . "','" . $nro_documento . "','" . $direccion . "','" . $telefono . "','" . $email . "','" . $foto . "','" . $celular . "','" . $CodigoBarrio . "') ";
        $command = $connection->createCommand($sql);
        // Se obtiene el resultado de la base de datos
        $command->execute();
    }

    public function getRadicated($eleccion) {
        $connection = Yii::app()->db;
        $sql = "SELECT IFNULL(MAX(IdCandidato)+1,1) maximo FROM Candidatos WHERE CodEleccion = '$eleccion';";
        $command = $connection->createCommand($sql);
        $dataReader = $command->queryRow();
        return $eleccion . "-" . $dataReader['maximo'];
    }

    public function getAllCandidate() {
        $connection = Yii::app()->db;
        $sql = "SELECT candidato.IdCandidato,candidato.FechaInscripcion,candidato.NroRadicado,candidato.Nombres, candidato.Documento,candidato.Direccion,candidato.Telefono,candidato.Email,candidato.Celular,eleccion.Descripcion AS Eleccion,region.Nombre AS Region,barrio.NombreBarrio AS Barrio FROM `Candidatos` candidato INNER JOIN `Elecciones` eleccion ON eleccion.IdEleccion=candidato.CodEleccion INNER JOIN `Regiones` region ON region.IdRegion=candidato.CodRegion INNER JOIN `ZonasBarrios` barrio ON barrio.CodigoBarrio=candidato.CodigoBarrio ORDER BY IdCandidato";
        $command = $connection->createCommand($sql);
        $dataReader = $command->queryAll();
        return $dataReader;
    }
    
}
