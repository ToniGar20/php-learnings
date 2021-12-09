<?php
// Mostrando errores en código para entender fallos
ini_set('display_errors', 1);

// Importando clases
if (isset($_GET['id'])) {
    include_once("config/PhonebookDatabase.php");
    include("config/Contact.php");

    // Conexión a base de datos
    $db = (new PhonebookDatabase())->doConnection();
    // Objeto de Contact y variable id capturada en el enlace para saber qué contacto editar
    $contactHolder = new Contact($db);
    $id = intval($_GET['id']);
    $contactHolder->id = $id;

    // Se guardan los datos de la query en la variable $data
    // Los valores se imprimen directament en el formulario que carga
    $data = $contactHolder->showEditableContact();
}

if(isset($_POST["send-edit"])) {

    $contactHolder->id = intval($_GET['id']);
    $contactHolder->firstname = $_POST["name"];
    $contactHolder->lastname = $_POST["lastname"];
    $contactHolder->phoneNumber = intval($_POST["phone"]);
    $contactHolder->phoneType = $_POST["phone-type"];

    $resultContact = $contactHolder->editContact();

    if($resultContact) {
        $db = null;
        header("location:phonebook.php");
        exit;
    } else {
        echo "No se ha podido realizar la operación";
    }
}

?>

<h1>Editar contacto de <?php echo $data["first_name"]; echo " " . $data["last_name"]?></h1>

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

<a class="home-link" href="phonebook.php">⬅️Volver</a>
