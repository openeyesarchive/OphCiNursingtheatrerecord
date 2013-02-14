<?php

class m130214_152151_cataract_surgery_intraoperative_aids extends CDbMigration
{
	public function up()
	{
		$this->createTable('ophcinursingtheatrerecord_intraoperative_aid', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(64) COLLATE utf8_bin NOT NULL',
				'display_order' => 'tinyint(1) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcinursingtheatrerecord_ia_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcinursingtheatrerecord_ia_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcinursingtheatrerecord_ia_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcinursingtheatrerecord_ia_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcinursingtheatrerecord_intraoperative_aid',array('name'=>'Gel pads','display_order'=>1));
		$this->insert('ophcinursingtheatrerecord_intraoperative_aid',array('name'=>'Bairhugger','display_order'=>2));
		$this->insert('ophcinursingtheatrerecord_intraoperative_aid',array('name'=>'Flo boots','display_order'=>3));

		$this->createTable('ophcinursingtheatrerecord_intraoperative_aids', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'aid_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcinursingtheatrerecord_ias_ele_fk` (`element_id`)',
				'KEY `ophcinursingtheatrerecord_ias_aid_fk` (`aid_id`)',
				'KEY `ophcinursingtheatrerecord_ias_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcinursingtheatrerecord_ias_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcinursingtheatrerecord_ias_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcinursingtheatrerecord_cataractsurgery` (`id`)',
				'CONSTRAINT `ophcinursingtheatrerecord_ias_aid_fk` FOREIGN KEY (`aid_id`) REFERENCES `ophcinursingtheatrerecord_intraoperative_aid` (`id`)',
				'CONSTRAINT `ophcinursingtheatrerecord_ias_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcinursingtheatrerecord_ias_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');
	}

	public function down()
	{
		$this->dropTable('ophcinursingtheatrerecord_intraoperative_aids');
		$this->dropTable('ophcinursingtheatrerecord_intraoperative_aid');
	}
}
