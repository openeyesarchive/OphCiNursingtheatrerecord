<?php

class m130214_155654_cataract_surgery_extra_fields extends CDbMigration
{
	public function up()
	{
		$this->addColumn('et_ophcinursingtheatrerecord_cataractsurgery','diathermy','tinyint(1) unsigned NOT NULL DEFAULT 0');
		$this->addColumn('et_ophcinursingtheatrerecord_cataractsurgery','surgery_notes','varchar(1024) COLLATE utf8_bin NOT NULL');

		$this->insert('et_ophcinursingtheatrerecord_cataractsurgery_surgery',array('name'=>'Other','display_order'=>4));
	}

	public function down()
	{
		$this->delete('et_ophcinursingtheatrerecord_cataractsurgery_surgery',"name='Other'");

		$this->dropColumn('et_ophcinursingtheatrerecord_cataractsurgery','diathermy');
		$this->dropColumn('et_ophcinursingtheatrerecord_cataractsurgery','surgery_notes');
	}
}
