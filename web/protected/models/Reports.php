<?php

/**
 * This is the model class for table "tbl_reports".
 *
 * The followings are the available columns in table 'tbl_reports':
 * @property integer $id_report
 * @property string $name
 * @property string $created_date
 * @property integer $year
 * @property string $countries
 * @property string $chapter2
 * @property string $chapter3
 */
class Reports extends CActiveRecord
{
        private $students_questions;
        private $teachers_questions;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_reports';
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
			array('name, countries, chapter3', 'length', 'max'=>200),
                        array('chapter2', 'length', 'max'=>500),
			array('created_date', 'safe'),
                        array('year, created_date, name', 'required'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_report, name, created_date, year, countries, chapter2, chapter3', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_report' => Yii::t('reports', 'id_report'),
			'name' => Yii::t('reports', 'name'),
			'created_date' => Yii::t('reports', 'created_date'),
			'year' => Yii::t('reports', 'year'),
			'countries' => Yii::t('reports', 'countries'),
			'chapter2' => Yii::t('reports', 'chapter2'),
			'chapter3' => Yii::t('reports', 'chapter3'),
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

		$criteria->compare('id_report',$this->id_report);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('year',$this->year);
		$criteria->compare('countries',$this->countries,true);
		$criteria->compare('chapter2',$this->chapter2,true);
		$criteria->compare('chapter3',$this->chapter3,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Reports the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function getStudents_questions()
        {
            return $this->students_questions;
        }
        
        public function getTeachers_questions()
        {
            return $this->teachers_questions;
        }
        
        public function setStudents_questions($value)
        {
            $this->students_questions = $value;
        }
        
        public function setTeachers_questions($value)
        {
            $this->teachers_questions = $value;
        }
}
