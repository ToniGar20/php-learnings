<?php

// Importando clases
include_once("../config/PhonebookDatabase.php");
include_once("../config/Contact.php");

// Instanciando base de datos y objeto de métodos
$db = (new PhonebookDatabase)->doConnection();
$deleteHolder = new Contact($db);

// El objeto usará el id capturado en el HTML, que es el inyectado por PHP desde la base de datos.
$deleteHolder->id = $_GET["id"];
// Se llama al método de eliminación con el objeto que tiene el "id" del registro a eliminar. Se guarda la acción para evaluar resultado
$deleteAction = $deleteHolder->deleteContact();

//Si la acción es correcta, se vuelve a la home, si no, mensaje sobre error
if ($deleteAction) {
 $db = null;
 header("location:../phonebook.php");
 exit;
} else {
    echo "Error al borrar el contacto";
}
?>
<a href="../phonebook.php">Volver a la agenda</a>
