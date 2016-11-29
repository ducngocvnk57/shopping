<?php
use frontend\models\SignupForm;
use yii\db\Migration;

class m161129_043840_create_admin extends Migration
{
    public function up()
    {
      $admin = new SignupForm();
      $admin->username = 'admin';
      $admin->email = 'admin@admin.vn';
      $admin->password = '12345678';
      $admin->signup();
    }

    public function down()
    {
        echo "m161129_043840_create_admin cannot be reverted.\n";

        return false;
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
