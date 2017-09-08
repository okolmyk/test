<?php

use yii\db\Migration;

class m170315_101810_my_users extends Migration
{
    public function up()
    {
		$this->createTable('{{%users}}', [
			'id' => $this->primaryKey(),
			'username' => $this->string()->notNull(),
			'last_name' => $this->string()->notNull(),		
			'password' => $this->string()->notNull(),		
			'auth_key' => $this->integer(),		
			'access_token' => $this->integer(),		
			'adminGroup' => "ENUM('superadmin', 'admin')",
		]);
    }

    public function down()
    {
        $this->dropTable('{{%users}}');
    }

    
}
