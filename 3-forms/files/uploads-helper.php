<?php
/**
 * Documentación del código
 * 1. Comentado el printeo de la variable $_FILES para comprobar que se recibe el archivo desde el formulario
 * 2. $directory almacena el directorio al que se enviarán los archivos.
 * 3. Condicional que evalua si la variable global tiene un valor de array con el "name" especificado en el input 4. Se capturan los valores del array en variables
 * 5. Se usar el método "move_uploaded_file" para subir el archivo. Basta especificar el nombre temporal y cómo guardarlo, es decir, ruta más nombre
 *
 */

//TODO Añadir sistemas de validación y formateo del contenido subido

//var_dump($_FILES);
$directory = "uploads/";

if(isset($_FILES['fileName'])) {
    $file_name = $_FILES['fileName']['name'];
    $file_size = $_FILES['fileName']['size'];
    $file_tmp = $_FILES['fileName']['tmp_name'];
    $file_type = $_FILES['fileName']['type'];

    move_uploaded_file($file_tmp, $directory . $file_name);
    echo "Success";
}

