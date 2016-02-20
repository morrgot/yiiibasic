<?php
/**
 * Created by PhpStorm.
 * User: aponirovskiy
 * Date: 18.02.2016
 * Time: 17:26
 */

namespace app\components\actions;


use yii\base\Action;
use yii\base\Widget;
use yii\filters\ContentNegotiator;
use yii\helpers\ArrayHelper;
use yii\web\Response;

class TestAction extends Action{

    protected $start_time;

    protected $end_time;

    public function behaviorss()
    {
        //return parent::behaviors(); // TODO: Change the autogenerated stub

        return ArrayHelper::merge([
            'content-neg' => [
                'class' => ContentNegotiator::className(),
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                    'application/xml' => Response::FORMAT_XML,
                ],
                'languages' => [
                    'en-US',
                    'de',
                ],
            ]
        ],parent::behaviors());
    }


    public function run()
    {
        //new Widget()
        //echo '<h1>adasd1123</h1>';
        $this->dosmth(array(1));
        //phpinfo();
        //return array('name' => 'vasya');

        //return \Yii::$app->view->render('@app/views/site/test', array('param' => 'echhoo!!'));
    }

    protected function dosmth(array $arr){
        p($arr);
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