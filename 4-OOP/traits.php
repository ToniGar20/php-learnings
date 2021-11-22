<!DOCTYPE html>
<html lang="es">
<body>

<?php
/* Los traits se usan para simplificar codigo y no repetir el mismo método por doquier
Serían como interfaces pero con lógica de código. Ahora bien, los traits puede incluso tener atributos a diferencia de estas

En definitiva, la manera de incoporar en una clase comportamientos muy diversos es mediante estos elementos que son como comodines

*/

trait message1 {
    public function msg1() {
        echo "OOP is fun! ";
    }
}

trait message2 {
    public function msg2() {
        echo "OOP reduces code duplication!";
    }
}

class Welcome {
    use message1;
}

class Welcome2 {
    use message1, message2;
}

//La instancia de la primera clase (Welcome) puede llamar a la función del trait primero que es el que usa
$obj = new Welcome();
$obj->msg1();
echo "<br>";

//La instancia de la segunda clase (Welcome2) puede llamar a las dos funciones porque usa los dos traits
$obj2 = new Welcome2();
$obj2->msg1();
$obj2->msg2();
?>

</body>
</html>