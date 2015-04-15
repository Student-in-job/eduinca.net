<?php

/**
 * This is the model class for table "tbl_survey_in_university".
 *
 * The followings are the available columns in table 'tbl_survey_in_university':
 * @property integer $id_survey_in_university
 * @property integer $survey_id
 * @property integer $university_id
 * @property integer $user_id
 * @property integer $university_type_id
 * @property integer $teachers_num
 * @property integer $students_num
 * @property integer $involved_teachers
 * @property integer $involved_students
 *
 * The followings are the available model relations:
 * @property Code[] $codes
 * @property Survey $survey
 * @property University $university
 * @property User $user
 * @property UniversityType $universityType
 */
class SurveyInUniversity extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_survey_in_university';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('survey_id, university_id, user_id, university_type_id, teachers_num, students_num, involved_teachers, involved_students','required'),
			array('survey_id, university_id, user_id, university_type_id, teachers_num, students_num, involved_teachers, involved_students', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_survey_in_university, survey_id, university_id, user_id, university_type_id, teachers_num, students_num, involved_teachers, involved_students', 'safe', 'on'=>'search'),
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
			'codes' => array(self::HAS_MANY, 'Code', 'survey_in_university_id'),
			'survey' => array(self::BELONGS_TO, 'Survey', 'survey_id'),
			'university' => array(self::BELONGS_TO, 'University', 'university_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'universityType' => array(self::BELONGS_TO, 'UniversityType', 'university_type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_survey_in_university' => 'Id',
			'survey_id' => Yii::t('site','survey'),
			'university_id' => Yii::t('survey', 'educational'),
			'user_id' => Yii::t('survey', 'user'),
			'university_type_id' => Yii::t('university', 'type'),
			'teachers_num' => Yii::t('survey', 'teachersNum'),
			'students_num' => Yii::t('survey', 'studentsNum'),
			'involved_teachers' => Yii::t('survey', 'teachersInvolved'),
			'involved_students' => Yii::t('survey', 'studentsInvolved'),
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

		$criteria->compare('id_survey_in_university',$this->id_survey_in_university);
		$criteria->compare('survey_id',$this->survey_id);
		$criteria->compare('university_id',$this->university_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('university_type_id',$this->university_type_id);
		$criteria->compare('teachers_num',$this->teachers_num);
		$criteria->compare('students_num',$this->students_num);
		$criteria->compare('involved_teachers',$this->involved_teachers);
		$criteria->compare('involved_students',$this->involved_students);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SurveyInUniversity the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function getHasCodes()
        {
            $criteria = new CDbCriteria();
            $criteria->compare('survey_in_university_id', $this->id_survey_in_university);
            $dataProvider = new CActiveDataProvider('Code', array('criteria' => $criteria));
            return ($dataProvider->totalItemCount>0)?true:false;
        }
}
