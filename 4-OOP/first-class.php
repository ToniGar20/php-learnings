<?php

    class Human {
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

    $mySelf = new Human("Toni", "García", "33"); // Se construye un objeto
    $mySelf->showData(); // Con el nuevo objeto se llama a su método

?>