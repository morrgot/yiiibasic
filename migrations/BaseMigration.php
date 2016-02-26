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

}