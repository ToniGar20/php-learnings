<?php

//function __autoload($Person){
//    include "classes/Person.php";
//}

/**
 * The way above is deprecated at PHP 8.0. The one below is currently the valid way to autoload classes.
 */


spl_autoload_register( function ($Person){
    include "classes/Person.php";
});

$p = new Person("Toni", "García", 33);
$p->showData();

?>