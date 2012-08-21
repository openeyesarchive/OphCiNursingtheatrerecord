<?php /**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2012
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2012, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

/**
 * This is the model class for table "et_ophcinursingtheatrerecord_personnel".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property integer $scrub_nurse_id
 * @property integer $floor_nurse_id
 * @property integer $accompanying_nurse_id
 * @property integer $surgeon_id
 * @property integer $operating_department_practitioner_id
 * @property integer $assistant_id
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 * @property User $scrub_nurse
 * @property User $floor_nurse
 * @property User $accompanying_nurse
 * @property User $surgeon
 * @property User $operating_department_practitioner
 * @property User $assistant
 */

class Element_OphCiNursingtheatrerecord_Personnel extends BaseEventTypeElement
{
	public $service;

	/**
	 * Returns the static model of the specified AR class.
	 * @return the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'et_ophcinursingtheatrerecord_personnel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_id, scrub_nurse_id, floor_nurse_id, accompanying_nurse_id, surgeon_id, operating_department_practitioner_id, assistant_id, ', 'safe'),
			array('scrub_nurse_id, floor_nurse_id, accompanying_nurse_id, surgeon_id, operating_department_practitioner_id, assistant_id, ', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, event_id, scrub_nurse_id, floor_nurse_id, accompanying_nurse_id, surgeon_id, operating_department_practitioner_id, assistant_id, ', 'safe', 'on' => 'search'),
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
			'element_type' => array(self::HAS_ONE, 'ElementType', 'id','on' => "element_type.class_name='".get_class($this)."'"),
			'eventType' => array(self::BELONGS_TO, 'EventType', 'event_type_id'),
			'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
			'user' => array(self::BELONGS_TO, 'User', 'created_user_id'),
			'usermodified' => array(self::BELONGS_TO, 'User', 'last_modified_user_id'),
			'scrub_nurse' => array(self::BELONGS_TO, 'User', 'scrub_nurse_id'),
			'floor_nurse' => array(self::BELONGS_TO, 'User', 'floor_nurse_id'),
			'accompanying_nurse' => array(self::BELONGS_TO, 'User', 'accompanying_nurse_id'),
			'surgeon' => array(self::BELONGS_TO, 'User', 'surgeon_id'),
			'operating_department_practitioner' => array(self::BELONGS_TO, 'User', 'operating_department_practitioner_id'),
			'assistant' => array(self::BELONGS_TO, 'User', 'assistant_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'event_id' => 'Event',
'scrub_nurse_id' => 'Scrub nurse',
'floor_nurse_id' => 'Floor nurse',
'accompanying_nurse_id' => 'Accompanying nurse',
'surgeon_id' => 'Surgeon',
'operating_department_practitioner_id' => 'Operating department practitioner',
'assistant_id' => 'Assistant',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('event_id', $this->event_id, true);

$criteria->compare('scrub_nurse_id', $this->scrub_nurse_id);
$criteria->compare('floor_nurse_id', $this->floor_nurse_id);
$criteria->compare('accompanying_nurse_id', $this->accompanying_nurse_id);
$criteria->compare('surgeon_id', $this->surgeon_id);
$criteria->compare('operating_department_practitioner_id', $this->operating_department_practitioner_id);
$criteria->compare('assistant_id', $this->assistant_id);
		
		return new CActiveDataProvider(get_class($this), array(
				'criteria' => $criteria,
			));
	}

	/**
	 * Set default values for forms on create
	 */
	public function setDefaultOptions()
	{
	}



	protected function beforeSave()
	{
		return parent::beforeSave();
	}

	protected function afterSave()
	{

		return parent::afterSave();
	}

	protected function beforeValidate()
	{
		return parent::beforeValidate();
	}
}
?>