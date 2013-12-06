<?php

class m131206_150637_soft_deletion extends CDbMigration
{
	public function up()
	{
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
	}

	public function down()
	{
		$this->dropColumn('et_ophcinursingtheatrerecord_cataractsurgery','deleted');
		$this->dropColumn('et_ophcinursingtheatrerecord_cataractsurgery_version','deleted');
		$this->dropColumn('et_ophcinursingtheatrerecord_cataractsurgery_position','deleted');
		$this->dropColumn('et_ophcinursingtheatrerecord_cataractsurgery_position_version','deleted');
		$this->dropColumn('et_ophcinursingtheatrerecord_cataractsurgery_surgery','deleted');
		$this->dropColumn('et_ophcinursingtheatrerecord_cataractsurgery_surgery_version','deleted');
		$this->dropColumn('et_ophcinursingtheatrerecord_dayofoperation','deleted');
		$this->dropColumn('et_ophcinursingtheatrerecord_dayofoperation_version','deleted');
		$this->dropColumn('et_ophcinursingtheatrerecord_patient_observations','deleted');
		$this->dropColumn('et_ophcinursingtheatrerecord_patient_observations_version','deleted');
		$this->dropColumn('et_ophcinursingtheatrerecord_personnel','deleted');
		$this->dropColumn('et_ophcinursingtheatrerecord_personnel_version','deleted');
	}
}
