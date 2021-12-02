<?php

class Pizza extends Dish
{
    public array $secondaryIngredients = ["tomato sauce","cheese", "oregano"];
    public int $tastyLevel = 10;

    public function totalIngredients ($array) {
        $result = "";
        for ($i = 0; $i < count($array); $i++){
            if ($i === count($array)-1) {
                $result .= $array[$i] . ".";
            } else {
                $result .= $array[$i] . ", ";
            }
        }
        return $result;
    }

    public function dishDescription(){
        parent::dishDescription();
        echo "It also have ". $this->totalIngredients($this->secondaryIngredients) . " The tasty level is " . $this->tastyLevel;
    }
}