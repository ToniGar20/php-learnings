<?php

trait DishUtilTrait
{
    public static function totalIngredients ($array): string {
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
}