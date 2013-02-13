<?php

class m130213_154005_remove_anaesthetic_element extends CDbMigration
{
	public function up()
	{
		$event_type = EventType::model()->find('class_name=?',array('OphCiNursingtheatrerecord'));
		$this->delete('element_type',"event_type_id = $event_type->id and class_name = 'Element_OphCiNursingtheatrerecord_Anaesthetic'");

		$this->dropTable('et_ophcinursingtheatrerecord_anaesthetic');
		$this->dropTable('et_ophcinursingtheatrerecord_anaesthetic_anaesthetic');
	}

	public function down()
	{
		$event_type = EventType::model()->find('class_name=?',array('OphCiNursingtheatrerecord'));

		$this->insert('element_type',array('name'=>'Anaesthetic','class_name'=>'Element_OphCiNursingtheatrerecord_Anaesthetic','event_type_id'=>$event_type->id,'display_order'=>1,'default'=>1));

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
}
