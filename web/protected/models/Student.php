<?php

/**
 * This is the model class for table "tbl_answer_student".
 *
 * The followings are the available columns in table 'tbl_answer_student':
 * @property integer $id_answer
 * @property string $code
 * @property integer $year
 * @property integer $age
 * @property integer $sex
 * @property string $faculty
 * @property string $speciality
 * @property integer $diploma
 * @property string $study_from
 * @property string $study_till
 * @property integer $course
 * @property integer $common_q1
 * @property integer $common_q2
 * @property integer $common_q3
 * @property integer $common_q4
 * @property integer $common_q5
 * @property integer $common_q6
 * @property integer $common_q7
 * @property integer $common_q8
 * @property integer $common_q9
 * @property integer $common_q10
 * @property integer $common_q11
 * @property string $common_comment
 * @property integer $methodic_q1
 * @property integer $methodic_q2
 * @property integer $methodic_q3
 * @property integer $methodic_q4
 * @property integer $methodic_q5
 * @property integer $methodic_q6
 * @property integer $methodic_q7
 * @property integer $methodic_q8
 * @property integer $methodic_q9
 * @property integer $methodic_q10
 * @property integer $methodic_q11
 * @property integer $methodic_q12
 * @property integer $methodic_q13
 * @property integer $methodic_q14
 * @property string $methodic_comment
 * @property integer $labs
 * @property integer $num_labs
 * @property integer $labs_comment
 * @property integer $practice
 * @property string $practice_place
 * @property integer $practice_duration
 * @property string $practice_comment
 * @property integer $university_id
 * @property integer $person_type_id
 * @property integer $involved_person_id
 * @property integer $diploma_aspects
 * @property integer $diploma_research
 * @property integer $private_comments
 *
 * The followings are the available model relations:
 * @property University $university
 * @property PersonType $personType
 * @property InvolvedPerson $involvedPerson
 */
