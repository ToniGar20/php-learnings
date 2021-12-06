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

    function countPhones() {
        $query = "SELECT id FROM phone";
        $temp = $this->conn->execute($query);
        return $temp->rowCount();
    }

    function showContacts() {
        return $this->conn->query(
            "SELECT * FROM contact C INNER JOIN phone P ON P.contact_id = C.id");
    }

    function countMaxContactId() {
        return $this->conn->query(
            "SELECT MAX(id)+1 AS counter FROM contact");
    }

    function countMaxPhoneId() {
        $this->conn->query(
            "SELECT MAX(id)+1 AS counter FROM phone");
    }

    function showEditableContact() {
        $this->conn->query(
          "SELECT * FROM contact C INNER JOIN phone P ON P.contact_id = C.id WHERE C.id = $this->id"
        );
    }

    function addContact() {
        $this->conn->prepare(
            "INSERT INTO contact VALUES (:id, :firstname, :lastname)"
        );

        $this->conn->execute([
            ':id' => $this->id,
            ':firstname' => $this->firstname,
            ':lastname' => $this->lastname
        ]);

    }

    function addPhone() {
        $this->conn->query("INSERT INTO phone (id, contact_id, number, type) VALUES (DEFAULT, DEFAULT, $this->phoneNumber, $this->phoneType)");
    }

    function editContact() {
        $this->conn->query(
            "ALTER TABLE contact SET id = $this->id, first_name = $this->firstname, last_name = $this->lastname  WHERE id = $this->id"
        );
    }

    function editPhone() {
        $this->conn->query(
            "ALTER TABLE phone SET id = id, contact_id = $this->id, number = $this->phoneNumber, type = $this->phoneType WHERE id = $this->id"
        );
    }

    function deleteContact() {
        return $this->conn->query("DELETE FROM contact WHERE id = $this->id");
    }

}