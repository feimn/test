<?php


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

class Factory
{
    public static function getInstance()
    {
        return Foo::getInstance();
    }
}


class designTree
{
   protected static $objects;

   public static function  set($aliase,$object) {
       self::$objects[$aliase] = $object;
   }

   public static function get($aliase){
       return self::$objects[$aliase];
   }

    public static function _unset($aliase)
    {
        unset(self::$objects[$aliase]);
    }

}

designTree::set('object',Factory::getInstance());

designTree::set('object1',Factory::getInstance());

$obj = designTree::get('object');

$obj1 = designTree::get('object1');


echo"<pre/>";
var_dump($obj);
echo"<hr/>";

echo"<pre/>";
var_dump($obj1);
echo"<hr/>";

