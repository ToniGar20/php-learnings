<?php

    abstract class LiveBeing {
        protected $type;

        public function __construct($a){ // Constructor
            $this->type = $a;
        }

        abstract function showType();
    }

    class Elephant extends LiveBeing{

        function showType(){
            echo "El Elefante es un $this->type";
        }
    }

    $e = new Elephant("mamífero");
    $e->showType();

    ?>