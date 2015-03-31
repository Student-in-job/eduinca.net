<?php

/**
 * This is the model class for table "tbl_survey".
 *
 * The followings are the available columns in table 'tbl_survey':
 * @property integer $id_survey
 * @property string $name_ru
 * @property string $name_en
 * @property integer $year
 * @property string $date_till
 *
 * The followings are the available model relations:
 * @property SurveyInUniversity[] $surveyInUniversities
 */
class Survey extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_survey';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('year', 'numerical', 'integerOnly'=>true),
			array('name_ru, name_en', 'length', 'max'=>200),
			array('date_till', 'safe'),
                        array('year, name_ru, name_en, date_till', 'required'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_survey, name_ru, name_en, year, date_till', 'safe', 'on'=>'search'),
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
			'surveyInUniversities' => array(self::HAS_MANY, 'SurveyInUniversity', 'survey_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_survey' => Yii::t('survey','id_survey'),
			'name_ru' => Yii::t('survey','name_ru'),
			'name_en' => Yii::t('survey','name_en'),
			'year' => Yii::t('survey','year'),
			'date_till' => Yii::t('survey','date_till'),
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

		$criteria->compare('id_survey',$this->id_survey);
		$criteria->compare('name_ru',$this->name_ru,true);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('year',$this->year);
		$criteria->compare('date_till',$this->date_till,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Survey the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
