<?php

class m131205_105548_table_versioning extends CDbMigration
{
	public function up()
	{
		$this->execute("
CREATE TABLE `et_ophcinursingtheatrerecord_cataractsurgery_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`surgery_id` int(10) unsigned NOT NULL DEFAULT '1',
	`position_id` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`diathermy` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`surgery_notes` varchar(1024) NOT NULL,
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcinursingtheatrerecord_cataractsurgery_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcinursingtheatrerecord_cataractsurgery_cui_fk` (`created_user_id`),
	KEY `acv_et_ophcinursingtheatrerecord_cataractsurgery_ev_fk` (`event_id`),
	KEY `acv_et_ophcinursingtheatrerecord_cataractsurgery_surgery_fk` (`surgery_id`),
	KEY `acv_et_ophcinursingtheatrerecord_cataractsurgery_position_fk` (`position_id`),
	CONSTRAINT `acv_et_ophcinursingtheatrerecord_cataractsurgery_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcinursingtheatrerecord_cataractsurgery_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
	CONSTRAINT `acv_et_ophcinursingtheatrerecord_cataractsurgery_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcinursingtheatrerecord_cataractsurgery_position_fk` FOREIGN KEY (`position_id`) REFERENCES `et_ophcinursingtheatrerecord_cataractsurgery_position` (`id`),
	CONSTRAINT `acv_et_ophcinursingtheatrerecord_cataractsurgery_surgery_fk` FOREIGN KEY (`surgery_id`) REFERENCES `et_ophcinursingtheatrerecord_cataractsurgery_surgery` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('et_ophcinursingtheatrerecord_cataractsurgery_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcinursingtheatrerecord_cataractsurgery_version');

		$this->createIndex('et_ophcinursingtheatrerecord_cataractsurgery_aid_fk','et_ophcinursingtheatrerecord_cataractsurgery_version','id');
		$this->addForeignKey('et_ophcinursingtheatrerecord_cataractsurgery_aid_fk','et_ophcinursingtheatrerecord_cataractsurgery_version','id','et_ophcinursingtheatrerecord_cataractsurgery','id');

		$this->addColumn('et_ophcinursingtheatrerecord_cataractsurgery_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcinursingtheatrerecord_cataractsurgery_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcinursingtheatrerecord_cataractsurgery_version','version_id');
		$this->alterColumn('et_ophcinursingtheatrerecord_cataractsurgery_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcinursingtheatrerecord_cataractsurgery_position_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_phcinursingtheatrerecord_cataractsurgery_position_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcinursingtheatrerecord_cataractsurgery_position_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_phcinursingtheatrerecord_cataractsurgery_position_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcinursingtheatrerecord_cataractsurgery_position_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('et_ophcinursingtheatrerecord_cataractsurgery_position_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcinursingtheatrerecord_cataractsurgery_position_version');

		$this->createIndex('et_ophcinursingtheatrerecord_cataractsurgery_position_aid_fk','et_ophcinursingtheatrerecord_cataractsurgery_position_version','id');
		$this->addForeignKey('et_ophcinursingtheatrerecord_cataractsurgery_position_aid_fk','et_ophcinursingtheatrerecord_cataractsurgery_position_version','id','et_ophcinursingtheatrerecord_cataractsurgery_position','id');

		$this->addColumn('et_ophcinursingtheatrerecord_cataractsurgery_position_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcinursingtheatrerecord_cataractsurgery_position_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcinursingtheatrerecord_cataractsurgery_position_version','version_id');
		$this->alterColumn('et_ophcinursingtheatrerecord_cataractsurgery_position_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcinursingtheatrerecord_cataractsurgery_surgery_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcinursingtheatrerecord_cataractsurgery_surgery_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcinursingtheatrerecord_cataractsurgery_surgery_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_et_ophcinursingtheatrerecord_cataractsurgery_surgery_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcinursingtheatrerecord_cataractsurgery_surgery_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('et_ophcinursingtheatrerecord_cataractsurgery_surgery_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcinursingtheatrerecord_cataractsurgery_surgery_version');

		$this->createIndex('et_ophcinursingtheatrerecord_cataractsurgery_surgery_aid_fk','et_ophcinursingtheatrerecord_cataractsurgery_surgery_version','id');
		$this->addForeignKey('et_ophcinursingtheatrerecord_cataractsurgery_surgery_aid_fk','et_ophcinursingtheatrerecord_cataractsurgery_surgery_version','id','et_ophcinursingtheatrerecord_cataractsurgery_surgery','id');

		$this->addColumn('et_ophcinursingtheatrerecord_cataractsurgery_surgery_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcinursingtheatrerecord_cataractsurgery_surgery_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcinursingtheatrerecord_cataractsurgery_surgery_version','version_id');
		$this->alterColumn('et_ophcinursingtheatrerecord_cataractsurgery_surgery_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcinursingtheatrerecord_dayofoperation_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`change_of_medical_history_since_pre_operative_assessment` tinyint(1) unsigned DEFAULT NULL,
	`inr_level_if_applicable` varchar(255) DEFAULT '',
	`pre_operative_checklist_completed_and_filed_in_notes` tinyint(1) unsigned DEFAULT NULL,
	`cdj_checklist_completed_and_filed_in_notes` tinyint(1) unsigned DEFAULT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`history_change_notes` varchar(2048) NOT NULL,
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcinursingtheatrerecord_dayofoperation_ev_fk` (`event_id`),
	KEY `acv_et_ophcinursingtheatrerecord_dayofoperation_cui_fk` (`created_user_id`),
	KEY `acv_et_ophcinursingtheatrerecord_dayofoperation_lmui_fk` (`last_modified_user_id`),
	CONSTRAINT `acv_et_ophcinursingtheatrerecord_dayofoperation_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcinursingtheatrerecord_dayofoperation_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
	CONSTRAINT `acv_et_ophcinursingtheatrerecord_dayofoperation_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('et_ophcinursingtheatrerecord_dayofoperation_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcinursingtheatrerecord_dayofoperation_version');

		$this->createIndex('et_ophcinursingtheatrerecord_dayofoperation_aid_fk','et_ophcinursingtheatrerecord_dayofoperation_version','id');
		$this->addForeignKey('et_ophcinursingtheatrerecord_dayofoperation_aid_fk','et_ophcinursingtheatrerecord_dayofoperation_version','id','et_ophcinursingtheatrerecord_dayofoperation','id');

		$this->addColumn('et_ophcinursingtheatrerecord_dayofoperation_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcinursingtheatrerecord_dayofoperation_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcinursingtheatrerecord_dayofoperation_version','version_id');
		$this->alterColumn('et_ophcinursingtheatrerecord_dayofoperation_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcinursingtheatrerecord_patient_observations_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`spo2` tinyint(1) unsigned NOT NULL,
	`oxygen` tinyint(1) unsigned NOT NULL,
	`temperature` decimal(3,1) NOT NULL,
	`pulse` tinyint(1) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcinursingtheatrerecord_po_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcinursingtheatrerecord_po_cuid_fk` (`created_user_id`),
	KEY `acv_et_ophcinursingtheatrerecord_po_eid_fk` (`event_id`),
	CONSTRAINT `acv_et_ophcinursingtheatrerecord_po_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcinursingtheatrerecord_po_cuid_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcinursingtheatrerecord_po_eid_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('et_ophcinursingtheatrerecord_patient_observations_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcinursingtheatrerecord_patient_observations_version');

		$this->createIndex('et_ophcinursingtheatrerecord_patient_observations_aid_fk','et_ophcinursingtheatrerecord_patient_observations_version','id');
		$this->addForeignKey('et_ophcinursingtheatrerecord_patient_observations_aid_fk','et_ophcinursingtheatrerecord_patient_observations_version','id','et_ophcinursingtheatrerecord_patient_observations','id');

		$this->addColumn('et_ophcinursingtheatrerecord_patient_observations_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcinursingtheatrerecord_patient_observations_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcinursingtheatrerecord_patient_observations_version','version_id');
		$this->alterColumn('et_ophcinursingtheatrerecord_patient_observations_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcinursingtheatrerecord_personnel_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`scrub_nurse_id` int(10) unsigned DEFAULT NULL,
	`floor_nurse_id` int(10) unsigned DEFAULT NULL,
	`accompanying_nurse_id` int(10) unsigned DEFAULT NULL,
	`surgeon_id` int(10) unsigned DEFAULT NULL,
	`operating_department_practitioner_id` int(10) unsigned DEFAULT NULL,
	`assistant_id` int(10) unsigned DEFAULT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`anaesthetist_id` int(10) unsigned DEFAULT NULL,
	`scrub_nurse` varchar(64) NOT NULL,
	`floor_nurse` varchar(64) NOT NULL,
	`accompanying_nurse` varchar(64) NOT NULL,
	`surgeon` varchar(64) NOT NULL,
	`operating_department_practitioner` varchar(64) NOT NULL,
	`assistant` varchar(64) NOT NULL,
	`anaesthetist` varchar(64) NOT NULL,
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcinursingtheatrerecord_personnel_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcinursingtheatrerecord_personnel_cui_fk` (`created_user_id`),
	KEY `acv_et_ophcinursingtheatrerecord_personnel_ev_fk` (`event_id`),
	KEY `acv_et_ophcinursingtheatrerecord_personnel_scrub_nurse_id_fk` (`scrub_nurse_id`),
	KEY `acv_et_ophcinursingtheatrerecord_personnel_floor_nurse_id_fk` (`floor_nurse_id`),
	KEY `acv_phcinursingtheatrerecord_personnel_accompanying_nurse_id_fk` (`accompanying_nurse_id`),
	KEY `acv_et_ophcinursingtheatrerecord_personnel_surgeon_id_fk` (`surgeon_id`),
	KEY `acv_et_ophcinursingtheatrerecord_oopd_id_fk` (`operating_department_practitioner_id`),
	KEY `acv_et_ophcinursingtheatrerecord_personnel_assistant_id_fk` (`assistant_id`),
	KEY `acv_et_ophcinursingtheatrerecord_personnel_anaesthetist_id_fk` (`anaesthetist_id`),
	CONSTRAINT `acv_et_ophcinursingtheatrerecord_oopd_id_fk` FOREIGN KEY (`operating_department_practitioner_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_phcinursingtheatrerecord_personnel_accompanying_nurse_id_fk` FOREIGN KEY (`accompanying_nurse_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcinursingtheatrerecord_personnel_anaesthetist_id_fk` FOREIGN KEY (`anaesthetist_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcinursingtheatrerecord_personnel_assistant_id_fk` FOREIGN KEY (`assistant_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcinursingtheatrerecord_personnel_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcinursingtheatrerecord_personnel_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
	CONSTRAINT `acv_et_ophcinursingtheatrerecord_personnel_floor_nurse_id_fk` FOREIGN KEY (`floor_nurse_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcinursingtheatrerecord_personnel_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcinursingtheatrerecord_personnel_scrub_nurse_id_fk` FOREIGN KEY (`scrub_nurse_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcinursingtheatrerecord_personnel_surgeon_id_fk` FOREIGN KEY (`surgeon_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('et_ophcinursingtheatrerecord_personnel_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcinursingtheatrerecord_personnel_version');

		$this->createIndex('et_ophcinursingtheatrerecord_personnel_aid_fk','et_ophcinursingtheatrerecord_personnel_version','id');
		$this->addForeignKey('et_ophcinursingtheatrerecord_personnel_aid_fk','et_ophcinursingtheatrerecord_personnel_version','id','et_ophcinursingtheatrerecord_personnel','id');

		$this->addColumn('et_ophcinursingtheatrerecord_personnel_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcinursingtheatrerecord_personnel_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcinursingtheatrerecord_personnel_version','version_id');
		$this->alterColumn('et_ophcinursingtheatrerecord_personnel_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophcinursingtheatrerecord_intraoperative_aid_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(64) NOT NULL,
	`display_order` tinyint(1) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophcinursingtheatrerecord_ia_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophcinursingtheatrerecord_ia_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_ophcinursingtheatrerecord_ia_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophcinursingtheatrerecord_ia_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('ophcinursingtheatrerecord_intraoperative_aid_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophcinursingtheatrerecord_intraoperative_aid_version');

		$this->createIndex('ophcinursingtheatrerecord_intraoperative_aid_aid_fk','ophcinursingtheatrerecord_intraoperative_aid_version','id');
		$this->addForeignKey('ophcinursingtheatrerecord_intraoperative_aid_aid_fk','ophcinursingtheatrerecord_intraoperative_aid_version','id','ophcinursingtheatrerecord_intraoperative_aid','id');

		$this->addColumn('ophcinursingtheatrerecord_intraoperative_aid_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophcinursingtheatrerecord_intraoperative_aid_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophcinursingtheatrerecord_intraoperative_aid_version','version_id');
		$this->alterColumn('ophcinursingtheatrerecord_intraoperative_aid_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophcinursingtheatrerecord_intraoperative_aids_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`element_id` int(10) unsigned NOT NULL,
	`aid_id` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophcinursingtheatrerecord_ias_ele_fk` (`element_id`),
	KEY `acv_ophcinursingtheatrerecord_ias_aid_fk` (`aid_id`),
	KEY `acv_ophcinursingtheatrerecord_ias_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophcinursingtheatrerecord_ias_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_ophcinursingtheatrerecord_ias_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcinursingtheatrerecord_cataractsurgery` (`id`),
	CONSTRAINT `acv_ophcinursingtheatrerecord_ias_aid_fk` FOREIGN KEY (`aid_id`) REFERENCES `ophcinursingtheatrerecord_intraoperative_aid` (`id`),
	CONSTRAINT `acv_ophcinursingtheatrerecord_ias_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophcinursingtheatrerecord_ias_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('ophcinursingtheatrerecord_intraoperative_aids_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophcinursingtheatrerecord_intraoperative_aids_version');

		$this->createIndex('ophcinursingtheatrerecord_intraoperative_aids_aid_fk','ophcinursingtheatrerecord_intraoperative_aids_version','id');

		$this->addColumn('ophcinursingtheatrerecord_intraoperative_aids_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophcinursingtheatrerecord_intraoperative_aids_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophcinursingtheatrerecord_intraoperative_aids_version','version_id');
		$this->alterColumn('ophcinursingtheatrerecord_intraoperative_aids_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->addColumn('et_ophcinursingtheatrerecord_cataractsurgery','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcinursingtheatrerecord_cataractsurgery_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcinursingtheatrerecord_cataractsurgery_position','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcinursingtheatrerecord_cataractsurgery_position_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcinursingtheatrerecord_cataractsurgery_surgery','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcinursingtheatrerecord_cataractsurgery_surgery_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcinursingtheatrerecord_dayofoperation','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcinursingtheatrerecord_dayofoperation_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcinursingtheatrerecord_patient_observations','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcinursingtheatrerecord_patient_observations_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcinursingtheatrerecord_personnel','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcinursingtheatrerecord_personnel_version','deleted','tinyint(1) unsigned not null');

		$this->addColumn('ophcinursingtheatrerecord_intraoperative_aid','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcinursingtheatrerecord_intraoperative_aid_version','deleted','tinyint(1) unsigned not null');
	}

	public function down()
	{
		$this->dropColumn('ophcinursingtheatrerecord_intraoperative_aid','deleted');

		$this->dropColumn('et_ophcinursingtheatrerecord_cataractsurgery','deleted');
		$this->dropColumn('et_ophcinursingtheatrerecord_cataractsurgery_position','deleted');
		$this->dropColumn('et_ophcinursingtheatrerecord_cataractsurgery_surgery','deleted');
		$this->dropColumn('et_ophcinursingtheatrerecord_dayofoperation','deleted');
		$this->dropColumn('et_ophcinursingtheatrerecord_patient_observations','deleted');
		$this->dropColumn('et_ophcinursingtheatrerecord_personnel','deleted');

		$this->dropTable('et_ophcinursingtheatrerecord_cataractsurgery_version');
		$this->dropTable('et_ophcinursingtheatrerecord_cataractsurgery_position_version');
		$this->dropTable('et_ophcinursingtheatrerecord_cataractsurgery_surgery_version');
		$this->dropTable('et_ophcinursingtheatrerecord_dayofoperation_version');
		$this->dropTable('et_ophcinursingtheatrerecord_patient_observations_version');
		$this->dropTable('et_ophcinursingtheatrerecord_personnel_version');
		$this->dropTable('ophcinursingtheatrerecord_intraoperative_aid_version');
		$this->dropTable('ophcinursingtheatrerecord_intraoperative_aids_version');
	}
}
