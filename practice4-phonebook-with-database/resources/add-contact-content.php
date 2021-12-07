<h1>Añadir contacto</h1>
<?php
// Mostrando errores en código para entender fallos
ini_set('display_errors', 1);

if(isset($_POST['send-new'])){
    include_once("../config/PhonebookDatabase.php");
    $db = (new PhonebookDatabase())->doConnection();
    $data = $db->prepare("INSERT INTO phonebook (id, first_name, last_name, phone, phone_type) VALUES (:id, :firstname, :lastname, :phone, :phone_type)");

    // Generación del id: +1 al valor máximo que haya en la tabla. Se guarda como array en esta variable
    $newId = $db->query("SELECT MAX(id)+1 AS new_id FROM phonebook;")->fetch();

    // Ejecución de la query asociando campos y valores
    $data->execute([
        ':id' => $newId['new_id'],
        ':firstname' => $_POST['name'],
        ':lastname' => $_POST['lastname'],
        ':phone' => intval($_POST['phone']),
        ':phone_type' => $_POST['phone-type']
    ]);

    // Redirección al homepage
    header("location:../phonebook.php");
    exit;
    }

?>

<form class="contact-form" method="post" action="resources/add-contact-content.php">
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
    <input class="send-but" type="submit" name="send-new" value="Enviar"/>
</form>

<a class="home-link" href="phonebook.php">Volver a la agenda</a>

