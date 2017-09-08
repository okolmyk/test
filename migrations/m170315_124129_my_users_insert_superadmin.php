<?php

use yii\db\Migration;

class m170315_124129_my_users_insert_superadmin extends Migration
{
    public function up()
    {
			$this->insert('{{%users}}', [
					'username' => 'superadmin',
					'last_name' => 'superadmin',		
					'password' => '123456',		
					'auth_key' => '123456',		
					'access_token' => '123456',		
					'adminGroup' => 'superadmin',
				]);
    }

    public function down()
    {
        
    }

    
}
