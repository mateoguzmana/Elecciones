<?php

class Consult extends CActiveRecord {

    public $txtError;

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getActionsProfile($idProfile, $controllers) {
        $connection = Yii::app()->db;
        $sql = "SELECT profile.IdProfile,profile.IdMenu,profile.IdLink,profile.IdAction,action.Description,link.Controller FROM `ProfileAdministration` profile INNER JOIN `Actions` action ON action.IdAction=profile.IdAction INNER JOIN `Links` link ON link.IdLink=profile.IdLink WHERE profile.IdProfile='$idProfile' AND link.Controller='$controllers';";        
        $command = $connection->createCommand($sql);
        $dataReader = $command->queryAll();
        return $dataReader;
    }

    public function getProfile($idProfile) {
        $connection = Yii::app()->db;
        $sql = "SELECT profile.IdProfile,profile.IdMenu,profile.IdLink,profile.IdAction,action.Description,link.Controller,link.Description FROM `ProfileAdministration` profile INNER JOIN `Actions` action ON action.IdAction=profile.IdAction INNER JOIN `Links` link ON link.IdLink=profile.IdLink WHERE profile.IdProfile='$idProfile';";        
        $command = $connection->createCommand($sql);
        $dataReader = $command->queryAll();
        return $dataReader;
    }

    public function getIdMenu($links) {
       $connection = Yii::app()->db;
        $sql = "SELECT `IdLink` FROM `Links` WHERE `IdLink`='$links';";
        $command = $connection->createCommand($sql);
        $dataReader = $command->queryRow();
        return $dataReader;
    }

    public function getIdAccion($description) {
        $connection = Yii::app()->db;
        $sql = "SELECT `IdAction`,`TextDisplay` FROM `Actions` WHERE `Description` LIKE '%$description%';";
        $command = $connection->createCommand($sql);
        $dataReader = $command->queryRow();
        return $dataReader;
    }

    public function deleteProfileActions($idProfile) {
        $connection = Yii::app()->db;
        $sql = "DELETE FROM `ProfileAdministration` WHERE `IdProfile`='$idProfile';";
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        return $dataReader;
    }

    public function insertProfileActions($idProfile, $idMenu, $idLink, $idAction) {
        $connection = Yii::app()->db;
        $sql = "INSERT INTO `ProfileAdministration` (`IdProfile`,`IdMenu`,`IdLink`,`IdAction`) VALUES ('$idProfile','$idMenu','$idLink','$idAction');";
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        return $dataReader;
    }

    public function updateProfile($document, $idProfile) {

        $connection = Yii::app()->db; 
        $sql = "UPDATE `Administrador` SET `IdProfile`='$idProfile' WHERE `Cedula`='$document'";
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
    }

    public function getControllersLink() {
        $connection = Yii::app()->db;
        $sql = "SELECT * FROM `Links` ORDER BY `IdMenu`;";
        $command = $connection->createCommand($sql);
        $dataReader = $command->queryAll();
        return $dataReader;
    }

    public function getModulesLink() {
        $connection = Yii::app()->db; 
        $sql = "SELECT * FROM `Menu`;";
        $command = $connection->createCommand($sql);
        $dataReader = $command->queryAll();
        return $dataReader;
    }

    public function getModulesMenu($idProfile) {
       $connection = Yii::app()->db;
        $sql = "SELECT * FROM `ProfileAdministration` profile INNER JOIN `Menu` menu ON menu.IdMenu=profile.IdMenu WHERE profile.IdProfile='$idProfile' GROUP BY menu.IdMenu;";
        $command = $connection->createCommand($sql);
        $dataReader = $command->queryAll();
        return $dataReader;
    }

    public function deleteProfile($idProfile) {
        $connection = Yii::app()->db;
        $sql = "DELETE FROM `Profile` WHERE `IdProfile`='$idProfile';";
        $command = $connection->createCommand($sql);
        $command->query();
        return TRUE;
    }
}
