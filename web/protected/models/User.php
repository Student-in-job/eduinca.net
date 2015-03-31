<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $id_user
 * @property string $name
 * @property integer $age
 * @property string $email
 * @property integer $role_id
 * @property string $password
 * @property string $last_login
 * @property string $login
 *
 * The followings are the available model relations:
 * @property SurveyInUniversity[] $surveyInUniversities
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('age, role_id', 'numerical', 'integerOnly'=>true),
			array('name, email', 'length', 'max'=>100),
                        array('email', 'email'),
			array('password, login', 'length', 'max'=>15),
			array('last_login', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_user, name, age, email, role_id, password, last_login, login', 'safe', 'on'=>'search'),
                        array('login, password, name, email', 'required'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'surveyInUniversities' => array(self::HAS_MANY, 'SurveyInUniversity', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_user' => Yii::t('user', 'id_user'),
			'name' => Yii::t('user', 'name'),
			'age' => Yii::t('user', 'age'),
			'email' => Yii::t('user', 'email'),
			'role_id' => Yii::t('user', 'role_id'),
			'password' => Yii::t('user', 'password'),
			'last_login' => Yii::t('user', 'last_login'),
			'login' => Yii::t('user', 'login'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('last_login',$this->last_login,true);
		$criteria->compare('login',$this->login,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
