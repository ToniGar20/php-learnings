<?php

include_once("config/PhonebookDatabase.php");
include_once("config/Contact.php");

$db = (new PhonebookDatabase)->doConnection();
$deleteHolder = new Contact($db);
$deleteHolder->id = $_GET["id"];
$deleteAction = $deleteHolder->deleteContact();

if ($deleteAction) {
 $db = null;
 header("location:phonebook.php");
 exit;
} else {
    echo "Error al borrar el contacto";
}