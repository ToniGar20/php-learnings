<?php

    //$numbers = [49,24,36,80,31];
    $numbers = [123,53,-2,44443,4,18,1.5];

    for ($i=0; $i < count($numbers); $i++) {
        for ($j = 0; $j < count($numbers)-1; $j++) {
            if ($numbers[$j] > $numbers[$j+1]) {
                $tmp = $numbers[$j + 1];
                $numbers[$j+1] = $numbers[$j];
                $numbers[$j] = $tmp;
            }
        }
    }
    print_r($numbers);
?>


