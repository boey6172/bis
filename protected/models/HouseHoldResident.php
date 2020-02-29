<?php

/**
 * This is the model class for table "household_resident".
 *
 * The followings are the available columns in table 'household_resident':
 * @property string $household_resident_id
 * @property string $resident_id
 * @property string $household_id
 */
class HouseHoldResident extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'household_resident';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('resident_id, household_id', 'required'),
			array('household_resident_id, resident_id, household_id', 'length', 'max'=>36),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array(' resident_id, household_id', 'safe', 'on'=>'search'),
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
			'household_resident_id' => 'Household Resident',
			'resident_id' => 'Resident',
			'household_id' => 'Household',
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

		$criteria->compare('household_resident_id',$this->household_resident_id,true);
		$criteria->compare('resident_id',$this->resident_id,true);
		$criteria->compare('household_id',$this->household_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function beforeSave() {
        if(parent::beforeSave()) {
        	
        	if(($this->isNewRecord)) {
            	$this->household_resident_id = Yii::app()->db->createCommand('select UUID()')->queryScalar();
            	// $this->proj_code = $this->ProjectCode();
        		// $this->created_date = date('Y-m-d H:i:s');
        		// $this->created_by = Yii::app()->user->id;
            }
            // $this->ra_date = date('Y-m-d H:i:s');
            return true;
        } else
            return false;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return HouseHoldResident the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
