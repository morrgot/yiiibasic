<?php
/**
 * Created by PhpStorm.
 * User: aponirovskiy
 * Date: 24.02.2016
 * Time: 11:55
 */

namespace app\components\behaviors;


use yii\base\Behavior;

class TestBehavior extends Behavior{

    public function func()
    {
        var_dump($this->owner);
    }

}