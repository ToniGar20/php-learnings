<?php
$hacer_algo = true; // Si cambio a false solo se imprmirá el segund echo!

/* No podemos llamar a foo() desde aquí, no existe aún, pero podemos llamar a bar()
porque en php se puede llamar a la función previamente a crearla (en líneas de código) */
// foo()
bar();

if ($hacer_algo) {
    function foo()
    {
        echo "<p>No existo hasta que la ejecución del programa llegue hasta mí.\n";
    }
}
/* Podemos llamar de forma segura a foo() ya que $hacer_algo = true */
if ($hacer_algo) foo();

// Aquí se define bar() aunque ya haya sido llamada previamente
function bar()
{
    echo "Existo desde el momento inmediato que comenzó el programa.\n";
}
?>