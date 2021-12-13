<h1>Añadir contacto</h1>
<?php
// Mostrando errores en código para entender fallos
ini_set('display_errors', 1);

if(isset($_POST['send-new'])){
    include_once("../config/PhonebookDatabase.php");
    include("../config/Contact.php");

    // Conexión a base de datos
    $db = (new PhonebookDatabase())->doConnection();
    // Instanciando Contact
    $contactHolder = new Contact($db);

    // Generación del id: +1 al valor máximo que haya en la tabla. Se guarda como array en esta variable
    $newId = $contactHolder->countMaxContactId();

    $contactHolder->id = intval($newId['new_id']);
    $contactHolder->firstname = $_POST['name'];
    $contactHolder->lastname = $_POST['lastname'];
    $contactHolder->phoneNumber = intval($_POST['phone']);
    $contactHolder->phoneType = $_POST['phone-type'];

    $resultContact = $contactHolder->addContact();

    if($resultContact) {
        $db = null;
        header("location:../phonebook.php");
        exit;
    } else {
        echo "No se ha podido realizar la operación";
    }
}

?>

<form class="contact-form" method="post" action="resources/add-contact-content.php">
    <label>
        <input type="text" name="name" placeholder="Nombre" required/>
    </label>
    <label>
        <input type="text" name="lastname" placeholder="Apellido/s" required/>
    </label>
    <label>
        <input type="text" name="phone" placeholder="Teléfono" required/>
    </label>
    <label>
        <input type="text" name="phone-type" placeholder="Tipo: Casa, Móvil, Trabajo..." required/>
    </label>
    <input class="send-but" type="submit" name="send-new" value="Enviar" required/>
</form>

<a class="home-link" href="phonebook.php">⬅️Volver</a>

