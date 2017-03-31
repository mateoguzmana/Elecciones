<?php

/**
 * This is the model class for table "Votacion".
 *
 * The followings are the available columns in table 'Votacion':
 * @property integer $IdVotacion
 * @property string $CodUsuario
 * @property integer $CodRegion
 * @property integer $CodCandidato
 * @property string $Fecha
 * @property string $Hora
 *
 * The followings are the available model relations:
 * @property Candidatos $codCandidato
 * @property Usuarios $codUsuario
 * @property Regiones $codRegion
 */
class Votacion extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'Votacion';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('CodUsuario, CodRegion, CodCandidato, Fecha, Hora', 'required'),
            array('CodRegion, CodCandidato', 'numerical', 'integerOnly' => true),
            array('CodUsuario', 'length', 'max' => 20),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('IdVotacion, CodUsuario, CodRegion, CodCandidato, Fecha, Hora', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'codCandidato' => array(self::BELONGS_TO, 'Candidatos', 'CodCandidato'),
            'codUsuario'   => array(self::BELONGS_TO, 'Usuarios',   'CodUsuario'),
            'codRegion'    => array(self::BELONGS_TO, 'Regiones',   'CodRegion'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'IdVotacion'   => 'Id Votacion',
            'CodUsuario'   => 'Cod Usuario',
            'CodRegion'    => 'Cod Region',
            'CodCandidato' => 'Cod Candidato',
            'Fecha'        => 'Fecha',
            'Hora'         => 'Hora',
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

        $criteria->compare('IdVotacion',   $this->IdVotacion);
        $criteria->compare('CodUsuario',   $this->CodUsuario, true);
        $criteria->compare('CodRegion',    $this->CodRegion);
        $criteria->compare('CodCandidato', $this->CodCandidato);
        $criteria->compare('Fecha',        $this->Fecha, true);
        $criteria->compare('Hora',         $this->Hora, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Votacion the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getCurrentElection() {
        $connection = Yii::app()->db;
        $sql = "SELECT IdEleccion,Descripcion FROM `Elecciones`  ORDER BY IdEleccion DESC;";
        $command = $connection->createCommand($sql);
        $dataReader = $command->queryRow();
        return $dataReader;
    }

    public function getAllRegions($eleccion) {
        $connection = Yii::app()->db;
        $sql = "SELECT `IdRegion`,`Nombre` FROM `Regiones` WHERE CodEleccion = '$eleccion';";
        $command = $connection->createCommand($sql);
        $dataReader = $command->queryAll();
        return $dataReader;
    }

    public function getZoneName($zone) {
        $connection = Yii::app()->db;
        $sql = "SELECT IdRegion,Nombre FROM `Regiones` WHERE IdRegion='$zone';";
        $command = $connection->createCommand($sql);
        $dataReader = $command->queryAll();
        return $dataReader;
    }

    public function getCandidatesZone($zone, $validation = null, $isFisic = null) {
        $connection = Yii::app()->db;
        $sql = "SELECT IdCandidato,Nombres,Foto FROM `Candidatos` WHERE CodRegion='$zone'";
        if ($validation == 'Blanco'):
            $sql .= " UNION SELECT IdCandidato,Nombres,Foto FROM `Candidatos` WHERE CodRegion='0'";
        endif;
        if ($isFisic != null):
            $sql .= " UNION SELECT 0 AS IdCandidato,'VOTO NULO' AS Nombres,'nulo.png' AS Foto";
        endif;
        $sql .= ";";
        $command = $connection->createCommand($sql);
        $dataReader = $command->queryAll();
        return $dataReader;
    }

    public function getStatus($user) {
        $connection = Yii::app()->db;
        $sql = "SELECT Estado FROM `Usuarios` WHERE CedulaAsociado='$user';";
        $command = $connection->createCommand($sql);
        $dataReader = $command->queryRow();
        return $dataReader['Estado'];
    }

    public function chageStatus($user, $status) {
        $connection = Yii::app()->db;
        $sql = "UPDATE `Usuarios` SET Estado='$status' WHERE CedulaAsociado='$user';";
        $command = $connection->createCommand($sql);
        $command->execute();
    }

    public function getUserInformation($document) {
        $connection = Yii::app()->db;
        $sql = "SELECT `CedulaAsociado`,`NombreIntegrado`,`Direccion`,`Telefono`,`Celular`,`Estado` " .
               "FROM `Usuarios` WHERE CedulaAsociado='$document';";
        $command = $connection->createCommand($sql);
        $dataReader = $command->queryRow();
        return $dataReader;
    }

    public function getStatisticalByCandidate($candidate) {
        $connection = Yii::app()->db;
        $sql = "SELECT votacion.CodCandidato,candidato.Nombres,COUNT(*) AS Cantidad FROM `Votacion` votacion INNER JOIN `Candidatos` candidato ON candidato.IdCandidato=votacion.CodCandidato WHERE votacion.CodCandidato='$candidate';";
        $command = $connection->createCommand($sql);
        $dataReader = $command->queryAll();
        return $dataReader;
    }

    public function getAburraZones() {
        $connection = Yii::app()->db;
        $sql = "SELECT IdRegion,Nombre FROM `Regiones` WHERE IdRegion<8;";
        $command = $connection->createCommand($sql);
        $dataReader = $command->queryAll();
        return $dataReader;
    }

    public function getDateCurrentElection() {
        $connection = Yii::app()->db;
        $sql = "SELECT FechaInicio,FechaFin FROM `Elecciones`;";
        $command = $connection->createCommand($sql);
        $dataReader = $command->queryRow();
        return $dataReader;
    }

    public function getAllVoters($zone = null) {
        $connection = Yii::app()->db;
        if ($zone == null):
            $sql = "SELECT COUNT(*) total FROM `Usuarios` WHERE Estado!=3;";
        else:
            $sql = "SELECT COUNT(*) total FROM `Usuarios` WHERE Estado!=3 AND CodZona='$zone';";
        endif;
        $command = $connection->createCommand($sql);
        $quantity = $command->queryRow();
        return $quantity;
    }

    public function getVoters($zone = null) {
        $connection = Yii::app()->db;
        if ($zone == null):
            $sql = "SELECT SUM(cantidad) sufragantes FROM (SELECT COUNT(*) cantidad FROM `Votacion` UNION " .
                   "SELECT SUM(CantidadVotos) cantidad FROM `VotosFisicos` UNION " .
                   "SELECT SUM(Cantidad) cantidad FROM `VotosNulos`) t1;";
        else:
            $sql = "SELECT SUM(cantidad) sufragantes FROM (SELECT COUNT(*) cantidad FROM `Votacion` voto " .
                   "INNER JOIN Candidatos candidato ON candidato.IdCandidato=voto.CodCandidato " .
                   "WHERE candidato.CodRegion='$zone' AND voto.CodCandidato !='89' UNION SELECT COUNT(*) cantidad FROM `Votacion` voto " .
                   "WHERE voto.CodCandidato='89' AND voto.CodRegion='$zone' UNION SELECT SUM(CantidadVotos) " .
                   "cantidad FROM `VotosFisicos` fisico WHERE fisico.CodigoRegion='$zone' UNION " .
                   "SELECT SUM(nulo.Cantidad) cantidad FROM `VotosNulos` nulo WHERE nulo.CodRegion='$zone') t1;";
        endif;
        $command = $connection->createCommand($sql);
        $quantity = $command->queryRow();
        //return $sql;
        return $quantity;
    }

    public function getElectronicVoters($zone = null) {
        $connection = Yii::app()->db;
        if ($zone == null):
            $sql = "SELECT COUNT(*) electronico FROM `Votacion` WHERE CodCandidato != 89;";
        else:
            $sql = "SELECT SUM(cantidad) electronico FROM (SELECT COUNT(*) cantidad FROM `Votacion` voto " .
                   "INNER JOIN Candidatos candidato ON candidato.IdCandidato=voto.CodCandidato " .
                   "WHERE candidato.CodRegion='$zone' AND voto.CodCandidato != 89 UNION SELECT COUNT(*) cantidad FROM `Votacion` voto " .
                   "WHERE voto.CodCandidato='89' AND voto.CodRegion='$zone' AND voto.CodCandidato != 89) t2;";
        endif;
        $command = $connection->createCommand($sql);
        $quantity = $command->queryRow();
        return $quantity;
    }

    public function getInactiveVoters($zone = null) {
        $connection = Yii::app()->db;
        if ($zone == null):
            $sql = "SELECT COUNT(*) inactivo FROM `Usuarios` WHERE Estado=2;";
        else:
            $sql = "SELECT COUNT(*) inactivo FROM `Usuarios` WHERE Estado=2 AND CodZona='$zone';";
        endif;
        $command = $connection->createCommand($sql);
        $quantity = $command->queryRow();
        return $quantity;
    }

    public function getWhiteVoters($zone = null) {
        $connection = Yii::app()->db;
        if ($zone == null):
            $sql = "SELECT SUM(blanco) blanco FROM (SELECT COUNT(*) blanco FROM `Votacion` WHERE CodCandidato=89 UNION SELECT SUM(`CantidadVotos`) blanco FROM `VotosFisicos` WHERE CodigoCandidato=89)tbl;";
        else:
            $sql = "SELECT SUM(blanco) blanco FROM (SELECT COUNT(*) blanco FROM `Votacion` WHERE CodCandidato=89 AND CodRegion='$zone' UNION SELECT SUM(`CantidadVotos`) blanco FROM `VotosFisicos` WHERE CodigoCandidato=89 AND CodigoRegion='$zone')tbl;";
        endif;
        $command = $connection->createCommand($sql);
        $quantity = $command->queryRow();
        //return $sql;
        return $quantity;
    }

    // This function is for count users with vote execute. If user has one vote or more, this is counted.
    public function getSuffragettes($zone = null) {
        $connection = Yii::app()->db;

        if ($zone == null):
            $sql = "SELECT COUNT(Total) Total FROM (SELECT COUNT(DISTINCT CodUsuario) AS Total FROM Votacion INNER JOIN Usuarios ON Votacion.CodUsuario=Usuarios.CedulaAsociado GROUP BY Usuarios.CedulaAsociado) AS Total";
        else:
            $sql = "SELECT COUNT(Total) Total FROM (SELECT COUNT(DISTINCT CodUsuario) AS Total FROM Votacion INNER JOIN Usuarios ON Votacion.CodUsuario=Usuarios.CedulaAsociado WHERE Usuarios.CodZona='$zone' GROUP BY Usuarios.CedulaAsociado) AS Total";
        endif;

        $command       = $connection->createCommand($sql);
        $suffraggettes = $command->queryRow();

        return $suffraggettes;
    }

    public function getDetailNotVoting($region) {
        $connection = Yii::app()->db;
        //$sql = "SELECT COUNT(*) novoto,CodZona FROM `Usuarios` WHERE CodZona='$region' AND Estado='0';";
        $sql = "SELECT COUNT(*) novoto,CodZona FROM `Usuarios` WHERE CodZona='$region'";
        $command = $connection->createCommand($sql);
        $quantity = $command->queryRow();
        return $quantity;
    }

    public function getCustomsStatistics($zone) {
        $connection = Yii::app()->db;
        $sql = "SELECT candidato.IdCandidato,candidato.Nombres,COUNT(*) AS Cantidad,fisico.CantidadVotos FROM `Votacion` votacion INNER JOIN `Candidatos` candidato ON votacion.CodCandidato=candidato.IdCandidato LEFT JOIN `VotosFisicos` fisico ON fisico.CodigoCandidato=candidato.IdCandidato WHERE candidato.CodRegion='$zone' GROUP BY candidato.IdCandidato ORDER BY Cantidad DESC;";
        $command = $connection->createCommand($sql);
        $dataReader = $command->queryAll();
        return $dataReader;
    }

    public function validateZoneByDelegate($zone, $user) {
        $connection = Yii::app()->db;
        $sql = "SELECT COUNT(*) cantidad FROM `VotosFisicos` WHERE `CodigoRegion`='$zone' AND `CedulaDelegado`='$user';";
        $command = $connection->createCommand($sql);
        $dataReader = $command->queryRow();
        if ($dataReader['cantidad'] == 0):
            return true;
        else:
            return false;
        endif;
    }

    public function getNullVoters($zone = null) {
        $connection = Yii::app()->db;
        if ($zone == null):
            $sql = "SELECT SUM(`Cantidad`) AS cantidad FROM `VotosNulos`;";
        else:
            $sql = "SELECT SUM(`Cantidad`) AS cantidad FROM `VotosNulos` WHERE `CodRegion`='$zone';";
        endif;
        $command = $connection->createCommand($sql);
        $quantity = $command->queryRow();
        return $quantity;
    }

    public function getFisicVoters($zone = null) {
        $connection = Yii::app()->db;

        if ($zone == null):
            $sql = "SELECT SUM(`CantidadVotos`) AS cantidad FROM `VotosFisicos` WHERE CodigoCandidato!=89;";
        else:
            $sql = "SELECT SUM(`CantidadVotos`) AS cantidad FROM `VotosFisicos` WHERE `CodigoRegion`='$zone' AND CodigoCandidato!=89;";
        endif;

        $command = $connection->createCommand($sql);
        $quantity = $command->queryRow();
        return $quantity;
    }

    public function getCandidato($id_candidato) {
        $connection = Yii::app()->db;
        $sql        = "SELECT Nombres AS candidato FROM Candidatos WHERE `IdCandidato`='$id_candidato';";
        $command    = $connection->createCommand($sql);
        $candidato  = $command->queryScalar();
        return $candidato;
    }

    // This function return to controller total available votes per user, in this case is user with document sent as parameter
    public function getUserNumVotes($document) {
        $connection = Yii::app()->db;

        // Get total user's votes
        $sql        = "SELECT NumVotos FROM Usuarios WHERE `CedulaAsociado`='$document';";
        $command    = $connection->createCommand($sql);
        $NumVotos   = $command->queryScalar();

        // Get total register votes per this user
        $sql2       = "SELECT COUNT(IdVotacion) AS Summation FROM Votacion WHERE `CodUsuario`='$document';";
        $command2   = $connection->createCommand($sql2);
        $SummationVotes = $command2->queryScalar();

        // Return a subtraction
        return ($NumVotos-$SummationVotes);
    }

}
