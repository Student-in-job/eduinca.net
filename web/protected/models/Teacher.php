<?php

/**
 * This is the model class for table "tbl_answer_teacher".
 *
 * The followings are the available columns in table 'tbl_answer_teacher':
 * @property integer $id_answer
 * @property string $code
 * @property integer $age
 * @property integer $sex
 * @property string $faculty
 * @property integer $student_teach
 * @property integer $common_q1
 * @property integer $common_q2
 * @property integer $common_q3
 * @property integer $common_q4
 * @property integer $common_q5
 * @property integer $common_q6
 * @property integer $common_q7
 * @property integer $common_q8
 * @property integer $common_q9
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
 * @property string $methodic_comment
 * @property integer $labs
 * @property integer $num_labs
 * @property string $labs_comment
 * @property integer $practice
 * @property integer $practice_place
 * @property integer $practice_duration
 * @property integer $num_of_papers
 * @property integer $num_of_papers_theoretical
 * @property integer $num_of_papers_practical
 * @property integer $private_papers
 * @property string $private_comments
 * @property integer $university_id
 * @property integer $person_type_id
 * @property integer $involved_person_id
 *
 * The followings are the available model relations:
 * @property InvolvedPerson $involvedPerson
 * @property PersonType $personType
 * @property University $university
 */
