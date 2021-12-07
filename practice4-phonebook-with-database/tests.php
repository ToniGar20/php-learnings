<?php

include_once ("config/PhonebookDatabase.php");

$db = (new PhonebookDatabase())->doConnection();
$newId = $db->query("SELECT MAX(id)+1 AS new_id FROM phonebook;")->fetch();

var_dump($newId);