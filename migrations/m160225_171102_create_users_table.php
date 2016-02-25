<?php

use yii\db\Migration;
use yii\db\Schema;

class m160225_171102_create_users_table extends Migration
{
    const USERS_TABLE_NAME = 'users';

    public function up()
    {

    }

    public function down()
    {
        $this->dropTable(self::USERS_TABLE_NAME);
    }

    public function safeUp()
    {
        $this->createTable(self::USERS_TABLE_NAME, [
            'id' => $this->primaryKey(),
            'email' => $this->string(40)->notNull()->unique(),
            'password' => Schema::TYPE_STRING
        ]);
    }

    public function safeDown()
    {
        $this->dropTable(self::USERS_TABLE_NAME);
    }


}
