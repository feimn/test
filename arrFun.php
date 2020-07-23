<?php

$reflector = new ReflectionClass($className);

$reflector->getMethods();

$reflector->getProperties();

$reflector->getConstructor();

$reflector->getParentClass();