<?php

class m130212_140417_no_defaults_for_booleans_in_preoperative_record_element extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('et_ophcinursingtheatrerecord_preoperativerecord','change_of_medical_history_since_pre_operative_assessment','tinyint(1) unsigned NULL');
		$this->alterColumn('et_ophcinursingtheatrerecord_preoperativerecord','pre_operative_checklist_completed_and_filed_in_notes','tinyint(1) unsigned NULL');
		$this->alterColumn('et_ophcinursingtheatrerecord_preoperativerecord','cdj_checklist_completed_and_filed_in_notes','tinyint(1) unsigned NULL');
	}

	public function down()
	{
		$this->alterColumn('et_ophcinursingtheatrerecord_preoperativerecord','change_of_medical_history_since_pre_operative_assessment','tinyint(1) unsigned NOT NULL DEFAULT 0');
		$this->alterColumn('et_ophcinursingtheatrerecord_preoperativerecord','pre_operative_checklist_completed_and_filed_in_notes','tinyint(1) unsigned NOT NULL DEFAULT 0');
		$this->alterColumn('et_ophcinursingtheatrerecord_preoperativerecord','cdj_checklist_completed_and_filed_in_notes','tinyint(1) unsigned NOT NULL DEFAULT 0');
	}
}
