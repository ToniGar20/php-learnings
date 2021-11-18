<?php

class A
{
    public $public;
    protected $protected;
    private $private1;
    private $private2;
    private $private3;

    public function __construct(){

    }

    public function __get($variable){
            return $this->$variable;
    }

    public function __set($variable, $value){
        if($variable == "private1" || $variable =="private2") {
            return $this->$variable = $value;
        }
    }

}