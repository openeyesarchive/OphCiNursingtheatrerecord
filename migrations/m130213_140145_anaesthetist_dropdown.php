<?php

class m130213_140145_anaesthetist_dropdown extends CDbMigration
{
	public function up()
	{
		$this->addColumn('et_ophcinursingtheatrerecord_personnel','anaesthetist_id','int(10) unsigned NOT NULL DEFAULT 1');
		$this->alterColumn('et_ophcinursingtheatrerecord_personnel','anaesthetist_id','int(10) unsigned NOT NULL');

		$this->createIndex('et_ophcinursingtheatrerecord_personnel_anaesthetist_id_fk','et_ophcinursingtheatrerecord_personnel','anaesthetist_id');
		$this->addForeignKey('et_ophcinursingtheatrerecord_personnel_anaesthetist_id_fk','et_ophcinursingtheatrerecord_personnel','anaesthetist_id','user','id');
	}

	public function down()
	{
		$this->dropForeignKey('et_ophcinursingtheatrerecord_personnel_anaesthetist_id_fk','et_ophcinursingtheatrerecord_personnel');
		$this->dropIndex('et_ophcinursingtheatrerecord_personnel_anaesthetist_id_fk','et_ophcinursingtheatrerecord_personnel');

		$this->dropColumn('et_ophcinursingtheatrerecord_personnel','anaesthetist_id');
	}
}
