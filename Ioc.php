<?php

interface Log
{
    public function write();
}

class FileLog implements Log
{
    public function write()
    {
        echo 'filelog write';
    }
}

class DatabaseLog implements Log
{
    public function write()
    {
        echo 'databaselog write';
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
        echo "login success"."<br/>";
        $this->log->write();
    }
}

class Ioc
{
    public $binding = [];

    public function bind($abstract,$concrete)
    {
      $this->binding[$abstract]['concrete'] = function($ioc) use($concrete){
          return $ioc->build($concrete);
      } ;
    }

    public function make($abstract)
    {
       $concrete =  $this->binding[$abstract]['concrete'];
        return $concrete($this);
    }

    public function build($concrete)
    {
        $reflector = new ReflectionClass($concrete);

        $constructor = $reflector->getConstructor();

        if(is_null($constructor)){
            return $reflector->newInstance();
        }else{
            $dependencies = $constructor->getParameters();

            $instances = $this->getDependencies($dependencies);

            return $reflector->newInstanceArgs($instances);
        }

    }

    public function  getDependencies($paramters)
    {
        $dependencies = [];

        foreach($paramters as $paramter){
            $dependencies[] = $this->make($paramter->getClass()->name);
        }

        return $dependencies;
    }

}

//$ioc = new Ioc();
//$ioc->bind('Log','FileLog');
//$ioc->bind('user','User');
//
//$user = $ioc->make('user');
//
//$user->login();


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
var_dump(get_motheds_by_reflection('Foo'));

