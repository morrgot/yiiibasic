<?php

use yii\db\Migration;
use \app\migrations\BaseMigration;

class m160226_155733_create_images extends BaseMigration
{
    public function safeUp()
    {
        $this->createTableIfNotExists(self::IMAGES_TABLE_NAME, [
            'id' => $this->primaryKey(),
            'date_add' => $this->dateTime()->notNull(),
            'temp' => $this->boolean(),
            'full_path' => $this->string(),
            'basename' => $this->string(100),
            'src' => $this->string(),
            'extension' => $this->string(10),
            'mime' => $this->string(20)
        ]);

        $this->addForeignKey(
            'fk-'.$this->getRawTableName(self::USERS_TABLE_NAME).'-avatar',
            self::USERS_TABLE_NAME,
            'avatar',
            self::IMAGES_TABLE_NAME,
            'id',
            'CASCADE'
        );

    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-'.$this->getRawTableName(self::USERS_TABLE_NAME).'-avatar', self::USERS_TABLE_NAME);
        $this->dropTable(self::IMAGES_TABLE_NAME);
    }
}
