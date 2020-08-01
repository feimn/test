<?php

// 单例模式

class Foo
{
    private static $instance;

    private function __construct()
    {
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public static function getInstance()
    {
        if(!self::$instance instanceof self){
            self::$instance = new self();
        }

        return self::$instance;
    }
}

//简单工厂模式

class Factory
{
    public static function getInstance()
    {
        return Foo::getInstance();
    }
}

// 稍微复杂一点的工厂模式

interface Transport
{
    public function go();
}

class Bike implements  Transport
{
    public function go()
    {
        echo"bike is slowing";
    }
}

class Car implements Transport{

    public function go()
    {
        echo"car is fasting";
    }
}

class Bus implements Transport
{
    public function go()
    {
        echo"bus stops at everyone station";
    }
}

class Transfactory
{
    public static function getInstance($transport)
    {
       switch($transport){
           case 'bike':
           return new Bike();
           break;

           case 'car':
           return new Car();
           break;

           case 'bus':
           return new Bus();
           break;

       }
    }
}

$transport = Transfactory::getInstance('bus');
//$transport->go();

// 注册数模式

class Registree
{
    protected static $instance;

    public static function set($aliase,$object)
    {
        // 将对象注册到树上
        self::$instance[$aliase] = $object;
    }

    public static function get($aliase)
    {
        // 获取某个挂在树上的对象
        if(isset(self::$instance[$aliase])){
            return self::$instance[$aliase];
        }else{
            echo"你要找的实例不存在哦";
        }

    }

    public static function _unset($aliase)
    {
        // 移除某个注册到树上的对象
        unset(self::$instance[$aliase]);
    }
}

class Demo
{
    public function test()
    {
        echo"看这里";
    }
}
$demo = new Demo();

 Registree::set('de',$demo);

$tree = Registree::get('de');

$tree->test();

Registree::_unset('de');

$tree_two = Registree::get('de');

$tree_two->test();

// Registree::set('obj',Factory::getInstance());
//
// Registree::set('obj1',Factory::getInstance());
//
//$obj = Registree::get('obj');
//
//$obj1 = Registree::get('obj1');



//echo"<pre/>";
//var_dump($obj);
//echo"<hr/>";
//
//echo"<pre/>";
//var_dump($obj1);
//echo"<hr/>";





