<?php

class Pizza extends Dish
{
    public array $secondaryIngredients = ["tomato sauce","cheese", "oregano"];
    public int $tastyLevel = 10;

    use DishUtilTrait;

    public function dishDescription(){
        parent::dishDescription();
        echo "It also have ". $this->totalIngredients($this->secondaryIngredients) . " The tasty level is " . $this->tastyLevel;
    }
}