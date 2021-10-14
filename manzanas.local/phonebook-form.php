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

    $phonebook = [];
    $new_name = $_GET["contact"];
    $new_phone = $_GET["phone"];
    $phonebook[$new_name] = $new_phone;
    print_r($phonebook);


    ?>

    <h1>Agenda de contactos</h1>
    <p>Añadir o borrar un nuevo contacto</p>
    <form method="get">
        <input type="text" name="contact[]" placeholder="Nombre"/>
        <input type="text" name="phone" placeholder="Teléfono"/>
        <input type="submit" name="submit" value="Enviar"/>
    </form>

    <div>
        <h2>Listado de contactos en la agenda</h2>
        <?php
        foreach ($phonebook as $name => $phone ){
            echo "<li>" . $name .": ". $phone . "</li>";
        }
        ?>
    </div>

</body>
</html>
