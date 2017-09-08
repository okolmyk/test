<?php

use yii\db\Migration;

class m170314_163810_my_date extends Migration
{
    public function up()
    {
		$this->createTable('{{%date}}', [
			'id' => $this->primaryKey(),
			'date' => $this->datetime()->notNull(),
			'artist_id' => $this->integer()->notNull(),
			'concert_place_id' => $this->integer()->notNull(),
		]);
		
		$this->addForeignKey('fk-date-artists', '{{%date}}', 'artist_id', '{{%artists}}', 'id', 'CASCADE', 'RESTRICT');
		$this->addForeignKey('fk-date-concert_place', '{{%date}}', 'concert_place_id', '{{%concert_place}}', 'id', 'CASCADE', 'RESTRICT');
		
    }

    public function down()
    {
       $this->dropTable('{{%date}}');
    }

   
}