class Student extends CActiveRecord
{
        public $university_name;
        public $person_type_name;
        public $involved_name;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_answer_student';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('sex, year', 'required'),
			array('year, age, sex, diploma, course, common_q1, common_q2, common_q3, common_q4, common_q5, common_q6, common_q7, common_q8, common_q9, common_q10, common_q11, methodic_q1, methodic_q2, methodic_q3, methodic_q4, methodic_q5, methodic_q6, methodic_q7, methodic_q8, methodic_q9, methodic_q10, methodic_q11, methodic_q12, methodic_q13, labs, num_labs, labs_comment, practice, practice_duration, university_id, person_type_id, involved_person_id, diploma_aspects, diploma_research', 'numerical', 'integerOnly'=>true),
			array('code', 'length', 'max'=>20),
			array('faculty, speciality', 'length', 'max'=>100),
			array('study_from, study_till', 'length', 'max'=>7),
			array('common_comment, methodic_comment, practice_place, practice_comment, private_comments', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_answer, code, year, age, sex, faculty, speciality, diploma, study_from, study_till, course, common_q1, common_q2, common_q3, common_q4, common_q5, common_q6, common_q7, common_q8, common_q9, common_q10, common_q11, common_comment, methodic_q1, methodic_q2, methodic_q3, methodic_q4, methodic_q5, methodic_q6, methodic_q7, methodic_q8, methodic_q9, methodic_q10, methodic_q11, methodic_q12, methodic_q13, methodic_comment, labs, num_labs, labs_comment, practice, practice_place, practice_duration, practice_comment, university_id, person_type_id, involved_person_id', 'safe', 'on'=>'search'),
                        //array('study_from, study_till', 'match', 'pattern'=>'[0-90-9]/[0-90-90-90-9]')
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
			'university' => array(self::BELONGS_TO, 'University', 'university_id'),
			'personType' => array(self::BELONGS_TO, 'PersonType', 'person_type_id'),
			'involvedPerson' => array(self::BELONGS_TO, 'InvolvedPerson', 'involved_person_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_answer' => Yii::t('answerstudent','id'),
			'code' => Yii::t('answerstudent','code'),
			'year' => Yii::t('answerstudent','year'),
			'age' => Yii::t('answerstudent','age'),
			'sex' => Yii::t('answerstudent','sex'),
			'faculty' => Yii::t('answerstudent','faculty'),
			'speciality' => Yii::t('answerstudent', 'speciality'),
			'diploma' => Yii::t('answerstudent', 'speciality'),
			'study_from' => Yii::t('answerstudent', 'study_from'),
			'study_till' => Yii::t('answerstudent', 'study_till'),
			'course' => Yii::t('answerstudent', 'course'),
			'common_q1' => Yii::t('answerstudent', 'common_q1'),
			'common_q2' => Yii::t('answerstudent', 'common_q2'),
			'common_q3' => Yii::t('answerstudent', 'common_q3'),
			'common_q4' => Yii::t('answerstudent', 'common_q4'),
			'common_q5' => Yii::t('answerstudent', 'common_q5'),
			'common_q6' => Yii::t('answerstudent', 'common_q6'),
			'common_q7' => Yii::t('answerstudent', 'common_q7'),
			'common_q8' => Yii::t('answerstudent', 'common_q8'),
			'common_q9' => Yii::t('answerstudent', 'common_q9'),
			'common_q10' => Yii::t('answerstudent', 'common_q10'),
			'common_q11' => Yii::t('answerstudent', 'common_q11'),
			'common_comment' => Yii::t('answerstudent', 'common_comment'),
			'methodic_q1' => Yii::t('answerstudent', 'methodic_q1'),
			'methodic_q2' => Yii::t('answerstudent', 'methodic_q2'),
			'methodic_q3' => Yii::t('answerstudent', 'methodic_q3'),
			'methodic_q4' => Yii::t('answerstudent', 'methodic_q4'),
			'methodic_q5' => Yii::t('answerstudent', 'methodic_q5'),
			'methodic_q6' => Yii::t('answerstudent', 'methodic_q6'),
			'methodic_q7' => Yii::t('answerstudent', 'methodic_q7'),
			'methodic_q8' => Yii::t('answerstudent', 'methodic_q8'),
			'methodic_q9' => Yii::t('answerstudent', 'methodic_q9'),
			'methodic_q10' => Yii::t('answerstudent', 'methodic_q10'),
			'methodic_q11' => Yii::t('answerstudent', 'methodic_q11'),
			'methodic_q12' => Yii::t('answerstudent', 'methodic_q12'),
			'methodic_q13' => Yii::t('answerstudent', 'methodic_q13'),
			'methodic_comment' => Yii::t('answerstudent', 'methodic_comment'),
			'labs' => Yii::t('answerstudent', 'labs'),
			'num_labs' => Yii::t('answerstudent', 'num_labs'),
			'labs_comment' => Yii::t('answerstudent', 'labs_comment'),
			'practice' => Yii::t('answerstudent', 'practice'),
			'practice_place' => Yii::t('answerstudent', 'practice_place'),
			'practice_duration' => Yii::t('answerstudent', 'practice_duration'),
			'practice_comment' => Yii::t('answerstudent', 'practice_comment'),
			'university_id' => Yii::t('answerstudent', 'university_id'),
			'person_type_id' => Yii::t('answerstudent', 'person_type_id'),
			'involved_person_id' => Yii::t('answerstudent', 'involved_person_id'),
                        'private_comments' => Yii::t('answerstudent', 'private_comments'),
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

		$criteria->compare('id_answer',$this->id_answer);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('year',$this->year);
		$criteria->compare('age',$this->age);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('faculty',$this->faculty,true);
		$criteria->compare('speciality',$this->speciality,true);
		$criteria->compare('diploma',$this->diploma);
		$criteria->compare('study_from',$this->study_from,true);
		$criteria->compare('study_till',$this->study_till,true);
		$criteria->compare('course',$this->course);
		$criteria->compare('common_q1',$this->common_q1);
		$criteria->compare('common_q2',$this->common_q2);
		$criteria->compare('common_q3',$this->common_q3);
		$criteria->compare('common_q4',$this->common_q4);
		$criteria->compare('common_q5',$this->common_q5);
		$criteria->compare('common_q6',$this->common_q6);
		$criteria->compare('common_q7',$this->common_q7);
		$criteria->compare('common_q8',$this->common_q8);
		$criteria->compare('common_q9',$this->common_q9);
		$criteria->compare('common_q10',$this->common_q10);
		$criteria->compare('common_q11',$this->common_q11);
		$criteria->compare('common_comment',$this->common_comment,true);
		$criteria->compare('methodic_q1',$this->methodic_q1);
		$criteria->compare('methodic_q2',$this->methodic_q2);
		$criteria->compare('methodic_q3',$this->methodic_q3);
		$criteria->compare('methodic_q4',$this->methodic_q4);
		$criteria->compare('methodic_q5',$this->methodic_q5);
		$criteria->compare('methodic_q6',$this->methodic_q6);
		$criteria->compare('methodic_q7',$this->methodic_q7);
		$criteria->compare('methodic_q8',$this->methodic_q8);
		$criteria->compare('methodic_q9',$this->methodic_q9);
		$criteria->compare('methodic_q10',$this->methodic_q10);
		$criteria->compare('methodic_q11',$this->methodic_q11);
		$criteria->compare('methodic_q12',$this->methodic_q12);
		$criteria->compare('methodic_q13',$this->methodic_q13);
		$criteria->compare('methodic_q14',$this->methodic_q14);
		$criteria->compare('methodic_comment',$this->methodic_comment,true);
		$criteria->compare('labs',$this->labs);
		$criteria->compare('num_labs',$this->num_labs);
		$criteria->compare('labs_comment',$this->labs_comment);
		$criteria->compare('practice',$this->practice);
		$criteria->compare('practice_place',$this->practice_place,true);
		$criteria->compare('practice_duration',$this->practice_duration);
		$criteria->compare('practice_comment',$this->practice_comment,true);
		$criteria->compare('university_id',$this->university_id);
		$criteria->compare('person_type_id',$this->person_type_id);
		$criteria->compare('involved_person_id',$this->involved_person_id);
                $criteria->compare('diploma_aspects', $this->diploma_aspects);
                $criteria->compare('diploma_research', $this->diploma_research);
                $criteria->compare('private_comments', $this->private_comments);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Student the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
