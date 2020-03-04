<?php

/**
 * This is the model class for table "barangay_clearance".
 *
 * The followings are the available columns in table 'barangay_clearance':
 * @property string $barangay_clearance_id
 * @property string $resident_id
 * @property integer $age
 * @property string $purpose
 * @property integer $day
 * @property integer $month
 * @property string $year
 * @property string $issued_on
 * @property string $issued_at
 * @property string $created_date
 * @property string $ra_date
 * @property string $created_by
 * @property string $ra_editor
 */
class BarangayClearance extends CActiveRecord
{
	public $toc;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'barangay_clearance';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('  age, purpose', 'required'),
			array('age , month', 'numerical', 'integerOnly'=>true),
			array('barangay_clearance_id, resident_id', 'length', 'max'=>36),
			array('purpose', 'length', 'max'=>256),
			array('year', 'length', 'max'=>4),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('barangay_clearance_id, resident_id, age, purpose, day, month, year, issued_on, issued_at, created_date, ra_date, created_by, ra_editor', 'safe', 'on'=>'search'),
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
			'Resident'=>[self::HAS_ONE, 'Resident', ['resident_id' => 'resident_id' ]],
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'barangay_clearance_id' => 'Barangay Clearance',
			'resident_id' => 'Resident',
			'age' => 'Age',
			'purpose' => 'Purpose',
			'day' => 'Day',
			'month' => 'Month',
			'year' => 'Year',
			'issued_on' => 'Issued On',
			'issued_at' => 'Issued At',
			'created_date' => 'Created Date',
			'ra_date' => 'Ra Date',
			'created_by' => 'Created By',
			'ra_editor' => 'Ra Editor',
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

		$criteria->compare('barangay_clearance_id',$this->barangay_clearance_id,true);
		$criteria->compare('resident_id',$this->resident_id,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('purpose',$this->purpose,true);
		$criteria->compare('day',$this->day);
		$criteria->compare('month',$this->month);
		$criteria->compare('year',$this->year,true);
		$criteria->compare('issued_on',$this->issued_on,true);
		$criteria->compare('issued_at',$this->issued_at,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('ra_date',$this->ra_date,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('ra_editor',$this->ra_editor,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function beforeSave() {
        if(parent::beforeSave()) {
        	
        	if(($this->isNewRecord)) {
            	$this->barangay_clearance_id = Yii::app()->db->createCommand('select UUID()')->queryScalar();
				$this->day = date('jS');
				$this->month = date('F');
				$this->year = date('Y');
        		$this->created_date = date('Y-m-d H:i:s');
        		$this->created_by = Yii::app()->user->id;
            }
			$this->ra_date = date('Y-m-d H:i:s');
			$this->ra_editor = Yii::app()->user->id;
			
            return true;
        } else
            return false;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BarangayClearance the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
