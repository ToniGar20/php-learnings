<?php
//Por valor
    function resetCounter1($c) {
        $c = 0;
    }
    $counter=0;
    $counter++;
    $counter++;
    $counter++;
    echo "$counter<br/>"; //Muestra "3"
    resetCounter1($counter);
    echo "$counter<br/>"; //Muestra "3"

//Por referencia
    function resetCounter2(&$c) {
        $c = 0;
    }
    $counter=0;
    $counter++;
    $counter++;
    $counter++;
    echo "$counter<br/>"; //Muestra "3"
    resetCounter2($counter);
    echo "$counter<br/>"; //Muestra "0"

// Por referencia 2
    $a = 3;
    function bar(&$b)
    {
        $b = 8;
    }

    $aref = &$a; // recibe la referencia de $a
    $aref++; // $a vale 4
    bar($aref);
    echo 'El valor de $a es: ' . $a; //muestra 'El valor de $a es: 8'

?>