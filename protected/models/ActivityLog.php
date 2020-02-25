<?php

/**
 * This is the model class for table "activity_log".
 *
 * The followings are the available columns in table 'activity_log':
 * @property string $ac_id
 * @property integer $action_id
 * @property string $ac_date
 * @property string $ac_by
 */
class ActivityLog extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'activity_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' action_id', 'required'),
			//array('action_id', 'numerical', 'integerOnly'=>true),
			array('ac_id, ac_by', 'length', 'max'=>36),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ac_id, action_id, ac_date, ac_by', 'safe', 'on'=>'search'),
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
			'ac_id' => 'Ac',
			'action_id' => 'Action',
			'ac_date' => 'Ac Date',
			'ac_by' => 'Ac By',
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

		$criteria->compare('ac_id',$this->ac_id,true);
		$criteria->compare('action_id',$this->action_id);
		$criteria->compare('ac_date',$this->ac_date,true);
		$criteria->compare('ac_by',$this->ac_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function beforeSave() {
        if(parent::beforeSave()) {
        	$this->ac_by = Yii::app()->user->id;
        	if(($this->isNewRecord)) {
            	$this->ac_id = Yii::app()->db->createCommand('select UUID()')->queryScalar();
        		$this->ac_date = date('Y-m-d H:i:s');
            }
            return true;
        } else
            return false;
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ActivityLog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
