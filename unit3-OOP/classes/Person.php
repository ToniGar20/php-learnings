<?php
class Person {
    // Variables de objeto
    private $name;
    private $surname;
    private $age;

    public function __construct($a,$b,$c){ // Constructor
        $this -> name = $a;
        $this -> surname = $b;
        $this -> age = $c;
    }

    public function showData(){ // Método de clase
        echo "Te llamas $this->name $this->surname y tienes $this->age años";
    }
}

?>