<?php
//Starting the session
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Phonebook Form</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {font-family: Verdana}
    </style>
</head>
<body>

<?php
    $new_contact = filter_input(INPUT_GET, "contact");
    $new_phone = filter_input(INPUT_GET, "phone");

/**
 * USING $_SESSION for store the values!
 * Validations - With no submit default message. With submit evaluation of conditions for validation:
 * 1. Empty name = no contact added
 * 2. Empty phone && filled name = if contact is in the phonebook, contact removed. If contact is not in the phonebook, message displayed
 * 3. Both inputs filled = if contact is in the phonebook, message of contact updated. If contact is not in the phonebook, added as new
 */
if(isset($_GET["submit"])) {
    if (empty($new_contact)) {
        echo "<p style='color:orange'>Introduce un nombre para añadir un contacto.</p>";
        unset($_SESSION[$new_contact]);
    } elseif (empty($new_phone)) {
        if (array_key_exists($new_contact, $_SESSION)) {
            echo "<p style='color:darkred'>El teléfono de " . $new_contact . " ha sido eliminado</p>";
            unset($_SESSION[$new_contact]);
        } else {
            echo "<p style='color:orange'>El contacto a eliminar no existe en la agenda</p>";
        }
    } else {
        if (array_key_exists($new_contact, $_SESSION)) {
            echo "<p style='color: blue'> El contacto de <b>" . $new_contact . "</b> ha sido actualizado</p>";
        } else {
            echo "<p style='color: green'> Has añadido a <b>" . $new_contact . "</b> como nuevo contacto</p>";
        }
        $_SESSION[$new_contact] = $new_phone;
    }
} else{
    echo "<p><i>Rellena los campos con un nombre y un teléfono</i></p>";
}
?>

    <!-- Headings -->
    <h1>Agenda de contactos</h1>
    <p>Añade, actualiza o borra un contacto</p>

<form method="get">
    <input type="text" name="contact" placeholder="Nombre"/>
    <input type="text" name="phone" placeholder="Teléfono"/>
    <input type="submit" name="submit" value="Enviar"/>
</form>

<div>
    <!-- Contact list -->
    <h2>Listado de contactos en la agenda</h2>
    <?php
    /**
     * Iteration to display all contacts. If the $_SESSION has no values, message is displayed
     */
    if(count($_SESSION) == 0){
        echo "<p>No hay contactos en la agenda</p>";
    } else {
        echo "<ul>";
        foreach ($_SESSION as $contact => $phone ){
            echo "<li>" . $contact .": ". $phone . "</li>";
        }
        echo "</ul>";
    };
    ?>
</div>

<?php
/**
 * Script to display the value of the super-global and also to destroy the current session.
 */
//    echo "<br>";
//    print_r($_SESSION);
//    //session_destroy();
//?>
</body>
</html>
