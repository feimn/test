<?php

class Person
{
    public $name;
    public $age;
    public $sex;

    public function __construct($name,$age,$sex='male')
    {
        $this->name = $name;
        $this->age  = $age;
        $this->sex  = $sex;
    }


}

$person1 = new Person('feimn',27);
$person1->say();
//$person->say();
//unset($person);
//var_dump($person);