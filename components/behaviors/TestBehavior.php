<?php
/**
 * Created by PhpStorm.
 * User: aponirovskiy
 * Date: 24.02.2016
 * Time: 11:55
 */

namespace app\components\behaviors;


use app\components\actions\TestAction;
use app\components\events\TestEvent;
use yii\base\Behavior;
use yii\base\Event;

class TestBehavior extends Behavior{

    protected static $eventHandlers = [
        TestAction::TEST_EVENT => 'onTestEvent',
    ];

    public function events()
    {
        return static::$eventHandlers;
    }


    public function onTestEvent(TestEvent $event = null)
    {
        echo '<h1>onTestEvent launched!!</h1>';
        var_dump($event->getAdditional());
    }

    public function missedMethod()
    {
        echo '<h2>Called missed method!</h2>';
    }
}