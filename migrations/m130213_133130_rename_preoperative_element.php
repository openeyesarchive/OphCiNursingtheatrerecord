<?php

class m130213_133130_rename_preoperative_element extends CDbMigration
{
	public function up()
	{
		$event_type = $this->dbConnection->createCommand()->select("*")->from("event_type")->where("class_name = :class_name",array(":class_name" => "OphCiNursingtheatrerecord"))->queryRow();
		$element = $this->dbConnection->createCommand()->select("*")->from("element_type")->where("event_type_id = :event_type_id and class_name = :class_name",array(":event_type_id" => $event_type['id'],":class_name" => "Element_OphCiNursingtheatrerecord_PreoperativeRecord"))->queryRow();

		$this->update('element_type',array('name'=>'Day of operation','class_name'=>'Element_OphCiNursingtheatrerecord_DayOfOperation'),"id={$element['id']}");

		$this->dropForeignKey('et_ophcinursingtheatrerecord_preoperativerecord_cui_fk','et_ophcinursingtheatrerecord_preoperativerecord');
		$this->dropForeignKey('et_ophcinursingtheatrerecord_preoperativerecord_ev_fk','et_ophcinursingtheatrerecord_preoperativerecord');
		$this->dropForeignKey('et_ophcinursingtheatrerecord_preoperativerecord_lmui_fk','et_ophcinursingtheatrerecord_preoperativerecord');
		$this->dropIndex('et_ophcinursingtheatrerecord_preoperativerecord_lmui_fk','et_ophcinursingtheatrerecord_preoperativerecord');
		$this->dropIndex('et_ophcinursingtheatrerecord_preoperativerecord_cui_fk','et_ophcinursingtheatrerecord_preoperativerecord');
		$this->dropIndex('et_ophcinursingtheatrerecord_preoperativerecord_ev_fk','et_ophcinursingtheatrerecord_preoperativerecord');

		$this->renameTable('et_ophcinursingtheatrerecord_preoperativerecord','et_ophcinursingtheatrerecord_dayofoperation');

		$this->createIndex('et_ophcinursingtheatrerecord_dayofoperation_ev_fk','et_ophcinursingtheatrerecord_dayofoperation','event_id');
		$this->createIndex('et_ophcinursingtheatrerecord_dayofoperation_cui_fk','et_ophcinursingtheatrerecord_dayofoperation','created_user_id');
		$this->createIndex('et_ophcinursingtheatrerecord_dayofoperation_lmui_fk','et_ophcinursingtheatrerecord_dayofoperation','last_modified_user_id');
		$this->addForeignKey('et_ophcinursingtheatrerecord_dayofoperation_lmui_fk','et_ophcinursingtheatrerecord_dayofoperation','last_modified_user_id','user','id');
		$this->addForeignKey('et_ophcinursingtheatrerecord_dayofoperation_ev_fk','et_ophcinursingtheatrerecord_dayofoperation','event_id','event','id');
		$this->addForeignKey('et_ophcinursingtheatrerecord_dayofoperation_cui_fk','et_ophcinursingtheatrerecord_dayofoperation','created_user_id','user','id');
	}

	public function down()
	{
		$event_type = $this->dbConnection->createCommand()->select("*")->from("event_type")->where("class_name = :class_name",array(":class_name" => "OphCiNursingtheatrerecord"))->queryRow();
		$element = $this->dbConnection->createCommand()->select("*")->from("element_type")->where("event_type_id = :event_type_id and class_name = :class_name",array(":event_type_id" => $event_type['id'],":class_name" => "Element_OphCiNursingtheatrerecord_DayOfOperation"))->queryRow();

		$this->update('element_type',array('name'=>'Preoperative record','class_name'=>'Element_OphCiNursingtheatrerecord_PreoperativeRecord'),"id={$element['id']}");

		$this->dropForeignKey('et_ophcinursingtheatrerecord_dayofoperation_cui_fk','et_ophcinursingtheatrerecord_dayofoperation');
		$this->dropForeignKey('et_ophcinursingtheatrerecord_dayofoperation_ev_fk','et_ophcinursingtheatrerecord_dayofoperation');
		$this->dropForeignKey('et_ophcinursingtheatrerecord_dayofoperation_lmui_fk','et_ophcinursingtheatrerecord_dayofoperation');
		$this->dropIndex('et_ophcinursingtheatrerecord_dayofoperation_lmui_fk','et_ophcinursingtheatrerecord_dayofoperation');
		$this->dropIndex('et_ophcinursingtheatrerecord_dayofoperation_cui_fk','et_ophcinursingtheatrerecord_dayofoperation');
		$this->dropIndex('et_ophcinursingtheatrerecord_dayofoperation_ev_fk','et_ophcinursingtheatrerecord_dayofoperation');

		$this->renameTable('et_ophcinursingtheatrerecord_dayofoperation','et_ophcinursingtheatrerecord_preoperativerecord');

		$this->createIndex('et_ophcinursingtheatrerecord_preoperativerecord_ev_fk','et_ophcinursingtheatrerecord_preoperativerecord','event_id');
		$this->createIndex('et_ophcinursingtheatrerecord_preoperativerecord_cui_fk','et_ophcinursingtheatrerecord_preoperativerecord','created_user_id');
		$this->createIndex('et_ophcinursingtheatrerecord_preoperativerecord_lmui_fk','et_ophcinursingtheatrerecord_preoperativerecord','last_modified_user_id');
		$this->addForeignKey('et_ophcinursingtheatrerecord_preoperativerecord_lmui_fk','et_ophcinursingtheatrerecord_preoperativerecord','last_modified_user_id','user','id');
		$this->addForeignKey('et_ophcinursingtheatrerecord_preoperativerecord_ev_fk','et_ophcinursingtheatrerecord_preoperativerecord','event_id','event','id');
		$this->addForeignKey('et_ophcinursingtheatrerecord_preoperativerecord_cui_fk','et_ophcinursingtheatrerecord_preoperativerecord','created_user_id','user','id');
	}
}
