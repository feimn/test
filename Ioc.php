<?php

interface Log
{
    public function write();
}

class DatabaseLog implements Log
{
    public function write()
    {
        echo"这是数据库写入日志的方式";
    }
}

class FileLog implements Log
{
    public function write()
    {
       echo"这里是文件记录日志的方式";
    }
}


class User
{
    public $log;

    public function __construct(Log $log)
    {
        $this->log = $log;
    }


    public function login()
    {
        echo"登录成功"."<br/>";
        $this->log->write();
    }
}

class Ioc
{
    public $binding = [];

    public function bind($abstract,$concrete)
    {
        $this->binding[$abstract]['concrete'] = function($ioc) use($concrete){
            return $this->build($concrete);
        };
    }

    // 解析实例的方法
    public function make($abstract)
    {
        $concrete = $this->binding[$abstract]['concrete'];
        return $concrete($this);
    }

    //  处理具体类的方法

    public function build($concrete)
    {
        //  这里用到类的反射机制

        $reflector = new ReflectionClass($concrete);


        // 找到类的构造函数方法(初始化方法)
        $constructor = $reflector->getConstructor();


        // 如果构造函数为空 直接返回实例
        if (is_null($constructor)) {
            return $reflector->newInstance();
        } else {
            //如果不为空呢？
            // 首先找到构造函数的构造参数
            $dependencies = $constructor->getParameters();


            // 处理构造参数  返回构造参数的实例
            $instances = $this->dependencies($dependencies);

            return $reflector->newInstanceArgs($instances);
        }

    }

    public function dependencies($parameters)
    {
        $dependencies = [];
        foreach($parameters as $parameter){
            $dependencies[] = $this->make($parameter->getClass()->name);
        }
        return $dependencies;
    }


}

$ioc = new Ioc();

$ioc->bind('Log','DatabaseLog');

$ioc->bind('user','User');

$user = $ioc->make('user');

$user->login();




class Foo
{
    public function pubFun()
    {

    }
    protected function proFun()
    {

    }
    private function  priFun()
    {

    }
}

function get_motheds_by_reflection($className)
{
    $reflector = new ReflectionClass($className);

    foreach($reflector->getMethods() as $key => $methodObj)
    {
        if($methodObj->isPublic())
            $methods[$key]['type'] = 'public';
        elseif($methodObj->isProtected())
            $methods[$key]['type'] = 'protected';
        else
            $methods[$key]['type'] = 'private';
        $methods[$key]['name'] = $methodObj->name;
        $methods[$key]['class'] = $methodObj->class;
    }

    return $methods;
}

echo"<pre/>";
//var_dump(get_motheds_by_reflection('Foo'));

