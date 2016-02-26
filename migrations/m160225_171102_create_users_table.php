<?php

use yii\db\Migration;
use yii\db\Schema;

class m160225_171102_create_users_table extends \app\migrations\BaseMigration
{

    public function safeUp()
    {
        $this->createTableIfNotExists(self::USERS_TABLE_NAME, [
            'id' => $this->primaryKey(),
            'email' => $this->string(40)->notNull()->unique(),
            'password' => $this->string(50)->notNull(),
            'first_name' => $this->string(20)->notNull(),
            'last_name' => $this->string(20)->notNull(),
            'avatar' => $this->integer(),
            'active' => $this->boolean(),
            'added' => $this->dateTime()
        ]);
    }

    public function safeDown()
    {
        $this->dropTable(self::USERS_TABLE_NAME);
    }

}
