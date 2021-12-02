<?php

abstract class Dish
{
    public string $name;
    public string $mainIngredient;
    public int $timeRequired;

    public function __construct ($a, $b, $c) {
        $this->name = $a;
        $this->mainIngredient = $b;
        $this->timeRequired =$c;
    }

    public function dishDescription(){
        echo "This is a " . $this->name . ", made mainly with " . $this->mainIngredient . ". It requires " . $this->timeRequired . " minutes to be ready! ";
    }
}