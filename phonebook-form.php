<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Phonebook Form</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

    <?php
    /**
     * Initializing array to store all contacts
     * Grabbing phone and contacts from form values (GET)
     * Definition of the array with key-value structure
     */

    $phonebook = $_GET["phonebook"] ?? [];
    $new_contact = filter_input(INPUT_GET, "contact");
    $new_phone = filter_input(INPUT_GET, "phone");
    $phonebook[$new_contact] = $new_phone;

    /**
     * Validations:
     * 1. Empty name = no contact added
     * 2. If phone is empty, contact is removed
     * 3. If both filled, contact added
     */

    if(empty($new_contact)){
        unset($phonebook[$new_contact]);
        echo "<p>Introduce un NOMBRE para añadir un contacto a la agenda</p>";
    } elseif (empty($new_phone)){
        echo "<p>El teléfono de " . $new_contact . " ha sido eliminado</p>";
        unset($phonebook[$new_contact]);
    } else {
        $phonebook[$new_contact] = $new_phone;
    }

    // Printing value of phonebook;
    print_r($phonebook);

    ?>

    <h1>Agenda de contactos</h1>
    <p>Añadir o borrar un nuevo contacto</p>
    <form method="get">
        <?php
            foreach ($phonebook as $contact => $phone){
                echo '<input type="hidden" name="phonebook[' . $contact . ']" value="' . $phone .  '"/>';

            }
        ?>
        <input type="text" name="contact" placeholder="Nombre"/>
        <input type="number" name="phone" placeholder="Teléfono"/>
        <input type="submit" name="submit" value="Enviar"/>
    </form>

    <div>
        <h2>Listado de contactos en la agenda</h2>
        <?php
        /**
         * Iteration to display all contacts
         */
        foreach ($phonebook as $contact => $phone ){
            echo "<li>" . $contact .": ". $phone . "</li>";
        }
        ?>
    </div>

</body>
</html>
