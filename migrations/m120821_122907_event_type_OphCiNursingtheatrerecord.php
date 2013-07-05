<?php 
class m120821_122907_event_type_OphCiNursingtheatrerecord extends CDbMigration
{
	public function up() {

		// --- EVENT TYPE ENTRIES ---

		// create an event_type entry for this event type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('event_type')->where('name=:name', array(':name'=>'Nursing theatre record'))->queryRow()) {
			$group = $this->dbConnection->createCommand()->select('id')->from('event_group')->where('name=:name',array(':name'=>'Clinical events'))->queryRow();
			$this->insert('event_type', array('class_name' => 'OphCiNursingtheatrerecord', 'name' => 'Nursing theatre record','event_group_id' => $group['id']));
		}
		// select the event_type id for this event type name
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('name=:name', array(':name'=>'Nursing theatre record'))->queryRow();

		// --- ELEMENT TYPE ENTRIES ---

		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Preoperative record',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Preoperative record','class_name' => 'Element_OphCiNursingtheatrerecord_PreoperativeRecord', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Preoperative record'))->queryRow();
		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Personnel',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Personnel','class_name' => 'Element_OphCiNursingtheatrerecord_Personnel', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Personnel'))->queryRow();
		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Cataract surgery',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Cataract surgery','class_name' => 'Element_OphCiNursingtheatrerecord_CataractSurgery', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Cataract surgery'))->queryRow();
		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Anaesthetic',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Anaesthetic','class_name' => 'Element_OphCiNursingtheatrerecord_Anaesthetic', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Anaesthetic'))->queryRow();



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophcinursingtheatrerecord_preoperativerecord', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'change_of_medical_history_since_pre_operative_assessment' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // Change of medical history since preoperative assessment
				'inr_level_if_applicable' => 'varchar(255) DEFAULT \'\'', // INR level if applicable
				'pre_operative_checklist_completed_and_filed_in_notes' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // Preoperative checklist completed and filed in notes
				'cdj_checklist_completed_and_filed_in_notes' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // CDJ checklist completed and filed in notes
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcinursingtheatrerecord_preoperativerecord_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcinursingtheatrerecord_preoperativerecord_cui_fk` (`created_user_id`)',
				'KEY `et_ophcinursingtheatrerecord_preoperativerecord_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophcinursingtheatrerecord_preoperativerecord_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcinursingtheatrerecord_preoperativerecord_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcinursingtheatrerecord_preoperativerecord_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophcinursingtheatrerecord_personnel', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'scrub_nurse_id' => 'int(10) unsigned NOT NULL', // Scrub nurse
				'floor_nurse_id' => 'int(10) unsigned NOT NULL', // Floor nurse
				'accompanying_nurse_id' => 'int(10) unsigned NOT NULL', // Accompanying nurse
				'surgeon_id' => 'int(10) unsigned NOT NULL', // Surgeon
				'operating_department_practitioner_id' => 'int(10) unsigned NOT NULL', // Operating department practitioner
				'assistant_id' => 'int(10) unsigned NOT NULL', // Assistant
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcinursingtheatrerecord_personnel_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcinursingtheatrerecord_personnel_cui_fk` (`created_user_id`)',
				'KEY `et_ophcinursingtheatrerecord_personnel_ev_fk` (`event_id`)',
				'KEY `et_ophcinursingtheatrerecord_personnel_scrub_nurse_id_fk` (`scrub_nurse_id`)',
				'KEY `et_ophcinursingtheatrerecord_personnel_floor_nurse_id_fk` (`floor_nurse_id`)',
				'KEY `et_ophcinursingtheatrerecord_personnel_accompanying_nurse_id_fk` (`accompanying_nurse_id`)',
				'KEY `et_ophcinursingtheatrerecord_personnel_surgeon_id_fk` (`surgeon_id`)',
				'KEY `et_ophcinursingtheatrerecord_oopd_id_fk` (`operating_department_practitioner_id`)',
				'KEY `et_ophcinursingtheatrerecord_personnel_assistant_id_fk` (`assistant_id`)',
				'CONSTRAINT `et_ophcinursingtheatrerecord_personnel_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcinursingtheatrerecord_personnel_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcinursingtheatrerecord_personnel_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `et_ophcinursingtheatrerecord_personnel_scrub_nurse_id_fk` FOREIGN KEY (`scrub_nurse_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcinursingtheatrerecord_personnel_floor_nurse_id_fk` FOREIGN KEY (`floor_nurse_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcinursingtheatrerecord_personnel_accompanying_nurse_id_fk` FOREIGN KEY (`accompanying_nurse_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcinursingtheatrerecord_personnel_surgeon_id_fk` FOREIGN KEY (`surgeon_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcinursingtheatrerecord_oopd_id_fk` FOREIGN KEY (`operating_department_practitioner_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcinursingtheatrerecord_personnel_assistant_id_fk` FOREIGN KEY (`assistant_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		// element lookup table et_ophcinursingtheatrerecord_cataractsurgery_surgery
		$this->createTable('et_ophcinursingtheatrerecord_cataractsurgery_surgery', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcinursingtheatrerecord_cataractsurgery_surgery_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcinursingtheatrerecord_cataractsurgery_surgery_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcinursingtheatrerecord_cataractsurgery_surgery_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcinursingtheatrerecord_cataractsurgery_surgery_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('et_ophcinursingtheatrerecord_cataractsurgery_surgery',array('name'=>'Not performed','display_order'=>1));
		$this->insert('et_ophcinursingtheatrerecord_cataractsurgery_surgery',array('name'=>'Right phaco with IOL','display_order'=>2));
		$this->insert('et_ophcinursingtheatrerecord_cataractsurgery_surgery',array('name'=>'Left phaco with IOL','display_order'=>3));

		// element lookup table et_ophcinursingtheatrerecord_cataractsurgery_position
		$this->createTable('et_ophcinursingtheatrerecord_cataractsurgery_position', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcinursingtheatrerecord_cataractsurgery_position_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcinursingtheatrerecord_cataractsurgery_position_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcinursingtheatrerecord_cataractsurgery_position_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcinursingtheatrerecord_cataractsurgery_position_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('et_ophcinursingtheatrerecord_cataractsurgery_position',array('name'=>'Supine','display_order'=>1));
		$this->insert('et_ophcinursingtheatrerecord_cataractsurgery_position',array('name'=>'Other','display_order'=>2));



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophcinursingtheatrerecord_cataractsurgery', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'surgery_id' => 'int(10) unsigned NOT NULL DEFAULT 1', // Surgery
				'position_id' => 'int(10) unsigned NOT NULL', // Position
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcinursingtheatrerecord_cataractsurgery_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcinursingtheatrerecord_cataractsurgery_cui_fk` (`created_user_id`)',
				'KEY `et_ophcinursingtheatrerecord_cataractsurgery_ev_fk` (`event_id`)',
				'KEY `et_ophcinursingtheatrerecord_cataractsurgery_surgery_fk` (`surgery_id`)',
				'KEY `et_ophcinursingtheatrerecord_cataractsurgery_position_fk` (`position_id`)',
				'CONSTRAINT `et_ophcinursingtheatrerecord_cataractsurgery_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcinursingtheatrerecord_cataractsurgery_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcinursingtheatrerecord_cataractsurgery_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `et_ophcinursingtheatrerecord_cataractsurgery_surgery_fk` FOREIGN KEY (`surgery_id`) REFERENCES `et_ophcinursingtheatrerecord_cataractsurgery_surgery` (`id`)',
				'CONSTRAINT `et_ophcinursingtheatrerecord_cataractsurgery_position_fk` FOREIGN KEY (`position_id`) REFERENCES `et_ophcinursingtheatrerecord_cataractsurgery_position` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		// element lookup table et_ophcinursingtheatrerecord_anaesthetic_anaesthetic
		$this->createTable('et_ophcinursingtheatrerecord_anaesthetic_anaesthetic', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcinursingtheatrerecord_anaesthetic_anaesthetic_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcinursingtheatrerecord_anaesthetic_anaesthetic_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcinursingtheatrerecord_anaesthetic_anaesthetic_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcinursingtheatrerecord_anaesthetic_anaesthetic_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('et_ophcinursingtheatrerecord_anaesthetic_anaesthetic',array('name'=>'General anaesthetic','display_order'=>1));
		$this->insert('et_ophcinursingtheatrerecord_anaesthetic_anaesthetic',array('name'=>'Intracameral lidocaine 2%','display_order'=>2));



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophcinursingtheatrerecord_anaesthetic', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'anaesthetic_given_by_nurse' => 'tinyint(1) unsigned NOT NULL', // Anaesthetic given by nurse
				'nurse_id' => 'int(10) unsigned NOT NULL', // Nurse
				'anaesthetic_id' => 'int(10) unsigned NOT NULL', // Anaesthetic
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcinursingtheatrerecord_anaesthetic_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcinursingtheatrerecord_anaesthetic_cui_fk` (`created_user_id`)',
				'KEY `et_ophcinursingtheatrerecord_anaesthetic_ev_fk` (`event_id`)',
				'KEY `et_ophcinursingtheatrerecord_anaesthetic_nurse_id_fk` (`nurse_id`)',
				'KEY `et_ophcinursingtheatrerecord_anaesthetic_anaesthetic_fk` (`anaesthetic_id`)',
				'CONSTRAINT `et_ophcinursingtheatrerecord_anaesthetic_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcinursingtheatrerecord_anaesthetic_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcinursingtheatrerecord_anaesthetic_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `et_ophcinursingtheatrerecord_anaesthetic_nurse_id_fk` FOREIGN KEY (`nurse_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcinursingtheatrerecord_anaesthetic_anaesthetic_fk` FOREIGN KEY (`anaesthetic_id`) REFERENCES `et_ophcinursingtheatrerecord_anaesthetic_anaesthetic` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

	}

	public function down() {
		// --- drop any element related tables ---
		// --- drop element tables ---
		$this->dropTable('et_ophcinursingtheatrerecord_preoperativerecord');



		$this->dropTable('et_ophcinursingtheatrerecord_personnel');



		$this->dropTable('et_ophcinursingtheatrerecord_cataractsurgery');


		$this->dropTable('et_ophcinursingtheatrerecord_cataractsurgery_surgery');
		$this->dropTable('et_ophcinursingtheatrerecord_cataractsurgery_position');

		$this->dropTable('et_ophcinursingtheatrerecord_anaesthetic');


		$this->dropTable('et_ophcinursingtheatrerecord_anaesthetic_anaesthetic');


		// --- delete event entries ---
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('name=:name', array(':name'=>'Nursing theatre record'))->queryRow();

		foreach ($this->dbConnection->createCommand()->select('id')->from('event')->where('event_type_id=:event_type_id', array(':event_type_id'=>$event_type['id']))->queryAll() as $row) {
			$this->delete('audit', 'event_id='.$row['id']);
			$this->delete('event', 'id='.$row['id']);
		}

		// --- delete entries from element_type ---
		$this->delete('element_type', 'event_type_id='.$event_type['id']);

		// --- delete entries from event_type ---
		$this->delete('event_type', 'id='.$event_type['id']);

		// echo "m000000_000001_event_type_OphCiNursingtheatrerecord does not support migration down.\n";
		// return false;
		echo "If you are removing this module you may also need to remove references to it in your configuration files\n";
		return true;
	}
}
?>
