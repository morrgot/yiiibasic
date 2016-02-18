<?php
/**
 * Created by PhpStorm.
 * User: aponirovskiy
 * Date: 18.02.2016
 * Time: 17:26
 */

namespace app\components\actions;


use yii\base\Action;

class TestAction extends Action{

    protected $start_time;

    protected $end_time;

    public function run()
    {
        echo 'adasdasdasd';

        $this->render();
    }

    protected function beforeRun()
    {
        $this->start_time = microtime(true);
        return true;
    }

    protected function afterRun()
    {
        $this->end_time = microtime(true);

        echo "\n\n\n".round(abs($this->end_time - $this->start_time), 8);
    }

}