<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Estados de una variable</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: Verdana; }
        table { float: left; border: 1px solid blue; }
        th { background-color: limegreen; color:white; padding: 10px; }
        td { padding: 15px;border-bottom: 1px solid #ddd;text-align: left; }
        tr:hover { background-color: yellow;}
        caption{ background-color: #04AA6D;color: white; }
    </style>
</head>
<body>

<table><tr><th>Item</th><th>Contenido de $var</th><th>isset($var)</th><th>empty($var)</th><th>(bool)$var</th><th>isnull($var)</th></tr>

<?php
// Turn off all error reporting
error_reporting(0);

        function crearFilasResultados($caso) {
          global $var;
          static $i = 1;

          $output = '<tr><td>' . $i++ . '</td><td>' . $caso;

          $output .= '</td><td>' . (isset($var) ? 'true' : 'false');
          $output .= '</td><td>' . (empty($var) == 1 ? 'true' : 'false');
          $output .= '</td><td>' . ((bool) $var ? "true" : "false");
          $output .= '</td><td>' . (is_null($var) ? "true" : "false");

          $output .= '</td></tr>';
          return $output . PHP_EOL;
        }

        $filas = "";

        $var = null;
        $filas .= crearFilasResultados('$var=null;');

        $var = 0;
        $filas .= crearFilasResultados('$var= 0;');

        $var = true;
        $filas .= crearFilasResultados('$var= true;');

        $var = false;
        $filas .= crearFilasResultados('$var= false;');

        $var = "0";
        $filas .= crearFilasResultados('$var= "0";');

        $var = "";
        $filas .= crearFilasResultados('$var= "";');

        $var = "foo";
        $filas .= crearFilasResultados('$var= "foo";');

        $var = array();
        $filas .= crearFilasResultados('$var= array();');

        unset($var);
        $filas .= crearFilasResultados('unset($var);');

echo $filas;

?>
</table>

</body>
</html>
