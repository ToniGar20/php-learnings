<?php

/** Desde el segundo objeto se sobreescribe el método por herencia.
 * Si este coomportamiento no se desea se añade la keyword final a la clase de la que se hereda (entonces ninguna otra clase puede extender, dará ERROR).
 */

    class Father {
        public function firstMethod(){
            echo "This is the FATHER message";
        }
    }

    class Son extends Father {
        public function firstMethod(){
            echo "This is the SON message";
        }
    }

    $f = new Father;
    $f->firstMethod();
    echo "<br>";

    $s = new Son;
    $s->firstMethod();
    echo "<br>";



?>