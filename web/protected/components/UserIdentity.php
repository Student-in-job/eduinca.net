<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
        const ERROR_CODE_INVALID = 4;
        const ERROR_CODE_USED = 5;
        const ERROR_DATE_EXPIRED = 6;
        const ERROR_UNKNOWN_IDENTITY = 200;
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
            $code = $this->findCode();
            
            if($code === null)
            {
                $this->errorCode = self::ERROR_CODE_INVALID;
            }
            elseif($code->GetAttribute('completed') != 0)
            {
                $this->errorCode = self::ERROR_CODE_USED;
            }
            else
            {
                $survey_in_uiversity = SurveyInUniversity::model()->findByPk($code->getAttribute('survey_in_university_id'));
                $survey = Survey::model()->findByPk($survey_in_uiversity->getAttribute('survey_id'));
                if($survey->getAttribute('date_till') < date('Y-m-d'))
                {
                    $this->errorCode = self::ERROR_DATE_EXPIRED;
                }
                else
                {
                    $this->errorCode = self::ERROR_NONE;
                }
            }
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