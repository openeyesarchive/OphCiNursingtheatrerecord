<?php

class m130214_112328_patient_observations extends CDbMigration
{
	public function up()
	{
		$event_type = EventType::model()->find('class_name=?',array('OphCiNursingtheatrerecord'));

		$this->insert('element_type',array('name'=>'Patient observations','class_name'=>'Element_OphCiNursingtheatrerecord_PatientObservations','event_type_id'=>$event_type->id,'display_order'=>2,'default'=>1));

		$this->createTable('et_ophcinursingtheatrerecord_patient_observations', array(
			'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
			'event_id' => 'int(10) unsigned NOT NULL',
			'spo2' => 'tinyint(1) unsigned NOT NULL',
			'oxygen' => 'tinyint(1) unsigned NOT NULL',
			'temperature' => 'decimal(3,1) NOT NULL',
			'pulse' => 'tinyint(1) unsigned NOT NULL',
			'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
			'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
			'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
			'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
			'PRIMARY KEY (`id`)',
			'KEY `et_ophcinursingtheatrerecord_po_lmui_fk` (`last_modified_user_id`)',
			'KEY `et_ophcinursingtheatrerecord_po_cuid_fk` (`created_user_id`)',
			'KEY `et_ophcinursingtheatrerecord_po_eid_fk` (`event_id`)',
			'CONSTRAINT `et_ophcinursingtheatrerecord_po_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
			'CONSTRAINT `et_ophcinursingtheatrerecord_po_cuid_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			'CONSTRAINT `et_ophcinursingtheatrerecord_po_eid_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
		), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');
	}

	public function down()
	{
		$this->dropTable('et_ophcinursingtheatrerecord_patient_observations');

		$event_type = EventType::model()->find('class_name=?',array('OphCiNursingtheatrerecord'));

		$this->delete('element_type',"event_type_id = $event_type->id and class_name = 'Element_OphCiNursingtheatrerecord_PatientObservations'");
	}
}
