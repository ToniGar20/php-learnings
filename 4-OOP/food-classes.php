<?php
$classes = [
    'Dish' => 'example-classes/food/Dish.php',
    'PadThai' => 'example-classes/food/Padthai.php',
    'Paella' => 'example-classes/food/Paella.php',
    'Pizza' => 'example-classes/food/Pizza.php'
];

spl_autoload_register(function ($classname) {
    global $classes;
    include $classes["$classname"];
});

$todayFood = new Pizza("Tropical", "Pineapple", 40);
//$todayFood->totalIngredients($todayFood->secondaryIngredients);
$todayFood->dishDescription();