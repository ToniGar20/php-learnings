<?php

class DarthVader
{
    private $power = "I have no power";
    protected $level = 10;

    function helloWorld() {
        echo "Hello World";
    }

    public function __set(string $a, string $b) {
        $this->{$a} = $b;
    }

    public function __get($a) {
        return "The chosen one";
    }
}

class LukeSkywalker extends DarthVader{

}

// Instando clase hija
$myJedi = new LukeSkywalker();
$myJedi->helloWorld();
echo "<br>";

/**
 * Maneras de modificar una variable privada
 */
// Al pedir la variable power, el método mágico __get() sobreescribe el valor por "The chosen one"
echo $myJedi->power;
echo "<br>";

// Sin embargo si asignamos, nos quedaremos con el valor deseado.
echo $myJedi->power="May the force be with you";
echo "<br>";

// Lo mismo sucede si realizamos las mismas operaciones pero en estos casos desde la clase padre
$mySith = new DarthVader();
echo $mySith->power;
echo "<br>";

echo $mySith->power = "I am your father...";
echo "<br>";
echo $mySith->level;




