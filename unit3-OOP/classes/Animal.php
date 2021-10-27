<?php


class Animal
{
    // Variables de objeto
    private $name;
    private $type;
    private $action;

    public function __construct($a, $b, $c)
    { // Constructor
        $this->name = $a;
        $this->type = $b;
        $this->action = $c;
    }

    public function showData()
    { // Método de clase
        echo "$this->name: es un/a $this->type y $this->action";
    }
}

