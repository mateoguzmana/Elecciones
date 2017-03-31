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
    public function authenticate($attribute, $params) {
        if (!$this->hasErrors()) {
            $this->_identity = new UserIdentity($this->username, $this->password);
            if($this->_identity->authenticate() == 1)
            {
                $this->addError('username','Cédula no registrada.');
            }
            else if($this->_identity->authenticate() == 3)
            {
                $this->addError('username', 'El candidato ya se encuentra registrado.');
            }
        }
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function authenticateAdmin() {
        if (!$this->hasErrors()) {
            $this->_identity = new UserIdentity($this->username, $this->password);
            $this->_identity->authenticateAdmin();
            if($this->_identity->authenticateAdmin() == 1)
            {
                $this->addError('password','Usuario o clave incorrecta.');
                return false;
            }
            else if($this->_identity->authenticateAdmin() == 2)
            {
                $this->addError('password', 'Usuario o clave incorrecta.');
                return false;
            }
            else
            {
                $duration = $this->rememberMe ? 3600 * 24 * 30 : 0;
                Yii::app()->user->login($this->_identity, $duration);
                return true;
            }
        }
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function authenticateVoting() {
        if (!$this->hasErrors()) {
            $this->_identity = new UserIdentity($this->username, $this->password);
            if($this->_identity->authenticateVoting() == 1)
            {
                $this->addError('password','Usuario o clave incorrecta.');
                return false;
            }
            else if($this->_identity->authenticateVoting() == 2)
            {
                $this->addError('password', 'Usuario o clave incorrecta.');
                return false;
            }
            else if($this->_identity->authenticateVoting() == 3)
            {
                $this->addError('username', 'Este usuario ya realizó votación.');
                return false;
            }
            else
            {
                $duration = $this->rememberMe ? 3600 * 24 * 30 : 0;
                Yii::app()->user->login($this->_identity, $duration);
                return true;
            }
        }
    }
    
    /**
     * Logs in the user using the given username and password in the model.
     * @return boolean whether login is successful
     */
    public function login() {
        if ($this->_identity === null) {
            $this->_identity = new UserIdentity($this->username, $this->password);
            $this->_identity->authenticate();
        }
        if ($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
            $duration = $this->rememberMe ? 3600 * 24 * 30 : 0; // 30 days
            Yii::app()->user->login($this->_identity, $duration);
            return true;
        } else {
            return false;
        }
    }

    /**
     * Logs in the user using the given username and password in the model.
     * @return boolean whether login is successful
     */
    public function loginAdmin() {
        if ($this->_identity === null) {
            $this->_identity = new UserIdentity($this->username, $this->password);
            $this->_identity->authenticateAdmin();
        }
        if ($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
            $duration = $this->rememberMe ? 3600 * 24 * 30 : 0; // 30 days
            Yii::app()->user->login($this->_identity, $duration);
            return true;
        } else {
            return false;
        }
    }

    
    /**
     * Logs in the user using the given username and password in the model.
     * @return boolean whether login is successful
     */
    public function loginVoting() {
        if ($this->_identity === null) {
            $this->_identity = new UserIdentity($this->username, $this->password);
            $this->_identity->authenticateVoting();
        }
        if ($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
            $duration = $this->rememberMe ? 3600 * 24 * 30 : 0; // 30 days
            Yii::app()->user->login($this->_identity, $duration);
            return true;
        } else {
            return false;
        }
    }
}