class Teacher extends CActiveRecord
{
        public $university_name;
        public $person_type_name;
        public $involved_name;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_answer_teacher';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code, sex, year', 'required'),
			array('id_answer, age, sex, year, student_teach1, student_teach2, student_teach3, common_q1, common_q2, common_q3, common_q4, common_q5, common_q6, common_q7, common_q8, common_q9, methodic_q1, methodic_q2, methodic_q3, methodic_q4, methodic_q5, methodic_q6, methodic_q7, methodic_q8, methodic_q9, methodic_q10, methodic_q11, methodic_q12, methodic_q13, labs, num_labs, practice, practice_place, practice_duration, num_of_papers, num_of_papers_theoretical, num_of_papers_practical, university_id, person_type_id, involved_person_id,methodic_qq1, methodic_qq2, methodic_qq3, methodic_qq4, methodic_qq5, methodic_qq6, methodic_qq7, methodic_qq8, methodic_qq9, methodic_qq10, methodic_qq11, methodic_qq12, methodic_qq13', 'numerical', 'integerOnly'=>true),
			array('code', 'length', 'max'=>20),
			array('faculty', 'length', 'max'=>100),
			array('common_comment, methodic_comment, labs_comment, private_comments', 'length', 'max'=>250),
                        array('private_papers','length','max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_answer, code, age, sex, year, faculty, student_teach1, student_teach2, student_teach3, common_q1, common_q2, common_q3, common_q4, common_q5, common_q6, common_q7, common_q8, common_q9, common_comment, methodic_q1, methodic_q2, methodic_q3, methodic_q4, methodic_q5, methodic_q6, methodic_q7, methodic_q8, methodic_q9, methodic_q10, methodic_q11, methodic_q12, methodic_q13, methodic_comment, labs, num_labs, labs_comment, practice, practice_place, practice_duration, num_of_papers, num_of_papers_theoretical, num_of_papers_practical, private_papers, private_comments, university_id, person_type_id, involved_person_id,methodic_qq1, methodic_qq2, methodic_qq3, methodic_qq4, methodic_qq5, methodic_qq6, methodic_qq7, methodic_qq8, methodic_qq9, methodic_qq10, methodic_qq11, methodic_qq12, methodic_qq13', 'safe', 'on'=>'search'),
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
			'involvedPerson' => array(self::BELONGS_TO, 'InvolvedPerson', 'involved_person_id'),
			'personType' => array(self::BELONGS_TO, 'PersonType', 'person_type_id'),
			'university' => array(self::BELONGS_TO, 'University', 'university_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_answer' => Yii::t('answerteacher','id'),
			'code' => Yii::t('answerteacher','code'),
			'age' => '1. ' . Yii::t('answerteacher','age'),
			'sex' => '2. ' . Yii::t('answerteacher','sex'),
                        'year' => Yii::t('answerteacher','year'),
			'faculty' => '3. ' . Yii::t('answerteacher','faculty'),
			'student_teach1' => Yii::t('answerteacher','studentteach1'),
                        'student_teach2' => Yii::t('answerteacher','studentteach2'),
                        'student_teach3' => Yii::t('answerteacher','studentteach3'),
			'common_q1' => Yii::t('answerteacher','common_1'),
			'common_q2' => Yii::t('answerteacher','common_2'),
			'common_q3' => Yii::t('answerteacher','common_3'),
			'common_q4' => Yii::t('answerteacher','common_4'),
			'common_q5' => Yii::t('answerteacher','common_5'),
			'common_q6' => Yii::t('answerteacher','common_6'),
			'common_q7' => Yii::t('answerteacher','common_7'),
			'common_q8' => Yii::t('answerteacher','common_8'),
			'common_q9' => Yii::t('answerteacher','common_9'),
			'common_comment' => Yii::t('answerteacher','common_comment') . ':',
			'methodic_q1' => Yii::t('answerteacher','methodic_1'),
			'methodic_q2' => Yii::t('answerteacher','methodic_2'),
			'methodic_q3' => Yii::t('answerteacher','methodic_3'),
			'methodic_q4' => Yii::t('answerteacher','methodic_4'),
			'methodic_q5' => Yii::t('answerteacher','methodic_5'),
			'methodic_q6' => Yii::t('answerteacher','methodic_6'),
			'methodic_q7' => Yii::t('answerteacher','methodic_7'),
			'methodic_q8' => Yii::t('answerteacher','methodic_8'),
			'methodic_q9' => Yii::t('answerteacher','methodic_9'),
			'methodic_q10' => Yii::t('answerteacher','methodic_10'),
			'methodic_q11' => Yii::t('answerteacher','methodic_11'),
			'methodic_q12' => Yii::t('answerteacher','methodic_12'),
			'methodic_q13' => Yii::t('answerteacher','methodic_13'),
			'methodic_comment' => Yii::t('answerteacher','methodic_comment'),
			'labs' => '7. ' . Yii::t('answerteacher','labs'),
			'num_labs' => '8. ' . Yii::t('answerteacher','num_labs'),
			'labs_comment' => '9. ' . Yii::t('answerteacher','labs_comment'),
			'practice' => '10. ' . Yii::t('answerteacher','practice'),
			'practice_place' => '11. ' . Yii::t('answerteacher','practice_place'),
			'practice_duration' => '12. ' . Yii::t('answerteacher','practice_duration'),
			'num_of_papers' => '13. ' . Yii::t('answerteacher','num_of_papers'),
			'num_of_papers_theoretical' => Yii::t('answerteacher','num_of_papers_theoretical'),
			'num_of_papers_practical' => Yii::t('answerteacher','num_of_papers_practical'),
			'private_papers' => '15. ' . Yii::t('answerteacher','private_papers'),
			'private_comments' =>'16. ' . Yii::t('answerteacher','private_comments'),
			'university_id' => Yii::t('answerteacher','university_id'),
			'person_type_id' => Yii::t('answerteacher','person_type_id'),
			'involved_person_id' => Yii::t('answerteacher','involved_person_id'),
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
		$criteria->compare('age',$this->age);
		$criteria->compare('sex',$this->sex);
                $criteria->compare('year',$this->year);
		$criteria->compare('faculty',$this->faculty,true);
		$criteria->compare('student_teach1',$this->student_teach1);
                $criteria->compare('student_teach2',$this->student_teach2);
                $criteria->compare('student_teach3',$this->student_teach3);
		$criteria->compare('common_q1',$this->common_q1);
		$criteria->compare('common_q2',$this->common_q2);
		$criteria->compare('common_q3',$this->common_q3);
		$criteria->compare('common_q4',$this->common_q4);
		$criteria->compare('common_q5',$this->common_q5);
		$criteria->compare('common_q6',$this->common_q6);
		$criteria->compare('common_q7',$this->common_q7);
		$criteria->compare('common_q8',$this->common_q8);
		$criteria->compare('common_q9',$this->common_q9);
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
                $criteria->compare('methodic_qq1',$this->methodic_qq1);
		$criteria->compare('methodic_qq2',$this->methodic_qq2);
		$criteria->compare('methodic_qq3',$this->methodic_qq3);
		$criteria->compare('methodic_qq4',$this->methodic_qq4);
		$criteria->compare('methodic_qq5',$this->methodic_qq5);
		$criteria->compare('methodic_qq6',$this->methodic_qq6);
		$criteria->compare('methodic_qq7',$this->methodic_qq7);
		$criteria->compare('methodic_qq8',$this->methodic_qq8);
		$criteria->compare('methodic_qq9',$this->methodic_qq9);
		$criteria->compare('methodic_qq10',$this->methodic_qq10);
		$criteria->compare('methodic_qq11',$this->methodic_qq11);
		$criteria->compare('methodic_qq12',$this->methodic_qq12);
		$criteria->compare('methodic_qq13',$this->methodic_qq13);
		$criteria->compare('methodic_comment',$this->methodic_comment,true);
		$criteria->compare('labs',$this->labs);
		$criteria->compare('num_labs',$this->num_labs);
		$criteria->compare('labs_comment',$this->labs_comment,true);
		$criteria->compare('practice',$this->practice);
		$criteria->compare('practice_place',$this->practice_place);
		$criteria->compare('practice_duration',$this->practice_duration);
		$criteria->compare('num_of_papers',$this->num_of_papers);
		$criteria->compare('num_of_papers_theoretical',$this->num_of_papers_theoretical);
		$criteria->compare('num_of_papers_practical',$this->num_of_papers_practical);
		$criteria->compare('private_papers',$this->private_papers);
		$criteria->compare('private_comments',$this->private_comments,true);
		$criteria->compare('university_id',$this->university_id);
		$criteria->compare('person_type_id',$this->person_type_id);
		$criteria->compare('involved_person_id',$this->involved_person_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AnswerTeacher the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
