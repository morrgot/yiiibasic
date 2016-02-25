<?php
/**
 * Created by PhpStorm.
 * User: aponirovskiy
 * Date: 24.02.2016
 * Time: 15:47
 */

namespace app\components\custom;


use yii\base\Object;

class MyObject extends Object{

    public $name = 'vasya';

    public $age = '24';

    public $str = '';

    protected $component;

    public function __construct(MyComponent $component, $config = [])
    {
        $this->component = $component;
        $this->str = uniqid();
        parent::__construct($config);
    }

    public function getComponent()
    {
        return $this->component;
    }

}