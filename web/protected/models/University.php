<?php

/**
 * This is the model class for table "tbl_university".
 *
 * The followings are the available columns in table 'tbl_university':
 * @property integer $id_university
 * @property string $code
 * @property string $name_ru
 * @property string $name_en
 * @property integer $university_type_id
 * @property integer $country_id
 *
 * The followings are the available model relations:
 * @property AnswerTeacher[] $answerTeachers
 * @property Country $country
 * @property UniversityType $universityType
 */
class University extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_university';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_university, name_ru, name_en', 'required'),
			array('id_university, university_type_id, country_id', 'numerical', 'integerOnly'=>true),
			array('code', 'length', 'max'=>20),
                        array('name_ru, name_en', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_university, code, name_ru, name_en, university_type_id, country_id', 'safe', 'on'=>'search'),
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
			'answerTeachers' => array(self::HAS_MANY, 'AnswerTeacher', 'university_id'),
			'country' => array(self::BELONGS_TO, 'Country', 'country_id'),
			'universityType' => array(self::BELONGS_TO, 'UniversityType', 'university_type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_university' => Yii::t('university','id'),
			'code' => Yii::t('university','code'),
			'name_ru' => Yii::t('university','name_ru'),
                        'name_en' => Yii::t('university','name_en'),
			'university_type_id' => Yii::t('university','university_type'),
			'country_id' => Yii::t('university', 'country'),
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

		$criteria->compare('id_university',$this->id_university);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('name_ru',$this->name_ru,true);
                $criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('university_type_id',$this->university_type_id);
		$criteria->compare('country_id',$this->country_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return University the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
