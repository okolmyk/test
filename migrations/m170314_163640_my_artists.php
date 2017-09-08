<?php

use yii\db\Migration;

class m170314_163640_my_artists extends Migration
{
    public function up()
    {
		$this->createTable('{{%artists}}', [
			'id' => $this->primaryKey(),
			'name' => $this->string()->notNull(),
			'last_name' => $this->string()->notNull(),
		]);
    }

    public function down()
    {
        $this->dropTable('{{%artists}}');
    }

    
}
