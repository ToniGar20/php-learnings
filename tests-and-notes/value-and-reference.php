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
?>