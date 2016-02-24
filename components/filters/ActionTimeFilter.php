<?php
/**
 * Created by PhpStorm.
 * User: aponirovskiy
 * Date: 24.02.2016
 * Time: 12:31
 */

namespace app\components\filters;

use app\components\actions\TestAction;
use Yii;
use yii\base\Action;
use yii\base\ActionFilter;

class ActionTimeFilter extends ActionFilter
{
    private $_startTime;

    public function beforeAction($action)
    {
        $this->_startTime = microtime(true);
        return parent::beforeAction($action);
    }

    /**
     * @param TestAction $action
     * @param mixed $result
     * @return mixed
     */
    public function afterAction($action, $result)
    {

        $time = microtime(true) - $this->_startTime;
        Yii::trace("Action '{$action->uniqueId}' spent $time second.");

        echo "\n\n\n<h3>Action time:</h3><i>".round((float)$time, 8).'</i>';

        return parent::afterAction($action, $result);
    }

}