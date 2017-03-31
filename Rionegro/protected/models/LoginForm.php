<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel {

    public $username;
    public $password;
    public $rememberMe;
    private $_identity;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            // username and password are required
            //array('username, password', 'required'),
            array('username', 'required'),
            // rememberMe needs to be a boolean
            array('rememberMe', 'boolean'),
            // password needs to be authenticated
            array('password', 'authenticate'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'rememberMe' => 'No cerrar sesión',
            'username'   => 'Cédula',
            'username2'  => 'Usuario',
            'password'   => 'Contraseña'
        );
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function authenticate() {
        if (!$this->hasErrors()):
            $this->_identity = new UserIdentity($this->username, $this->password);
            if($this->_identity->authenticate() == 1):
                $this->addError('username','Cédula no registrada.');
            elseif($this->_identity->authenticate() == 3):
                $this->addError('username', 'El candidato ya se encuentra registrado.');
            endif;
        endif;
    }

    /**
     * Authenticates the administrator's users.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function authenticateAdmin() {
        if (!$this->hasErrors()):
            $this->_identity = new UserIdentity($this->username, $this->password);
            $validation = $this->_identity->authenticateAdmin();
            if ($validation == 1):
                $this->addError('password','Usuario o clave incorrecta.');
                return false;
            elseif($validation == 2):
                $this->addError('password', 'Usuario o clave incorrecta.');
                return false;
            else:
                $duration = $this->rememberMe ? 3600 * 24 * 30 : 0;
                Yii::app()->user->login($this->_identity, $duration);
                return true;
            endif;
        endif;
    }

    /**
     * Authenticates the voting users.
     */
    public function authenticateVoting() {
        if (!$this->hasErrors()):
            $this->_identity = new UserIdentity($this->username, $this->password);
            $validation = $this->_identity->authenticateVoting();
            switch ($validation):
                case 1:
                case 2:
                    $this->addError('error','Usuario o clave incorrecta.');
                    return false;
                case 3:
                    $this->addError('error', 'Este usuario ya realizó su votación.');
                    return false;
                case 4:
                    $this->addError('error', 'Este usuario realizó voto físico.');
                    return false;
                default:
                    $duration = $this->rememberMe ? 3600 * 24 * 30 : 0;
                    Yii::app()->user->login($this->_identity, $duration);
                    return true;
            endswitch;
        endif;
    }

    /**
     * Authenticates for Fisic Votes.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function authenticateFisicVotes() {
        if (!$this->hasErrors()):
            $this->_identity = new UserIdentity($this->username, $this->password);
            $validation = $this->_identity->authenticateFisicVotes();
            if ($validation == 1):
                $this->addError('error','Cédula no registrada.');
                return false;
            elseif($validation == 3):
                $this->addError('error', 'Usted es un candidato registrado, por lo que no se le permite el ingreso a este modulo.');
                return false;
            else:
                $duration = $this->rememberMe ? 3600 * 24 * 30 : 0;
                Yii::app()->user->login($this->_identity, $duration);
                return true;
            endif;
        endif;
    }

    /**
     * Logs in the user using the given username and password in the model.
     * @return boolean whether login is successful
     */
    public function login() {
        if ($this->_identity === null):
            $this->_identity = new UserIdentity($this->username, $this->password);
            $this->_identity->authenticate();
        endif;
        if ($this->_identity->errorCode === UserIdentity::ERROR_NONE):
            $duration = $this->rememberMe ? 3600 * 24 * 30 : 0; // 30 days
            Yii::app()->user->login($this->_identity, $duration);
            return true;
        else:
            return false;
        endif;
    }

    /*
     * Date Validation for Election
     */
    public function dateValidation() {
        $getDateCurrentElection = Votacion::model()->getDateCurrentElection();
        $now = new DateTime();
        $startDate = new DateTime($getDateCurrentElection['FechaInicio']);
        $endDate = new DateTime($getDateCurrentElection['FechaFin']);
        if ($startDate < $now && $now < $endDate):
            return true;
        elseif ($startDate > $now && $now < $endDate):
            $interval = $startDate->diff($now);
            $message = $interval->format('Faltan %d dia(s) %h hora(s) %i minuto(s) para el inicio de la votación.');
            $this->addError('error',$message);
            return false;
        elseif ($startDate < $now && $now > $endDate):
            $interval = $startDate->diff($now);
            $message = $interval->format('%d dia(s) %h hora(s) %i minuto(s) desde el fín de la votación.');
            $this->addError('error',$message);
            return false;
        else:
            return false;
        endif;
    }
}
