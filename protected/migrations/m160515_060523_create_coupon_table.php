<?php

class m160515_060523_create_coupon_table extends CDbMigration
{
    public function up()
    {
        $this->createTable('tbl_promote_codes', array(
            'id' => 'pk',
            'code' => 'string NOT NULL',
            'discount' => 'string NOT NULL',
            'tenant_info' => 'text',
            'user_info' => 'text',
            'wifi_area' => 'text',
            'parameters' => 'text',
            'created_at' => 'datetime NOT NULL',
            'status' => 'boolean DEFAULT 0',
            'updated_at' => 'datetime',
        ));
	}

	public function down()
	{
        $this->dropTable('tbl_promote_codes');
	}
}