<?php

use yii\db\Migration;

class m170314_163715_my_concert_place extends Migration
{
    public function up()
    {
		$this->createTable('{{%concert_place}}', [
			'id' => $this->primaryKey(),
			'city' => $this->string()->notNull(),
		]);
    }

    public function down()
    {
       $this->dropTable('{{%concert_place}}');
    }

    
}
