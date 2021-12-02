/**
Example of use of a trait and inhiterance:
a) Classes loaded from /food folder
b) Each class with trait: "use DishUtilTrait;"
c) Main method override from parent one
*/

<?php
$classes = [
    'Dish' => 'food/Dish.php',
    'DishUtilTrait' => 'food/DishUtilTrait.php',
    'PadThai' => 'food/PadThai.php',
    'Paella' => 'food/Paella.php',
    'Pizza' => 'food/Pizza.php'
];

spl_autoload_register(function ($classname) {
    global $classes;
    include $classes["$classname"];
});

// Instancing and calling the main method
$todayFood = new Pizza("Tropical", "Pineapple", 40);
$todayFood->dishDescription();