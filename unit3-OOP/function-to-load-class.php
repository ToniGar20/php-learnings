<?php

//function __autoload($Person){
//    include "classes/Person.php";
//}

/**
 * The way above is deprecated at PHP 8.0. The one below is currently the valid way to autoload classes.
 */

spl_autoload_register(function ($name){     //$name is equal to the class name
    include "classes/" . "$name" . ".php";  //$name is concatenated with the folder name to find the file and be able to create the object
});

$p = new Person("Toni", "García", 33);
$p -> showData();

?>