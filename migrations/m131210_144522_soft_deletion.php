<?php

class m131210_144522_soft_deletion extends CDbMigration
{
	public function up()
	{
		$this->addColumn('ophcinursingtheatrerecord_intraoperative_aid','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcinursingtheatrerecord_intraoperative_aid_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcinursingtheatrerecord_intraoperative_aids','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcinursingtheatrerecord_intraoperative_aids_version','deleted','tinyint(1) unsigned not null');
	}

	public function down()
	{
		$this->dropColumn('ophcinursingtheatrerecord_intraoperative_aid','deleted');
		$this->dropColumn('ophcinursingtheatrerecord_intraoperative_aid_version','deleted');
		$this->dropColumn('ophcinursingtheatrerecord_intraoperative_aids','deleted');
		$this->dropColumn('ophcinursingtheatrerecord_intraoperative_aids_version','deleted');
	}
}
