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

    $phonebook = [];
    $new_name = $_GET["contact"];
    $new_phone = $_GET["phone"];
    $phonebook[$new_name] = $new_phone;

    /**
     * Validations:
     * 1. Empty name = no contact added
     * 2. If phone is empty, contact is removed
     * 3. If both filled, contact added
     */
    if(empty($new_name)){
        unset($phonebook[$new_name]);
        echo "<p>Introduce un NOMBRE para añadir un contacto a la agenda</p>";
    } elseif (empty($new_phone)){
        unset($phonebook[$new_name]);
        echo "<p>El teléfono de " . $phonebook[$new_name] . "ha sido eliminado</p>";
    } else {
        $phonebook[$new_name] = [$new_phone];
    }

    // Printing value of phonebook;
    print_r($phonebook);

    ?>

    <h1>Agenda de contactos</h1>
    <p>Añadir o borrar un nuevo contacto</p>
    <form method="get">
        <?php
        if(count($phonebook) >=1 ){
            foreach ($phonebook as $name =>$phone){
                echo '<input type="hidden" name="' . $name . '" value="' . $phone .  '"/>';
            }
        }
        ?>
        <input type="text" name="contact[]" placeholder="Nombre"/>
        <input type="text" name="phone" placeholder="Teléfono"/>
        <input type="submit" name="submit" value="Enviar"/>
    </form>

    <div>
        <h2>Listado de contactos en la agenda</h2>
        <?php
        /**
         * Iteration to display all contacts
         */
        foreach ($phonebook as $name => $phone ){
            echo "<li>" . $name .": ". $phone . "</li>";
        }
        ?>
    </div>

</body>
</html>
