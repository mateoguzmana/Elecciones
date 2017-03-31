<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'view', 'create', 'update', 'votacion'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        $this->redirect("index.php?r=site/votacion");
        $session = new CHttpSession;
        $session->open();

        $this->layout = 'login';
        $model = new LoginForm;

        //COLLECT USER INPUT DATA
        if (isset($_POST['LoginForm'])):
            $model->attributes = $_POST['LoginForm'];
            //VALIDATE USER INPUT AND REDIRECT TO CORRECT PAGE IF VALID
            if ($model->validate() && $model->login()):
                $this->redirect(array('Candidatos/Index'));
            else:
                $this->render('login', array('model' => $model));
            endif;

        else:
            Yii::app()->user->logout();
            $this->render('login', array('model' => $model));
        endif;
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionAdmin() {
        $session = new CHttpSession;
        $session->open();
        $this->layout = 'login';
        $model = new LoginForm;
        //COLLECT USER INPUT DATA
        if (isset($_POST['LoginForm'])):
            $model->attributes = $_POST['LoginForm'];
            //VALIDATE USER INPUT AND REDIRECT TO CORRECT PAGE IF VALID
            if ($model->authenticateAdmin()):
                if (Yii::app()->user->_idProfile == 3):
                    $message = "Delegado : " . $model->username;
                    Yii::log($message,'fisicVotes','loggin');
                    $this->redirect(array('votacion/registrarvotacionfisica'));
                else:
                    $this->redirect(array('candidatos/admin'));
                endif;
            else:
                $this->render('loginAdmin', array('model' => $model));
            endif;
        else:
            Yii::app()->user->logout();
            $this->render('loginAdmin', array('model' => $model));
        endif;
    }

    public function actionVotacion() {
        $session = new CHttpSession;
        $session->open();
        $this->layout = 'login';
        $model = new LoginForm;
//        //IF IT IS AJAX VALIDATION REQUEST
//        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form'):
//            echo CActiveForm::validate($model);
//            Yii::app()->end();
//        endif;
        //COLLECT USER INPUT DATA
        if (isset($_POST['LoginForm'])):
            $model->attributes = $_POST['LoginForm'];
            //VALIDATE USER INPUT AND REDIRECT TO THE PREVIOUS PAGE IF VALID
            if ($model->dateValidation() && $model->authenticateVoting()):
                $this->redirect(array('votacion/elejirCandidato'));
            else:
                $this->render('loginVoting', array('model' => $model));
            endif;
        else:
            Yii::app()->user->logout();
            $this->render('loginVoting', array('model' => $model));
        endif;
    }

    public function actionInicio() {
        $this->render('index');
    }

    public function actionTimeOut() {
        $this->layout = 'main';
        $this->render('_timeOut');
    }

    public function actionVotoFisico() {
        $model = new LoginForm;
        //IF IT IS AJAX VALIDATION REQUEST
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form'):
            echo CActiveForm::validate($model);
            Yii::app()->end();
        endif;
        //COLLECT USER INPUT DATA
        if (isset($_POST['LoginForm'])):
            $model->attributes = $_POST['LoginForm'];
            //VALIDATE USER INPUT AND REDIRECT TO THE PREVIOUS PAGE IF VALID
            if ($model->authenticateFisicVotes()):
                $message = "Usuario : " . $model->username;
                Yii::log($message,'fisicVotes','loggin');
                $this->redirect(array('votacion/votoFisico'));
            endif;
        endif;
        //DISPLAY THE LOGIN FORM
        $this->layout = 'login';
        $this->render('loginFisicVotes', array('model' => $model));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        $error = Yii::app()->errorHandler->error;
        if ($error):
            if (Yii::app()->request->isAjaxRequest):
                echo $error['message'];
            else:
                $this->render('error', $error);
            endif;
        endif;
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;
        //IF IT IS AJAX VALIDATION REQUEST
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form'):
            echo CActiveForm::validate($model);
            Yii::app()->end();
        endif;
        // Collect user form input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            //VALIDATE USER INPUT AND REDIRECT TO THE PREVIOUS PAGE IF VALID
            if ($model->validate() && $model->login()):
                $this->redirect(array('candidatos/index'));
            endif;
        }
        // Display login form
        $this->layout = 'login';
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        if(!Yii::app()->user->isGuest):
            $idProfile = Yii::app()->user->_idProfile;
            if (isset(Yii::app()->user->_fisic)):
                $isFisic = 1;
                $user = Yii::app()->user->_document;
            endif;
            Yii::app()->user->logout();
            SiteController::specificRedirect($idProfile, $isFisic, $user);
        else:
            $this->redirect('index.php?r=site/votacion');
        endif;
    }

    protected function specificRedirect($idProfile, $isFisic, $user) {
        if ($idProfile == 0):
            if (isset($isFisic)):
                $message = "Usuario : " . $user;
                Yii::log($message,'fisicVotes','logout');
                $this->redirect('index.php?r=site/votofisico');
            else:
                $this->redirect('index.php?r=site/votacion');
            endif;
        elseif ($idProfile == 1):
            $this->redirect('index.php?r=site/admin');
        elseif ($idProfile == 3):
            $message = "Delegado : " . $user;
            Yii::log($message,'fisicVotes','logout');
            $this->redirect('index.php?r=site/admin');
        else:
            $this->redirect('index.php?r=site/admin');
        endif;
    }
}
