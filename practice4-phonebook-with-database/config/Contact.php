<?php

class Contact
{
    private $conn;

    public $id;
    public $firstname;
    public $lastname;
    public $phoneNumber;
    public $phoneType;

    function __construct($db) {
        $this->conn = $db;
    }

    function showContacts() {
        return $this->conn->query(
            "SELECT *, DATE(updated_at) AS date FROM phonebook"
        );
    }

    function countMaxContactId() {
        return $this->conn->query(
            "SELECT MAX(id)+1 AS counter FROM phonebook"
        );
    }

    function showEditableContact() {
        return $this->conn->query(
          "SELECT * FROM phonebook WHERE C.id = $this->id"
        );
    }

    function addContact() {
        $this->conn->prepare(
            "INSERT INTO phonebook (id, first_name, last_name, phone, phone_type) VALUES (:id, :firstname, :lastname, :phone, :phone_type)"
        );
        $this->conn->execute([
            ':id' => $this->id,
            ':firstname' => $this->firstname,
            ':lastname' => $this->lastname,
            ':phone' => $this->phoneNumber,
            ':phone_type' => $this->phoneType
        ]);
    }

    function editContact() {
        $this->conn->query(
            "UPDATE phonebook SET id = $this->id, first_name = $this->firstname, last_name = $this->lastname  WHERE id = $this->id"
        );
    }

    function deleteContact() {
        return $this->conn->query("DELETE FROM phonebook WHERE id = $this->id");
    }

}