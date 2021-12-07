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
            "SELECT *, DATE(updated_at) AS date FROM phonebook ORDER BY first_name ASC"
        );
    }

    function countContacts() {
        return $this->conn->query(
            "SELECT COUNT(*) AS total FROM phonebook;"
        )->fetch();
    }

    function countMaxContactId() {
        return $this->conn->query(
            "SELECT MAX(id)+1 AS new_id FROM phonebook"
        )->fetch();
    }

    function showEditableContact() {
        return $this->conn->query(
          "SELECT * FROM phonebook WHERE id = $this->id"
        )->fetch();
    }

    function addContact() {
        $data = $this->conn->prepare(
            "INSERT INTO phonebook (id, first_name, last_name, phone, phone_type) 
            VALUES (:id, :firstName, :lastName, :phone, :phoneType)"
        );
        $data->execute([
            ':id' => $this->id,
            ':firstName' => $this->firstname,
            ':lastName' => $this->lastname,
            ':phone' => $this->phoneNumber,
            ':phoneType' => $this->phoneType
        ]);

        return true;
    }

    function editContact() {
        $data = $this->conn->prepare(
            "UPDATE phonebook SET
                first_name = :firstName, 
                last_name = :lastName, 
                phone = :phone,
                phone_type = :phoneType
            WHERE id = :id"
        );
        $data->execute([
           ':firstName' => $this->firstname,
           ':lastName' => $this->lastname,
           ':phone' => $this->phoneNumber,
           ':phoneType' => $this->phoneType,
           ':id' => $this->id
        ]);
        return true;
    }

    function deleteContact() {
        return $this->conn->query("DELETE FROM phonebook WHERE id = $this->id");
    }

}