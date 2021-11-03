<!DOCTYPE html>
<?php
//Starting the session
session_start();
?>
<html>
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
/**
 * 1. Initializing array if the array does not exist
 * 2. Grabbing phone and contacts from form values (GET) with input filter
 */
$phonebook = $_GET["phonebook"] ?? [];
$new_contact = filter_input(INPUT_GET, "contact");
$new_phone = filter_input(INPUT_GET, "phone");
?>

<!-- Headings -->
<h1>Agenda de contactos</h1>
<p>Añade, actualiza o borra un contacto</p>
<?php
/**
 * Validations - With no submit default message. With submit evaluation of conditions for validation:
 * 1. Empty name = no contact added
 * 2. Empty phone && filled name = if contact is in the phonebook, contact removed. If contact is not in the phonebook, message displayed
 * 3. Both inputs filled = if contact is in the phonebook, message of contact updated. If contact is not in the phonebook, added as new
 */
if(isset($_GET["submit"])) {
    if (empty($new_contact)) {
        echo "<p style='color:orange'>Introduce un nombre para añadir un contacto.</p>";
        unset($phonebook[$new_contact]);
    } elseif (empty($new_phone)) {
        if (array_key_exists($new_contact, $phonebook)) {
            echo "<p style='color:darkred'>El teléfono de " . $new_contact . " ha sido eliminado</p>";
            unset($phonebook[$new_contact]);
        } else {
            echo "<p style='color:orange'>El contacto a eliminar no existe en la agenda</p>";
        }
    } else {
        if (array_key_exists($new_contact, $phonebook)) {
            echo "<p style='color: blue'> El contacto de <b>" . $new_contact . "</b> ha sido actualizado</p>";
        } else {
            echo "<p style='color: green'> Has añadido a <b>" . $new_contact . "</b> como nuevo contacto</p>";
        }
        $phonebook[$new_contact] = $new_phone;
    }
} else{
    echo "<p><i>Rellena los campos con un nombre y un teléfono</i></p>";
}
?>


<?php
session_start();
echo 'session_id(): ' . session_id();

echo "<br />\n";
echo 'session_name(): ' . session_name();
echo "<br />\n";
print_r(session_get_cookie_params());
?>

<!-- Form display -->
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
     * Iteration to display all contacts. If the array has no values, message is displayed
     */
    if(count($phonebook) == 0){
        echo "<p>No hay contactos en la agenda</p>";
    } else {
        echo "<ul>";
        foreach ($phonebook as $contact => $phone ){
            echo "<li>" . $contact .": ". $phone . "</li>";
        }
        echo "</ul>";
    };
    ?>
</div>
</body>
</html>
