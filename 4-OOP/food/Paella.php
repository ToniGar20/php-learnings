<?php

class Paella extends Dish
{
    public array $secondaryIngredients = ["chicken","squid", "prawns"];
    public int $tastyLevel = 8;

    use DishUtilTrait;

    public function dishDescription(){
        parent::dishDescription();
        echo "It also have ". $this->totalIngredients($this->secondaryIngredients) . " The tasty level is " . $this->tastyLevel;
    }

}