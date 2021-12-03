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

        function createRows($case) {
          global $var;
          static $i = 1;

          $output = '<tr><td>' . $i++ . '</td><td>' . $case;

          $output .= '</td><td>' . (isset($var) ? 'true' : 'false');
          $output .= '</td><td>' . (empty($var) == 1 ? 'true' : 'false');
          $output .= '</td><td>' . ((bool) $var ? "true" : "false");
          $output .= '</td><td>' . (is_null($var) ? "true" : "false");

          $output .= '</td></tr>';
          return $output . PHP_EOL;
        }

        $rows = "";

        $var = null;
        $rows  .= createRows('$var=null;');

        $var = 0;
        $rows  .= createRows('$var= 0;');

        $var = true;
        $rows  .= createRows('$var= true;');

        $var = false;
        $rows  .= createRows('$var= false;');

        $var = "0";
        $rows  .= createRows('$var= "0";');

        $var = "";
        $rows  .= createRows('$var= "";');

        $var = "foo";
        $rows .= createRows('$var= "foo";');

        $var = array();
        $rows  .= createRows('$var= array();');

        unset($var);
        $rows .= createRows('unset($var);');

echo $rows;

?>
</table>

</body>
</html>
