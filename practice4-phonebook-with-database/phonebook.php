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
    <form method="post" action="form-phonebook.php" >
        <button class="add-contact-but" name="add">Añadir nuevo contacto</button>
    </form>

<?php
// Mostrando errores en código para entender fallos
ini_set('display_errors', 1);

include_once ("config/PhonebookDatabase.php");
include_once("config/Contact.php");

// Conexión con la base de datos instanciando su clase
$db = (new PhonebookDatabase)->doConnection();

// Instanciando "Contact" para llamar al método que recupera la query que muestra todos los resultados
$contactHolder = new Contact($db);
$allContacts = $contactHolder->showContacts();

// Se cuentan los contactos de la agenda con método a través de la instanciación anterior
// Si son mayores a 0 se mostrarará la tabla. En caso de que no haya contactos se mostrará mensaje de que no hay
$data = $contactHolder->countContacts();
$counter = intval($data['total']);
if($counter > 0) {
?>
    <table>
        <tbody>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido/s</th>
            <th>Teléfono</th>
            <th>Tipo</th>
            <th>Fecha</th>
            <th></th>
            <th></th>
        </tr>
        <?php
        // Iteración sobre la variable $allContacts que tiene un Array con todos los registros
        foreach($allContacts as $row) {
            ?>
    <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['first_name'] ?></td>
        <td><?php echo $row['last_name'] ?></td>
        <td><?php echo $row['phone'] ?></td>
        <td><?php echo $row['phone_type'] ?></td>
        <td><?php echo $row['date'] ?></td>
        <td><a href="form-phonebook.php?id=<?php echo $row['id']; ?>">Editar</a></td>
        <td><a href="delete-contact.php?id=<?php echo $row['id']; ?>">Eliminar</a></td>
    </tr>
            <?php
        }
        $db = null;
        ?>

    </tbody>
    </table>

    <?php
    } else {
    echo "No hay contactos en la agenda!";
    }
    ?>
</main>

</body>
</html>