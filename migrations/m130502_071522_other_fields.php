<?php

class m130502_071522_other_fields extends CDbMigration
{
	public function up()
	{
		$this->addColumn('et_ophcinursingtheatrerecord_personnel','scrub_nurse','varchar(64) NOT NULL');
		$this->addColumn('et_ophcinursingtheatrerecord_personnel','floor_nurse','varchar(64) NOT NULL');
		$this->addColumn('et_ophcinursingtheatrerecord_personnel','accompanying_nurse','varchar(64) NOT NULL');
		$this->addColumn('et_ophcinursingtheatrerecord_personnel','surgeon','varchar(64) NOT NULL');
		$this->addColumn('et_ophcinursingtheatrerecord_personnel','operating_department_practitioner','varchar(64) NOT NULL');
		$this->addColumn('et_ophcinursingtheatrerecord_personnel','assistant','varchar(64) NOT NULL');
		$this->addColumn('et_ophcinursingtheatrerecord_personnel','anaesthetist','varchar(64) NOT NULL');

		$this->alterColumn('et_ophcinursingtheatrerecord_personnel','scrub_nurse_id','int(10) unsigned NULL');
		$this->alterColumn('et_ophcinursingtheatrerecord_personnel','floor_nurse_id','int(10) unsigned NULL');
		$this->alterColumn('et_ophcinursingtheatrerecord_personnel','accompanying_nurse_id','int(10) unsigned NULL');
		$this->alterColumn('et_ophcinursingtheatrerecord_personnel','surgeon_id','int(10) unsigned NULL');
		$this->alterColumn('et_ophcinursingtheatrerecord_personnel','operating_department_practitioner_id','int(10) unsigned NULL');
		$this->alterColumn('et_ophcinursingtheatrerecord_personnel','assistant_id','int(10) unsigned NULL');
		$this->alterColumn('et_ophcinursingtheatrerecord_personnel','anaesthetist_id','int(10) unsigned NULL');
	}

	public function down()
	{
		$this->alterColumn('et_ophcinursingtheatrerecord_personnel','scrub_nurse_id','int(10) unsigned NOT NULL');
		$this->alterColumn('et_ophcinursingtheatrerecord_personnel','floor_nurse_id','int(10) unsigned NOT NULL');
		$this->alterColumn('et_ophcinursingtheatrerecord_personnel','accompanying_nurse_id','int(10) unsigned NOT NULL');
		$this->alterColumn('et_ophcinursingtheatrerecord_personnel','surgeon_id','int(10) unsigned NOT NULL');
		$this->alterColumn('et_ophcinursingtheatrerecord_personnel','operating_department_practitioner_id','int(10) unsigned NOT NULL');
		$this->alterColumn('et_ophcinursingtheatrerecord_personnel','assistant_id','int(10) unsigned NOT NULL');
		$this->alterColumn('et_ophcinursingtheatrerecord_personnel','anaesthetist_id','int(10) unsigned NOT NULL');

		$this->dropColumn('et_ophcinursingtheatrerecord_personnel','anaesthetist');
		$this->dropColumn('et_ophcinursingtheatrerecord_personnel','assistant');
		$this->dropColumn('et_ophcinursingtheatrerecord_personnel','operating_department_practitioner');
		$this->dropColumn('et_ophcinursingtheatrerecord_personnel','surgeon');
		$this->dropColumn('et_ophcinursingtheatrerecord_personnel','accompanying_nurse');
		$this->dropColumn('et_ophcinursingtheatrerecord_personnel','floor_nurse');
		$this->dropColumn('et_ophcinursingtheatrerecord_personnel','scrub_nurse');
	}
}
