<?php

class CandidatosController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
//        return array(
////			array('allow',  // allow all users to perform 'index' and 'view' actions
////				'actions'=>array('index','view'),
////				'users'=>array('*'),
////			),
//            array('allow', // allow authenticated user to perform 'create' and 'update' actions
//                'actions' => array('index', 'view', 'create', 'update'),
//                'users' => array('@'),
//            ),
//            array('allow', // allow admin user to perform 'admin' and 'delete' actions
//                'actions' => array('admin', 'delete'),
//                'users' => array('admin'),
//            ),
//            array('deny', // deny all users
//                'users' => array('*'),
//            ),
//        );
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $this->redirect("index.php?r=site/timeOut");
        Yii::app()->clientScript->registerScriptFile(
                Yii::app()->baseUrl . '/js/candidatos/candidatos.js', CClientScript::POS_END
        );
        $model = new Candidatos;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Candidatos'])) {
            $model->attributes = $_POST['Candidatos'];
            $finalName = "";
            $image = CUploadedFile::getInstance($model, 'Foto');
            if (count($image) === 1):
                $imageName = strtolower($image->name);
                $buscar = array(' ', 'Ã±', 'Ã¡', 'Ã©', 'Ã­', 'Ã³', 'Ãº');
                $remplazar = array('-', 'n', 'a', 'e', 'i', 'o', 'u');
                $aleatorio = rand(100000, 999999);
                $finalName = $aleatorio . str_replace($buscar, $remplazar, $imageName);
            endif;
            $model->Foto = $finalName;
            if ($model->save()) {
                if ($finalName != ""):
                    $path = Yii::getPathOfAlias('webroot') . '/Archivos/Fotos/' . $finalName;
                    $model->Foto->saveAs($path);
                endif;
                $this->redirect(array('index'));
            }
        }
        $this->render('create', array('model' => $model,));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate() {
        $this->redirect("index.php?r=site/timeOut");
        Yii::app()->clientScript->registerScriptFile(
                Yii::app()->baseUrl . '/js/candidatos/candidatos.js', CClientScript::POS_END
        );
        if ($_GET):
            $id = $_GET['IdCandidato'];
            $model = $this->loadModel($id);

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if (isset($_POST['Candidatos'])) {
                $model->attributes = $_POST['Candidatos'];
                $finalName = "";
                $image = CUploadedFile::getInstance($model, 'Foto');
                if (count($image) === 1):
                    $imageName = strtolower($image->name);
                    $buscar = array(' ', 'Ã±', 'Ã¡', 'Ã©', 'Ã­', 'Ã³', 'Ãº');
                    $remplazar = array('-', 'n', 'a', 'e', 'i', 'o', 'u');
                    $aleatorio = rand(100000, 999999);
                    $finalName = $aleatorio . str_replace($buscar, $remplazar, $imageName);
                endif;
                $model->Foto = $finalName;
                if ($model->save()) {
                    if ($finalName != ""):
                        $path = Yii::getPathOfAlias('webroot') . '/Archivos/Fotos/' . $finalName;
                        $model->Foto->saveAs($path);
                    endif;
                    $this->redirect(array('index'));
                }
            }
            $this->render('update', array('model' => $model,));
        else:
            $model = new Candidatos('search');
            $model->unsetAttributes();  // clear any default values
            if (isset($_GET['Candidatos']))
                $model->attributes = $_GET['Candidatos'];
            $this->render('Candidatos', array('model' => $model,));
        endif;
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->redirect("index.php?r=site/timeOut");
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        Yii::app()->clientScript->registerScriptFile(
                Yii::app()->baseUrl . '/js/candidatos/candidatos.js', CClientScript::POS_END
        );
        $model = new Candidatos('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Candidatos']))
            $model->attributes = $_GET['Candidatos'];

        $this->render('Candidatos', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Candidatos the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Candidatos::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Candidatos $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'candidatos-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionIndex() {
        $this->redirect("index.php?r=site/timeOut");
        Yii::app()->clientScript->registerScriptFile(
                Yii::app()->baseUrl . '/js/candidatos/candidatos.js', CClientScript::POS_END
        );
        $respuesta = Candidatos::model()->consulta_eleccion();
        $cedula = Yii::app()->user->_cedula;
        $respuesta_usuarios = Candidatos::model()->consultar_datos($cedula);
        $respuesta_barrio = Candidatos::model()->consultar_barrio();

        $this->render('index', array('filaeleccion' => $respuesta, 'fila_usuarios' => $respuesta_usuarios, 'barrio' => $respuesta_barrio));
    }

    public function actionAjaxConsultaRegion() {

        $respuesta = Candidatos::model()->consulta_region($_POST["elegido"]);

        //$this->renderPartial('index',  array('texto' => $respuesta_textos));
        $this->renderPartial('combo_region', array('consulta' => $respuesta));
    }

    public function actionAjaxRadicado() {

        $respuesta = Candidatos::model()->consulta_radicado($_POST["elegido"]);

        $this->renderPartial('radicad', array('consulta' => $respuesta));
    }

    public function sendMail($mailDestino, $nombreDestinatario, $subject, $htmlBody, $attachment) {
        Yii::import('application.extensions.phpmailer.JPhpMailer');
        $mail = new JPhpMailer;
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;
        $mail->Username = 'desarrollo7activity@gmail.com';
        $mail->Password = 'activity123';
        $mail->From = utf8_decode('fundacioncooperen@gmail.com');
        $mail->FromName = utf8_decode('Fundación Cooperen <fundacioncooperen@gmail.com>');
        $mail->AddReplyTo('omedios@cootramed.com.co', 'Walter A. Castrillon');
        $mail->AddAddress($mailDestino, $nombreDestinatario);
        $mail->WordWrap = 50;
        $mail->isHTML(true);
        $mail->Subject = utf8_decode($subject);
        $mail->Body = utf8_decode($htmlBody);
        $mail->AltBody = utf8_decode($subject);
        if ($attachment != ""):
            $mail->AddAttachment($attachment);
        endif;
        if ($mail->Send()) {
            //SE ENVIO
            return "OK";
        } else {
            //NO SE ENVIO
            return "NO";
        }
    }

    public function actionguardar() {
        $eleccion = $_POST["eleccion"];
        $region = $_POST["region"];
        $fechainscricion = $_POST["fechainscricion"];
        $nombres = $_POST["nombres"];
        $apellidos = $_POST["apellidos"];
        $codigo_candidato = $_POST["codigo_candidato"];
        $nro_documento = $_POST["nro_documento"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $email = $_POST["email"];
        $foto = date('H:i:s') . basename($_FILES['foto']['name']);
        $celular = $_POST["celular"];
        $barrio = $_POST["barrio"];
        $encabezado = $_POST["encabezado"];

        //CONSULTAMOS RADICADO
        $radicado = Candidatos::model()->getRadicated($eleccion);
        $target_path = "Archivos/Fotos/";
        $target_path = $target_path . date('H:i:s') . basename($_FILES['foto']['name']);

        if (date('H:i:s') . move_uploaded_file($_FILES['foto']['tmp_name'], $target_path)) {
            
        }



        Candidatos::model()->guardar($eleccion, $region, $fechainscricion, $radicado, $nombres, $apellidos, $codigo_candidato, $nro_documento, $direccion, $telefono, $email, $foto, $celular, $barrio);
        //SE DEBE CONSTRUIR UNA VARIABLE CON EL HTML DEL BODY PARA EL EMAIL
        $nombreEleccion = 'ELECCION DELEGADOS COOTRAMED 2015-2016';
        $subject = utf8_encode('Acta inscripcion - ' . $nombreEleccion); //CONSULTAR EL NOMBRE DE LA ELECCION USANDO EL ID
        //   $subject=$encabezado;
        $htmlBody = utf8_encode('Fecha Inscripcion: ' . $fechainscricion . '<br>');
        $htmlBody .= utf8_encode('Nombres: ' . $nombres . '<br>');
        $htmlBody .= utf8_encode('Documento: ' . $nro_documento . '<br>');
        $htmlBody .= utf8_encode('Radicado: ' . $radicado . '<br>');
        $htmlBody .= utf8_encode('Codigo Candidato: ' . $codigo_candidato . '<br>');
        $htmlBody .= utf8_encode('Direccion: ' . $direccion . '<br>');
        $htmlBody .= utf8_encode('Telefono: ' . $telefono . '<br>');
        $htmlBody .= utf8_encode('Celular: ' . $celular . '<br>');

        $checkSend = $this->sendMail($email, utf8_decode($nombres), $subject, $htmlBody, $target_path);

        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
        /* if ($checkSend == "OK"):
          header("Location: http://cooperen.datosmovil.info/Cooperen/index.php?r=Candidatos/Index");
          else:
          header("Location: index.php?r=Site/Inicio");
          endif;
          /* $this->render('index'); */
    }

    public function actionExcelExport() {
        $TotalCandidatos = Candidatos::model()->getAllCandidate();
        $this->renderPartial('_ExcelCandidatos',array('TotalCandidatos'=>$TotalCandidatos));
    }
    
}
