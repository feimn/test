<?php

// php中的16个魔术方法

class Foo
{
    /**
     * Foo constructor.
     */
    public function __construct()
    {
        // TODO: Implement __construct() method.
    }

    /**
     *
     */
    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    /**
     *  在对象中调用一个不可访问的方法时调用
     * @param $name
     * @param $arguments
     */
    public function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
    }

    /**
     * 用静态方式调用一个不可访问的方法时调用
     */
    public function __callStatic($name, $arguments)
    {
        // TODO: Implement __callStatic() method.
    }

    /**
     * 获取一个类的成员变量时调用
     */
    public function __get($name)
    {
        // TODO: Implement __get() method.
    }

    /**
     *
     * 设置一个类的成员变量时调用
     */

    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
    }

    /**
     * @param $name
     * 当对不可访问属性时调用isset或empty时调用
     */
    public function __isset($name)
    {
        // TODO: Implement __isset() method.
    }

    /**
     * 当对不可访问属性调用unset()时被调用
     * @param $name
     */
    public function __unset($name)
    {
        // TODO: Implement __unset() method.
    }

    /**
     * 执行序列化的时候 会先调用这个方法
     */

    public function __sleep()
    {
        // TODO: Implement __sleep() method.
    }

    /**
     * 执行反序列化的时候首先调用这个方法
     */
    public function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }

    /**
     * 类被当成字符串时的回应方法
     */
    public function __toString()
    {
        // TODO: Implement __toString() method.
    }

    /*
     * 调用函数的方式调用一个对象时的回应方法
     */
    public function __invoke()
    {
        // TODO: Implement __invoke() method.
    }

    /**
     * 调用var_export()导出类时，此静态方法会被调用。
     */

    public function __set_state($an_array)
    {
        // TODO: Implement __set_state() method.
    }

    /**
     * 当对象复制完成时调用
     */

    public function __clone()
    {
        // TODO: Implement __clone() method.
    }

    /***
     * 尝试加载未定义的类
     */
    public function __autoload()
    {

    }

    /**
     * 打印所需调试信息
     */

    public function __debugInfo($name, $arguments)
    {
        // TODO: Implement __callStatic() method.
    }
}