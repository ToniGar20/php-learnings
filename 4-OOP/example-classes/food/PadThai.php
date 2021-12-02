<?php

class PadThai extends Dish
{
    public array $secondaryIngredients = ["soy","protein", "vegetabes"];
    public int $tastyLevel = 9;

    use DishUtilTrait;

    public function dishDescription(){
        parent::dishDescription();
        echo "It also have ". $this->totalIngredients($this->secondaryIngredients) . " The tasty level is " . $this->tastyLevel;
    }

}