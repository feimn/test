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

//工厂模式

class Factory
{
    public static function getInstance()
    {
        return Foo::getInstance();
    }
}

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
         return self::$instance[$aliase];
    }

    public static function _unset($aliase)
    {
        // 移除某个注册到树上的对象
        unset(self::$instance[$aliase]);
    }
}

 Registree::set('obj',Factory::getInstance());

 Registree::set('obj1',Factory::getInstance());

$obj = Registree::get('obj');

$obj1 = Registree::get('obj1');



echo"<pre/>";
var_dump($obj);
echo"<hr/>";

echo"<pre/>";
var_dump($obj1);
echo"<hr/>";





