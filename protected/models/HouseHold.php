<?php

/**
 * This is the model class for table "household".
 *
 * The followings are the available columns in table 'household':
 * @property string $household_id
 * @property string $headoffamily
 * @property integer $house_ownership
 * @property string $first_resided
 * @property string $unit_number
 * @property string $house_number
 * @property string $street
 * @property string $barangay
 * @property string $district_name
 * @property string $city
 * @property string $municipality
 * @property string $postal_code
 * @property string $country
 */
class HouseHold extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'household';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('household_id, headoffamily, house_ownership, first_resided, unit_number, house_number, street, barangay, district_name, city, municipality, postal_code, country', 'required'),
			array('house_ownership', 'numerical', 'integerOnly'=>true),
			array('household_id, headoffamily', 'length', 'max'=>36),
			array('first_resided', 'length', 'max'=>4),
			array('unit_number, house_number, street, barangay, district_name, city, municipality, postal_code, country', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('household_id, headoffamily, house_ownership, first_resided, unit_number, house_number, street, barangay, district_name, city, municipality, postal_code, country', 'safe', 'on'=>'search'),
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
			'household_id' => 'Household',
			'headoffamily' => 'Headoffamily',
			'house_ownership' => 'House Ownership',
			'first_resided' => 'First Resided',
			'unit_number' => 'Unit Number',
			'house_number' => 'House Number',
			'street' => 'Street',
			'barangay' => 'Barangay',
			'district_name' => 'District Name',
			'city' => 'City',
			'municipality' => 'Municipality',
			'postal_code' => 'Postal Code',
			'country' => 'Country',
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

		$criteria->compare('household_id',$this->household_id,true);
		$criteria->compare('headoffamily',$this->headoffamily,true);
		$criteria->compare('house_ownership',$this->house_ownership);
		$criteria->compare('first_resided',$this->first_resided,true);
		$criteria->compare('unit_number',$this->unit_number,true);
		$criteria->compare('house_number',$this->house_number,true);
		$criteria->compare('street',$this->street,true);
		$criteria->compare('barangay',$this->barangay,true);
		$criteria->compare('district_name',$this->district_name,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('municipality',$this->municipality,true);
		$criteria->compare('postal_code',$this->postal_code,true);
		$criteria->compare('country',$this->country,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return HouseHold the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
