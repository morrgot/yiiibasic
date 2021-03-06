<?php
/**
 * Created by PhpStorm.
 * User: aponirovskiy
 * Date: 18.02.2016
 * Time: 17:26
 */

namespace app\components\actions;


use app\components\behaviors\TestBehavior;
use app\components\custom\MyObject;
use app\components\events\TestEvent;
use app\components\filters\ActionTimeFilter;
use app\migrations\BaseMigration;
use yii\base\Action;
use yii\base\Widget;
use yii\caching\MemCache;
use yii\db\Connection;
use yii\db\Schema;
use yii\filters\ContentNegotiator;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\Response;

/**
 * Class TestAction
 * @package app\components\actions
 *
 * @method void missedMethod() - TestBehavior method
 */
class TestAction extends Action{

    const TEST_EVENT = 'testEvent';

    protected $start_time;

    protected $end_time;

    protected $spent_time;

    protected $my_object;

    public function __construct($id, $controller, MyObject $my_object, $config = [])
    {
        $this->my_object = $my_object;
        parent::__construct($id, $controller, $config);
    }


    public function behaviors()
    {
        //return parent::behaviors(); // TODO: Change the autogenerated stub

        return ArrayHelper::merge(
            [
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
                ],
                'event-listener' => [
                    'class' => TestBehavior::className()
                ],
                /*'action-time' =>[
                    'class' => ActionTimeFilter::className()
                ]*/
            ],
            parent::behaviors()
        );
    }


    public function run()
    {
        //var_dump($this->getBehaviors());
        $e = new TestEvent();
        $e->setAdditional(array('my custom info!'));
        $this->trigger(self::TEST_EVENT, $e);

        $client = new \GearmanClient();
        v(get_class($client));

        $db = \Yii::$app->db;

        /**
         * @var $cache MemCache
         */
        //$cache = \Yii::$app->getCache();

        //$cache->add('first_key','value1', 300);
        //$cache->set($key,'yii',3000);
        //$from = $cache->get($key);

        //p($cache->getMemcache()->getextendedstats());
        //p($memcache->getExtendedStats('items'));

    echo 'ALEEEX!';

        //echo $oTest->var;
        /**
         * @var \yii\mongodb\Connection $mongodb
         * @var \yii\mongodb\Cache $mongo_cache
         */


        //v(\Yii::$app->cache);
        /*$result = $mongodb->getCollection('users')->findOne(['name' => 'Vasya'], ['name']);
        $result = $mongo_cache->set('username', 'Kolya');

        v($result);*/


        //v(in_array( $db->getSchema()->getRawTableName('{{%tttt}}'),$db->getSchema()->getTableNames()));

        //$this->missedMethod();
    }

    public function dosmth(array $arr){
        p($arr);
    }

    /*protected function beforeRun()
    {
        $this->start_time = microtime(true);
        return true;
    }

    protected function afterRun()
    {
        $this->end_time = microtime(true);

        echo "\n\n\n".$this->spent_time.'<h1>asdasdasdasd</h1>';
    }*/

}