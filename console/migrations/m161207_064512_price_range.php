<?php

use yii\db\Migration;

class m161207_064512_price_range extends Migration
{
    public function up()
    {
      $this->createTable('price_range', [
          'id' => $this->primaryKey(),
          'from_price' => $this->integer()->notNull(),
          'to_price' => $this->integer()->notNull(),
          'text' => $this->string()->notNull(),
          'status' => $this->smallInteger()->notNull()->defaultValue(0),
          'updated_at' => $this->integer()->notNull(),
          'created_at' => $this->integer()->notNull(),
      ]);
    }

    public function down()
    {
        $this->dropTable('price_range');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
