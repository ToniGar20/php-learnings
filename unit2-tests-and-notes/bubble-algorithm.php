<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Bubble algorithm</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {font-family: Verdana;}
        </style>
    </head>
    <body>
        <h1>Algoritmo de burbuja</h1>
    <?php

    //Code to generate array with 5 random numbers
    $numbers = [];
    while(count($numbers) < 5) {
        $random_number = rand(-100, 100);
        array_push($numbers, $random_number);
    }

    //Printing the random numbers
    echo "Se han generado 5 números aleatorios entre -100 y 100 que son estos: $numbers[0], $numbers[1], $numbers[2], $numbers[3] y $numbers[4]";
    echo "<br>";
    echo "<p><b>Resultado de números ordenados de menor a mayor</b></p>";

    //Algorithm for sort the numbers
    for ($i=0; $i < count($numbers); $i++) {
        for ($j = 0; $j < count($numbers)-1; $j++) {
            if ($numbers[$j] > $numbers[$j+1]) {
                $tmp = $numbers[$j + 1];
                $numbers[$j+1] = $numbers[$j];
                $numbers[$j] = $tmp;
            }
        }
    }

    //Printing sorted numbers, from minor to major
    echo "<ul>";
    foreach ($numbers as $number){
        echo "<li>$number</li>";
    }
    echo "</ul>";

    ?>
    </body>
</html>







