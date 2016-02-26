<?php
/**
 * Created by PhpStorm.
 * User: aponirovskiy
 * Date: 26.02.2016
 * Time: 16:45
 */

namespace app\migrations;

use yii\db\Migration;

abstract class BaseMigration extends Migration{

    const USERS_TABLE_NAME = '{{%users}}';
    const IMAGES_TABLE_NAME = '{{%images}}';

    /**
     * @param string $table_name
     * @return string
     * @throws \yii\base\NotSupportedException
     */
    protected function getRawTableName($table_name)
    {
        return $this->getDb()->getSchema()->getRawTableName($table_name);
    }

    /**
     * @param string $table table name.
     * @param array $columns columns
     * @param array $options additional options
     */
    public function createTableIfNotExists($table, $columns, $options = null)
    {
        if(!$this->tableExists($table)){
            $this->createTable($table, $columns, $options);
        }
    }

    /**
     * @param string $table the table to be dropped. The name will be properly quoted by the method.
     */
    public function dropTableIfExists($table)
    {
        if($this->tableExists($table)){
            $this->dropTable($table);
        }
    }

    /**
     * @param string $table_name
     * @return bool
     * @throws \yii\base\NotSupportedException
     */
    protected function tableExists($table_name)
    {
        return in_array($this->getRawTableName($table_name), $this->getDb()->getSchema()->getTableNames());
    }

}