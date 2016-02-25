<?php

use yii\db\Migration;

class m160225_171102_create_users_table extends Migration
{
    public function up()
    {
        $this->createTable('users_table', [
            'id' => $this->primaryKey()
        ]);
    }

    public function down()
    {
        $this->dropTable('users_table');
    }
}
