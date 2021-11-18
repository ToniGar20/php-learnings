<?php
    function eXTerNa(){
        echo "<p>Función externa llamada desde una función anidada.";
    }
    function foo()
    {
     function bar() { echo "No existo hasta que se llame a foo().\n"; externa(); }
    }
    /* No podemos llamar aún a bar() ya que no existe. */
    foo();
    /* Ahora podemos llamar a bar(), el procesamiento de foo() la ha hecho accesible. */
    bar();
    echo "<br>";
    echo "<br>";
?>



<?php
//Ejemplo con factorial!
    function factorial($n){
        $result = 1;
        if($n == 1){
            return $result;
        } else {
            return $n * factorial($n -1);
        }
    }

    echo "El factorial de 5 es: " .  factorial(5);
?>
