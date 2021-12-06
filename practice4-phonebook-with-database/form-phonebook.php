<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Añadir contacto | Agenda de contactos</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
</head>
<body>

<?php

include_once("config/PhonebookDatabase.php");
include_once("config/Contact.php");


if(isset($_POST['send'])) {
    // Si en $_POST está el valor del botón, se inicia el proceso
    // 1. Conexión con la base de datos instanciando su clase y creación de un objeto "Contact"
    $db = (new PhonebookDatabase)->doConnection();
    $createContact = new Contact();

    $createContact->id = Contact::countMaxContactId($db)+1;
    $createContact->firstname = $_POST['name'];
    $createContact->lastname = $_POST['lastname'];
    $createContact->phoneNumber = $_POST['phone'];
    $createContact->phoneType = $_POST['phone-type'];

    $createContact->addContact($db);
    $createContact->addPhone($db);

    header("location:phonebook.php");
    exit;

}
?>

<main>
    <section class="contact-form">
        <h1>Añadir un nuevo contacto</h1>
        <form class="contact-form" method="post">
            <label>
                <input type="text" name="name" placeholder="Nombre"/>
            </label>
            <label>
                <input type="text" name="lastname" placeholder="Apellido/s"/>
            </label>
            <label>
                <input type="text" name="phone" placeholder="Teléfono"/>
            </label>
            <label>
                <input type="text" name="phone-type" placeholder="Tipo"/>
            </label>
            <input class="send-but" type="submit" name="send" value="Enviar"/>
        </form>
    </section>
</main>

</body>
</html>