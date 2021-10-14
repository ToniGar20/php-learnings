<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Calculator Table</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {font-family: Verdana;}
            table{float: left; border: 1px solid blue;}
            td {padding: 15px;border-bottom: 1px solid #ddd;text-align: left;}
            tr:hover {background-color: yellow;}
            caption{background-color: #04AA6D;color: white;}
        </style>
    </head>
    <body>

    <?php
        $tables = [0,1,2,3,4,5,6,7,8,9,10];

        foreach ($tables as $table){
            echo "<table> <caption> Tabla del '. $table .'</caption><tbody>";
            for ($i=0;$i<=10;$i++){
                echo "<tr> <td>" . $i . "</td><td>X</td><td>" . $table . "</td><td>=</td><td><b>" . ($i*$table) . "</b></td></tr>";
            }
            echo "</tbody></table>";
        }
    ?>

    </body>
</html>
