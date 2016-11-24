<?php

use yii\db\Migration;

/**
 * Handles the creation for table `order`.
 */
class m161124_102928_create_order_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('order', [
            'id' => $this->primaryKey(),
            'fullname' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'address' => $this->string()->notNull(),
            'company' => $this->string(),
            'data' => $this->text()->append('CHARACTER SET utf8 COLLATE utf8_unicode_ci'),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('order');
    }
}
