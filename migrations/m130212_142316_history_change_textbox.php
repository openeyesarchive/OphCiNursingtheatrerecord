<?php

class m130212_142316_history_change_textbox extends CDbMigration
{
	public function up()
	{
		$this->addColumn('et_ophcinursingtheatrerecord_preoperativerecord','history_change_notes','varchar(2048) NOT NULL');
	}

	public function down()
	{
		$this->dropColumn('et_ophcinursingtheatrerecord_preoperativerecord','history_change_notes');
	}
}
