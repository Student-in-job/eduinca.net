<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
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
                $user = $this->findUser();
		
                if($user === null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($user->getAttribute('password') !== $this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}
        
        public function findUser()
        {
            $model = new User();
            $dbCriteria = new CDbCriteria();
            $dbCriteria->compare('login', $this->username);
            return $user = $model->find($dbCriteria);
        }
        
        public function getaccess()
        {
            $user = $this->findCode();
		
                if($user === null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($user->getAttribute('code') !== $this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
        }
        
        public function findCode()
        {
            $model = new Code();
            $dbCriteria = new CDbCriteria();
            $dbCriteria->compare('code', $this->password);
            return $user = $model->find($dbCriteria);
        }
}