<?php

include_once ("config/PhonebookDatabase.php");
include_once ("config/PhonebookUse.php");

$newConnection = new PhonebookDatabase();
$newConnection->doConnection();

$newUse = new PhonebookUse($newConnection);

$newUse->countRegisters();
var_dump($newUse);