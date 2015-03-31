<?php

/**
 * This is the model class for table "tbl_code".
 *
 * The followings are the available columns in table 'tbl_code':
 * @property integer $id_code
 * @property string $code
 * @property integer $completed
 * @property string $completed_date
 * @property integer $survey_in_university_id
 *
 * The followings are the available model relations:
 * @property SurveyInUniversity $surveyInUniversity
 */
class Code extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_code';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('completed, survey_in_university_id', 'numerical', 'integerOnly'=>true),
			array('code', 'length', 'max'=>20),
			array('completed_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_code, code, completed, completed_date, survey_in_university_id', 'safe', 'on'=>'search'),
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
			'surveyInUniversity' => array(self::BELONGS_TO, 'SurveyInUniversity', 'survey_in_university_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_code' => 'Id Code',
			'code' => 'Code',
			'completed' => 'Completed',
			'completed_date' => 'Completed Date',
			'survey_in_university_id' => 'Survey In University',
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

		$criteria->compare('id_code',$this->id_code);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('completed',$this->completed);
		$criteria->compare('completed_date',$this->completed_date,true);
		$criteria->compare('survey_in_university_id',$this->survey_in_university_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Code the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
