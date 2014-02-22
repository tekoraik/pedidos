<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	
    public function authenticate()
    {
        $sEmpresaCondition = "";
        if (Yii::app()->empresa->getModel()) {
            $sEmpresaCondition =  "AND (id_empresa =". Yii::app()->empresa->getModel()->id. " OR id_empresa IS NULL)";
        }
        $oUsuario=Usuario::model()->find(
                array('condition' => "email='".$this->username . "' " . $sEmpresaCondition)
        );
        if($oUsuario===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($oUsuario->password !== crypt($this->password, $oUsuario->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->_id=$oUsuario->id;
            

            
            //$this->setState('title', $record->title);
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
    
    public function getId()
    {
        return $this->_id;
    }
}