<?php

class Paella extends Dish
{
    public array $secondaryIngredients = ["chicken","squid", "prawns"];
    public int $tastyLevel = 8;

    public function totalIngredients ($array) {
        foreach ($array as $ingredient) {
            echo $ingredient . ",";
        }
    }

    public function dishDescription(){
        echo "It also have ". $this->totalIngredients($this->secondaryIngredients) . ". The tasty level is " . $this->tastyLevel;
    }

}