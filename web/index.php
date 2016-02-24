<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');

function p($a){
    echo '<pre>';
    print_r($a);
    echo '</pre>';
}

function v(){
    return call_user_func_array('var_dump', func_get_args());
}

(new yii\web\Application($config))->run();
