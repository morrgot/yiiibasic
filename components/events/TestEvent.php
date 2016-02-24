<?php
/**
 * Created by PhpStorm.
 * User: aponirovskiy
 * Date: 23.02.2016
 * Time: 19:19
 */

namespace app\components\events;


use yii\base\Event;

class TestEvent extends Event{

    /**
     * @var mixed
     */
    protected $additional;

    /**
     * @return mixed
     */
    public function getAdditional()
    {
        return $this->additional;
    }

    /**
     * @param mixed $additional
     */
    public function setAdditional($additional)
    {
        $this->additional = $additional;
    }
    

}