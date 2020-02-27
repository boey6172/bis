<?php

/**
 * This is the model class for table "resident".
 *
 * The followings are the available columns in table 'resident':
 * @property string $resident_id
 * @property string $first_name
 * @property string $midle_name
 * @property string $last_name
 * @property string $gender
 * @property string $birthday
 * @property integer $age
 * @property string $civil_status
 * @property string $occupation
 * @property string $educational_attainment
 */
class Resident extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'resident';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' first_name , last_name, gender, birthday, age, civil_status, occupation, educational_attainment,', 'required'),
			array('age', 'numerical', 'integerOnly'=>true),
			array('resident_id, gender, civil_status', 'length', 'max'=>36),
			array('age', 'length', 'max'=>3),
			array('first_name, midle_name, last_name, occupation, educational_attainment', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('resident_id, first_name, midle_name, last_name, gender, birthday, age, civil_status, occupation, educational_attainment,created_date, created_by, ra_date', 'safe', 'on'=>'search'),
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
			'Gender'=>[self::HAS_ONE, 'Gender', ['gender_id' => 'gender' ]],
			'CivilStatus'=>[self::HAS_ONE, 'CivilStatus', ['status_id' => 'civil_status' ]],
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'resident_id' => 'Resident',
			'first_name' => 'First Name',
			'midle_name' => 'Middle Name',
			'last_name' => 'Last Name',
			'gender' => 'Gender',
			'birthday' => 'Birthday',
			'age' => 'Age',
			'civil_status' => 'Civil Status',
			'occupation' => 'Occupation',
			'educational_attainment' => 'Educational Attainment',
			'created_date' => 'Created Date',
			'created_by' => 'Created By',
			'ra_date' => 'Recent Activity Date',

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

		$criteria->compare('resident_id',$this->resident_id,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('midle_name',$this->midle_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('civil_status',$this->civil_status,true);
		$criteria->compare('occupation',$this->occupation,true);
		$criteria->compare('educational_attainment',$this->educational_attainment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function beforeSave() {
        if(parent::beforeSave()) {
        	
        	if(($this->isNewRecord)) {
            	$this->resident_id = Yii::app()->db->createCommand('select UUID()')->queryScalar();
            	// $this->proj_code = $this->ProjectCode();
        		$this->created_date = date('Y-m-d H:i:s');
        		$this->created_by = Yii::app()->user->id;
            }
            $this->ra_date = date('Y-m-d H:i:s');
            return true;
        } else
            return false;
	}
	
	public function getFullname()
	{
		return $this->first_name . " " . $this->midle_name . " " . $this->last_name ;
	}



	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Resident the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
