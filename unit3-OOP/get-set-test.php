<?php

/**
 * Testing with class A get&set functions
 *
 * Given 5 different variables. Try to set different values just for one "private" variable (doing magic on "__set" function)
 * Watch out: "protected" variables are threated as "private" for "set" actions. Source: https://www.php.net/manual/es/language.oop5.overloading.php#object.get
 *
 */

spl_autoload_register(function ($name){     //$name is equal to the class name
    include "classes/" . "$name" . ".php";  //$name is concatenated with the folder name to find the file and be able to create the object
});

$obj = new A();

$obj->public="public-test";
$obj->protected="protected-test";
$obj->private1 = "test1";
$obj->private2 = "test2";
$obj->private3 = "test3";

var_dump($obj)

?>