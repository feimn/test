<?php

// 类的反射

$reflector = new ReflectionClass($className);

// 获取类的所有方法
$reflector->getMethods();

// 获取类的所有属性
$reflector->getProperties();

// 获取类的构造方法
$reflector->getConstructor();

// 获取当前类的父类
$reflector->getParentClass();