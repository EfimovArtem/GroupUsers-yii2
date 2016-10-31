<?php

use yii\db\Migration;
use yii\db\Schema;

class m161031_024442_dump extends Migration
{
    public function up()
    {
        // group_users
        $this->createTable('{{%group_users}}', [
            'id' => Schema::TYPE_PK,
            'group_id' => Schema::TYPE_INTEGER . "(11) NOT NULL",
            'user_id' => Schema::TYPE_INTEGER . "(11) NOT NULL",
        ], $this->tableOptions);

        // groups
        $this->createTable('{{%groups}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . "(255) NOT NULL",
        ], $this->tableOptions);

        // users
        $this->createTable('{{%users}}', [
            'id' => Schema::TYPE_PK,
            'email' => Schema::TYPE_STRING . "(255) NOT NULL",
            'first_name' => Schema::TYPE_STRING . "(35) NULL",
            'last_name' => Schema::TYPE_STRING . "(35) NULL",
            'status' => "enum('0','1') NOT NULL",
            'create_date' => Schema::TYPE_TIMESTAMP . " NOT NULL DEFAULT CURRENT_TIMESTAMP",
        ], $this->tableOptions);

         // fk: group_users
        $this->addForeignKey('fk_group_users_group_id', '{{%group_users}}', 'group_id', '{{%groups}}', 'id');
        $this->addForeignKey('fk_group_users_user_id', '{{%group_users}}', 'user_id', '{{%users}}', 'id');
    }

    public function down()
    {
    }
}
