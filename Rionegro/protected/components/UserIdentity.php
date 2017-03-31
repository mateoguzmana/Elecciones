<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    private $id;
    
    const ERROR_USERNAME_NOT_ACTIVE = 3;
    const ERROR_REGISTERED_USER_VOTE = 4;
    
    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        $users = Usuarios::model()->findByAttributes(array('CedulaAsociado' => $this->username));
        if ($users == null):
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        elseif ($this->isUserRegister()):
            $this->errorCode = self::ERROR_USERNAME_NOT_ACTIVE;
        else:
            $this->id = $users->CedulaAsociado;
            $this->setState('_name', $users->NombreIntegrado);
            $this->setState('_document', $users->CedulaAsociado);
            $this->setState('_idProfile', $users->IdPerfil);
            $this->errorCode = self::ERROR_NONE;
        endif;
        return $this->errorCode;
    }
    
    public function isUserRegister() {
        $doc = Candidatos::model()->findByAttributes(array('Documento' => $this->username));
        if ($doc == null):
            return false;
        else:
            return true;
        endif;
    }

    public function authenticateAdmin() {
        $users = Administrator::model()->findByAttributes(array('User' => $this->username));
        if($users==null):
                $this->errorCode = self::ERROR_USERNAME_INVALID;
            elseif($this->password !== $users->Password):
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            else:
                $this->id= $users->Id;
                $this->setState('_name', $users->Name);
                $this->setState('_document', $users->Document);
                $this->setState('_idProfile', $users->IdProfile);
                $this->errorCode = self::ERROR_NONE;               
            endif;
            return $this->errorCode;
    }
    
    public function authenticateVoting() {
        $users = Usuarios::model()->findByAttributes(array('CedulaAsociado' => $this->username));
        if($users==null):
                $this->errorCode = self::ERROR_USERNAME_INVALID;
            elseif($this->password !== $users->Password):
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            elseif($users->Estado == 1):
                $this->errorCode = self::ERROR_USERNAME_NOT_ACTIVE;
            elseif($users->Estado == 2):
                $this->errorCode = self::ERROR_REGISTERED_USER_VOTE;
            else:
                $this->id = $users->CedulaAsociado;
                $this->setState('_name', $users->NombreIntegrado);
                $this->setState('_document', $users->CedulaAsociado);
                $this->setState('_idProfile', $users->IdPerfil);
                $this->setState('_idZone', $users->CodZona);
                $this->errorCode = self::ERROR_NONE;
            endif;            
            return $this->errorCode;
    }

    public function authenticateFisicVotes() {
        $users = Usuarios::model()->findByAttributes(array('CedulaAsociado' => $this->username));
        if ($users == null):
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        elseif ($this->isUserRegister()):
            $this->errorCode = self::ERROR_USERNAME_NOT_ACTIVE;
        else:
            $this->id = $users->CedulaAsociado;
            $this->setState('_name', $users->NombreIntegrado);
            $this->setState('_document', $users->CedulaAsociado);
            $this->setState('_idProfile', $users->IdPerfil);
            $this->setState('_fisic', 1);
            $this->errorCode = self::ERROR_NONE;
        endif;
        return $this->errorCode;
    }

    public function getId()
    {
        return $this->id;
    }
}
