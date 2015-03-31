<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class CodeForm extends CFormModel
{
	public $username = 'participant';
	public $code;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('code', 'required'),
			// password needs to be authenticated
			array('code', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
                    'code' => Yii::t('site', 'code'),
                );
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->username,$this->code);
			if(!$this->_identity->getaccess())
				$this->addError('code',Yii::t('site', 'errcode'));
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->code);
			$this->_identity->getaccess();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			//$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,0);
                        //$user = $this->_identity->findUser();
                        //$user->setAttribute('last_login', date('Y-m-d'));
                        //$user->save();
                        
			return true;
		}
		else
			return false;
	}
}
