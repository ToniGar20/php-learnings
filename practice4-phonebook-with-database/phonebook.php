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
    <form action="form-phonebook.php" method="post">
        <button class="add-contact-but">Añadir nuevo contacto</button>
    </form>

<?php
include_once ("config/PhonebookDatabase.php");
include_once("config/Contact.php");

// Conexión con la base de datos instanciando su clase
$db = (new PhonebookDatabase)->doConnection();

// Instanciando "Contact" para llamar al método que recupera la query que muestra todos los resultados
$allContacts = (new Contact($db))->showContacts();
?>

    <table><caption>Contactos de la agenda</caption>
        <tbody>
    <?php
    // Iteración sobre la variable $showUsers que tiene un Array
    foreach($allContacts as $row) {
        ?>
    <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['first_name'] ?></td>
        <td><?php echo $row['last_name'] ?></td>
        <td><?php echo $row['number'] ?></td>
        <td><?php echo $row['type'] ?></td>
        <form action="form-phonebook.php" method="post">
            <td><button id="<?php echo 'edit-' . $row['id']?>">Editar</button></td>
        </form>
            <td><a href="delete-contact.php?id=<?php echo $row['id']; ?>">Eliminar</a></td>
    </tr>
        <?php
    }
    $db = null;
    ?>

    </tbody>
    </table>
</main>

</body>
</html>