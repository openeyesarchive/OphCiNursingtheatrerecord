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
 * This is the model class for table "et_ophcinursingtheatrerecord_cataractsurgery".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property integer $surgery_id
 * @property integer $position_id
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 * @property EtOphcinursingtheatrerecordCataractsurgerySurgery $surgery
 * @property EtOphcinursingtheatrerecordCataractsurgeryPosition $position
 */

class Element_OphCiNursingtheatrerecord_CataractSurgery extends BaseEventTypeElement
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
		return 'et_ophcinursingtheatrerecord_cataractsurgery';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_id, surgery_id, position_id, diathermy, surgery_notes', 'safe'),
			array('surgery_id, diathermy', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, event_id, surgery_id, position_id, diathermy, surgery_notes', 'safe', 'on' => 'search'),
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
			'surgery' => array(self::BELONGS_TO, 'EtOphcinursingtheatrerecordCataractsurgerySurgery', 'surgery_id'),
			'position' => array(self::BELONGS_TO, 'EtOphcinursingtheatrerecordCataractsurgeryPosition', 'position_id'),
			'intraoperative_aids' => array(self::HAS_MANY, 'OphCiNursingtheatrerecord_Intraoperative_Aids', 'element_id'),
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
			'surgery_id' => 'Surgery',
			'position_id' => 'Position',
			'surgery_notes' => 'Surgery notes',
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
		$criteria->compare('surgery_id', $this->surgery_id);
		$criteria->compare('position_id', $this->position_id);
		
		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	protected function afterSave()
	{
		$existing_aids = array();

		foreach ($this->intraoperative_aids as $aid) {
			$existing_aids[] = $aid->aid_id;
		}

		if (isset($_POST['IntraoperativeAid'])) {
			foreach ($_POST['IntraoperativeAid'] as $id) {
				if (!in_array($id,$existing_aids)) {
					$aid = new OphCiNursingtheatrerecord_Intraoperative_Aids;
					$aid->element_id = $this->id;
					$aid->aid_id = $id;

					if (!$aid->save()) {
						throw new Exception("Unable to save intraoperative aid: ".print_r($aid->getErrors(),true));
					}
				}
			}
		}

		foreach ($existing_aids as $id) {
			if (!isset($_POST['IntraoperativeAid']) || !in_array($id,$_POST['IntraoperativeAid'])) {
				$aid = OphCiNursingtheatrerecord_Intraoperative_Aids::model()->find('element_id=? and aid_id=?',array($this->id,$id));
				if (!$aid->delete()) {
					throw new Exception("Unable to delete intraoperative aid: ".print_r($aid->getErrors(),true));
				}
			}
		}

		return parent::afterSave();
	}

	public function getHidden() {
		if (empty($_POST)) {
			if ($this->id) {
				return !($this->surgery->name == 'Other');
			}
			return true;
		}

		$surgery_other = EtOphcinursingtheatrerecordCataractsurgerySurgery::model()->find('name=?',array('Other'));

		return (@$_POST['Element_OphCiNursingtheatrerecord_CataractSurgery']['surgery_id'] != $surgery_other->id);
	}

	public function getIntraOperativeAidValues()
	{
		$intraoperative_aid_values = array();

		foreach ($this->intraoperative_aids as $intraoperative_aid) {
			$intraoperative_aid_values[] = $intraoperative_aid->aid_id;
		}

		return $intraoperative_aid_values;
	}
}
?>
