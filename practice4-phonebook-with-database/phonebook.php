<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Agenda de contactos</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
</head>
<body>

<header>
    <h1>Agenda de contactos</h1>
</header>

<main>
<div>
    <button class="add-contact-but">+</button>
</div>

<?php
include_once ("config/PhonebookDatabase.php");
include_once("config/Contact.php");

// Conexión con la base de datos instanciando y llamando al método
$db = (new PhonebookDatabase)->doConnection();

// Variable que usa el método de la clase Actions dónde se guarda la query en método
$showUsers = (new Contact)->showContacts($db);
?>

<table><caption>Contactos de la agenda</caption><tbody>
<?php
// Iteración sobre la variable $showUsers que tiene un Array
foreach($showUsers as $row) {
    echo "<tr>" .
        "<td>" . $row["id"] . "</td>" .
        "<td>" . $row["first_name"] . "</td>" .
        "<td>" . $row["last_name"] . "</td>" .
        "<td>" . $row["number"] . "</td>" .
        "<td>" . $row["type"] . "</td>" .
        "<td><button>Editar</button></td>" .
        "<td><button>Eliminar</button></td>" .
        "</tr>";
}
?>
</tbody></table>
</main>

<section class="contact-form">
    <h2>Añadir un nuevo contacto</h2>
    <form class="contact-form" method="post">
        <input type="text" name="name" placeholder="Nombre"/>
        <input type="text" name="surname" placeholder="Apellido/s"/>
        <input type="text" name="phone" placeholder="Teléfono"/>
        <input type="text" name="phone-type" placeholder="Tipo"/>
        <input type="submit" name="submit" value="Enviar"/>
    </form>
</section>

</body>
</html>