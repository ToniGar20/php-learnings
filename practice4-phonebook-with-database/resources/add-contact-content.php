<h1>Añadir contacto</h1>
<?php
// Mostrando errores en código para entender fallos
ini_set('display_errors', 1);

include_once("config/PhonebookDatabase.php");
include_once("config/Contact.php");

    if(isset($_POST['add'])){
        $db = (new PhonebookDatabase())->doConnection();
        $data = $db->prepare("INSERT INTO phonebook (id, first_name, last_name, phone, phone_type) VALUES (:id, :firstname, :lastname, :phone, :phone_type)");

    // Generación de id para el nuevo contacto
        $createContact = new Contact($db);
        $result = $createContact->countMaxContactId();
        foreach($result as $item){
            return $id = $item["counter"];
        }

        $data->execute([
            ':id' => $id,
            ':firstname' => $_POST['name'],
            ':lastname' => $_POST['lastname'],
            ':phone' => intval($_POST['phone']),
            ':phone_type' => $_POST['phone-type']
        ]);


        header("location:phonebook.php");
        exit;
        }

?>

<form class="contact-form" method="post">
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
    <input class="send-but" type="submit" name="add" value="Enviar"/>
</form>
