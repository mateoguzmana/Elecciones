<?php

class EleccionesController extends Controller {

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
        //if (!Yii::app()->getUser()->hasState('_document')) {
        //    $this->redirect('index.php');
        //}

        $document = Yii::app()->user->_document;
        $Criteria = new CDbCriteria();
        $Criteria->condition = "Cedula = $document";
        $idProfile = Yii::app()->user->_idProfile;
        $controllers = Yii::app()->controller->getId();
        $actionsProfile = Consult::model()->getActionsProfile($idProfile, $controllers);
        $actionStatus = new JAction();

        try {
            $actionAjax = $actionStatus->getActions(ucfirst($controllers) . 'Controller', '');
        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        }
        
        $actions = array();
        foreach ($actionsProfile as $itemAction) {
            array_push($actions, $itemAction['Description']);
        }
        
        foreach ($actionAjax as $item) {
            $data = strtolower('ajax' . $item);
            array_push($actions, $data);
        }

        $arrayAction = Links::model()->findProfile(ucfirst($controllers), $idProfile);
        $arrayDifferences = $actionStatus->diffActions(ucfirst($controllers) . 'Controller', '', $arrayAction);

        $session = new CHttpSession;
        $session->open();
        $session['differences'] = $arrayDifferences;
               
        if (count($actions) <= 0) {
            return array(
                array('deny',
                    'users' => array('*'),
                ),
            );
        } else {
            return array(
                array('allow',
                    'actions' => $actions,
                    'users' => array('@'),
                ),
                array('deny',
                    'users' => array('*'),
                ),
            );
        }
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        Yii::app()->clientScript->registerScriptFile(
                Yii::app()->baseUrl . '/js/elecciones/elecciones.js', CClientScript::POS_END
        );
        $model = new Elecciones;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Elecciones'])) {
            $model->attributes = $_POST['Elecciones'];
            $finalName = "";
            $image = CUploadedFile::getInstance($model,'Logotipo');
            if (count($image) === 1):
                $imageName = strtolower($image->name);
                $buscar = array(' ','ñ','á','é','í','ó','ú');
                $remplazar = array('-','n','a','e','i','o','u');
                $aleatorio = rand(100000, 999999);
                $finalName = $aleatorio . str_replace($buscar,$remplazar,$imageName);
            endif;
            $model->Logotipo = CUploadedFile::getInstance($model,'Logotipo');
            if ($model->save())
            {
                if ($finalName != ""):
                    $path = Yii::getPathOfAlias('webroot') . '/Archivos/Logotipos/' . $finalName;
                    $model->Logotipo->saveAs($path);
                endif;
                $dataProvider = new CActiveDataProvider('Elecciones');
                $this->redirect(array('Index'));
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
        Yii::app()->clientScript->registerScriptFile(
                Yii::app()->baseUrl . '/js/elecciones/elecciones.js', CClientScript::POS_END
        );
        if($_GET):
            $id = $_GET['IdEleccion'];
            $model = $this->loadModel($id);
            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if (isset($_POST['Elecciones'])) {
                $model->attributes = $_POST['Elecciones'];
                $finalName = "";
                $image = CUploadedFile::getInstance($model,'Logotipo');
                if (count($image) === 1):
                    $imageName = strtolower($image->name);
                    $buscar = array(' ','ñ','á','é','í','ó','ú');
                    $remplazar = array('-','n','a','e','i','o','u');
                    $aleatorio = rand(100000, 999999);
                    $finalName = $aleatorio . str_replace($buscar,$remplazar,$imageName);
                endif;
                $model->Logotipo = CUploadedFile::getInstance($model,'Logotipo');
                if ($model->save())
                {
                    if ($finalName != ""):
                        $path = Yii::getPathOfAlias('webroot') . '/Archivos/Logotipos/' . $finalName;
                        $model->Logotipo->saveAs($path);
                    endif;
                    $this->redirect(array('Index'));
                }
            }
            $this->render('update', array('model' => $model,));
        else:
            $model = new Elecciones('search');
            $model->unsetAttributes();  // clear any default values
            if (isset($_GET['Elecciones']))
            {
                $model->attributes = $_GET['Elecciones'];
            }
            $this->render('Elecciones', array(
                'model' => $model,
            ));
        endif;
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
//    public function actionIndex() {
//        $dataProvider = new CActiveDataProvider('Elecciones');
//        $this->render('index', array(
//            'dataProvider' => $dataProvider,
//        ));
//    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Elecciones('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Elecciones']))
            $model->attributes = $_GET['Elecciones'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Elecciones the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Elecciones::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Elecciones $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'elecciones-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionIndex() {
        Yii::app()->clientScript->registerScriptFile(
                Yii::app()->baseUrl . '/js/elecciones/elecciones.js', CClientScript::POS_END
        );
        $model = new Elecciones('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Elecciones']))
        {
            $model->attributes = $_GET['Elecciones'];
        }
        $this->render('Elecciones', array(
            'model' => $model,
        ));
    }
}
