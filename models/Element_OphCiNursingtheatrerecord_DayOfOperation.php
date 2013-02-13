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
 * This is the model class for table "et_ophcinursingtheatrerecord_dayofoperation".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property integer $change_of_medical_history_since_pre_operative_assessment
 * @property string $inr_level_if_applicable
 * @property integer $pre_operative_checklist_completed_and_filed_in_notes
 * @property integer $cdj_checklist_completed_and_filed_in_notes
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 */

class Element_OphCiNursingtheatrerecord_DayOfOperation extends BaseEventTypeElement
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
		return 'et_ophcinursingtheatrerecord_dayofoperation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_id, change_of_medical_history_since_pre_operative_assessment, inr_level_if_applicable, pre_operative_checklist_completed_and_filed_in_notes, cdj_checklist_completed_and_filed_in_notes, history_change_notes', 'safe'),
			array('change_of_medical_history_since_pre_operative_assessment, inr_level_if_applicable, pre_operative_checklist_completed_and_filed_in_notes, cdj_checklist_completed_and_filed_in_notes, ', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, event_id, change_of_medical_history_since_pre_operative_assessment, inr_level_if_applicable, pre_operative_checklist_completed_and_filed_in_notes, cdj_checklist_completed_and_filed_in_notes, ', 'safe', 'on' => 'search'),
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
			'change_of_medical_history_since_pre_operative_assessment' => 'Change of history since preop assessment',
			'inr_level_if_applicable' => 'INR level if applicable',
			'pre_operative_checklist_completed_and_filed_in_notes' => 'Preoperative checklist completed and filed in notes',
			'cdj_checklist_completed_and_filed_in_notes' => 'CDJ checklist completed and filed in notes',
			'history_change_notes' => 'History change notes',
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
		$criteria->compare('change_of_medical_history_since_pre_operative_assessment', $this->change_of_medical_history_since_pre_operative_assessment);
		$criteria->compare('inr_level_if_applicable', $this->inr_level_if_applicable);
		$criteria->compare('pre_operative_checklist_completed_and_filed_in_notes', $this->pre_operative_checklist_completed_and_filed_in_notes);
		$criteria->compare('cdj_checklist_completed_and_filed_in_notes', $this->cdj_checklist_completed_and_filed_in_notes);
		
		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	public function getNotes_hidden() {
		if (!empty($_POST)) {
			return !@$_POST['Element_OphCiNursingtheatrerecord_PreoperativeRecord']['change_of_medical_history_since_pre_operative_assessment'];
		} else if ($this->id) {
			return !$this->change_of_medical_history_since_pre_operative_assessment;
		}

		return true;
	}
}
?>
