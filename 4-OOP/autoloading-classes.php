/** First way **/

<?php
//function __autoload($Person){
//    include "example-classes/Person.php";
//}

/**
 * The way above is deprecated at PHP 8.0. The one below is currently the valid way to autoload example-classes.
 */
spl_autoload_register(function ($name){     //$name is equal to the class name
    include "example-classes/" . "$name" . ".php";  //$name is concatenated with the folder name to find the file and be able to create the object
});

$p = new Person("Toni", "García", 33);
$p -> showData();

?>

/** Second way **/

<?php

// Map of the example-classes available
$classes = [
    'Animal' => 'example-classes/Animal.php',
    'Persona' => 'example-classes/Person.php'
];

// Autoload calls the array and says the index of each element is a path to a class file.
spl_autoload_register(function ($classname) {
    global $classes;
    include $classes["$classname"];
});

// Creating objects
$obj1 = new Person("Perico", "Palotes", 89);
$obj2 = new Animal("Sepia", "Molusco", "brrrrrr");

//Object calling a method
$obj2->showData();

// Showing objects
var_dump($obj1);
var_dump($obj2);

?>
