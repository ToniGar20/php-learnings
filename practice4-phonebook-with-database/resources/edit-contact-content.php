<h1>Editar contacto</h1>
<?php
// Mostrando errores en código para entender fallos
// ini_set('display_errors', 1);

// Importando clases
if (isset($_GET['id'])) {
    include_once("config/PhonebookDatabase.php");

    $id = intval($_GET['id']);
    $db = (new PhonebookDatabase())->doConnection();
    $data = $db->query("SELECT * FROM phonebook WHERE id = '$id';")->fetch();
}

if(isset($_POST["send-edit"])) {
    $first_name = $_POST["name"];
    $last_name = $_POST["lastname"];
    $phone = intval($_POST["phone"]);
    $phoneType = $_POST["phone-type"];

    $resultContact = $db->query("UPDATE phonebook SET first_name = '$first_name', last_name = '$last_name', phone = '$phone', phone_type = '$phoneType' WHERE id = '$id';");
}

if($resultContact) {
    $db = null;
    header("location:phonebook.php");
    exit;
}
?>
<form class="contact-form" method="POST">
    <label>
        <input type="text" name="name" placeholder="Nombre" value="<?php echo $data["first_name"]?>" required/>
    </label>
    <label>
        <input type="text" name="lastname" placeholder="Apellido/s" value="<?php echo $data["last_name"]?>" required/>
    </label>
    <label>
        <input type="text" name="phone" placeholder="Teléfono" value="<?php echo $data["phone"]?>" required/>
    </label>
    <label>
        <input type="text" name="phone-type" placeholder="Tipo" value="<?php echo $data["phone_type"]?>" required/>
    </label>
    <input class="send-but" type="submit" name="send-edit" value="Enviar"/>
</form>

<a class="home-link" href="phonebook.php">Volver a la agenda</a>
