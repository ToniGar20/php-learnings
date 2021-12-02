<?php

class PadThai extends Dish
{
    public array $secondaryIngredients = ["soy","protein", "vegetabes"];
    public int $tastyLevel = 9;

    public function totalIngredients ($array) {
        foreach ($array as $ingredient) {
            if ($ingredient)
            echo $ingredient . ",";
        }
    }

    public function dishDescription(){
        parent::dishDescription();
        echo "It also have ". $this->totalIngredients($this->secondaryIngredients) . ". The tasty level is " . $this->tastyLevel;
    }

}