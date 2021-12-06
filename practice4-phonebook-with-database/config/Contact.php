<?php

class Contact
{
    public $id;
    public $firstname;
    public $lastname;
    public $phoneNumber;
    public $phoneType;


    function showContacts($conn) {
        return $conn->query(
            "SELECT * FROM contact C INNER JOIN phone P ON P.contact_id = C.id;");
    }

    static function countMaxContactId($conn) {
        return $conn->query(
            "SELECT MAX(id) FROM contact;");
    }

    static function countMaxPhoneId($conn) {
        return $conn->query(
            "SELECT MAX(id) FROM phone;");
    }

    function showEditableContact($conn) {
        return $conn->query(
          "SELECT * FROM contact C INNER JOIN phone P ON P.contact_id = C.id WHERE C.id = $this->id;"
        );
    }

    function addContact($conn) {
        return $conn->query("INSERT INTO contact VALUES ($this->id, $this->firstname, $this->lastname);");
    }

    function addPhone($conn) {
        return $conn->query("INSERT INTO phone VALUES (countMaxPhoneId($db)+1, $this->id, $this->phoneNumber, $this->phoneType);");
    }

    function editContact($conn) {
        return $conn->query(
            "ALTER TABLE contact SET id = $this->id, first_name = $this->firstname, last_name = $this->lastname  WHERE id = $this->id;"
        );
    }

    function editPhone($conn) {
        return $conn->query(
            "ALTER TABLE phone SET id = id, contact_id = $this->id, number = $this->phoneNumber, type = $this->phoneType WHERE id = $this->id;"
        );
    }

    function deleteContact($conn) {
        return $conn->query("DELETE FROM contact WHERE id = $this->id");
    }

}