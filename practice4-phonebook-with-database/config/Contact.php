<?php

class Contact
{
    public $id;
    public $firstname;
    public $lastname;
    public $phoneNumber;
    public $phoneType;


    public function showContacts($conn) {
        return $conn->query(
            "SELECT * FROM contact C INNER JOIN phone P ON P.contact_id = C.id;");
    }

    public function showEditableContact($conn) {
        return $conn->query(
          "SELECT * FROM contact C INNER JOIN phone P ON P.contact_id = C.id WHERE C.id = $this->id;"
        );
    }

    public function addContact($conn) {
        return $conn->query("INSERT INTO contact VALUES (SELECT MAX(id)+1 FROM contact, $this->firstname, $this->lastname);");
    }

    public function addPhone($conn) {
        return $conn->query("INSERT INTO phone VALUES (SELECT MAX(id)+1 FROM phone, $this->id , $this->phoneNumber, $this->phoneType);");
    }

    public function editContact($conn) {
        return $conn->query(
            "ALTER TABLE contact SET id = $this->id, first_name = $this->firstname, last_name = $this->lastname  WHERE id = $this->id;"
        );
    }

    public function editPhone($conn) {
        return $conn->query(
            "ALTER TABLE phone SET id = id, contact_id = $this->id, number = $this->phoneNumber, type = $this->phoneType WHERE id = $this->id;"
        );
    }

    public function deleteContact($conn) {
        return $conn->query("DELETE FROM contact WHERE id = $this->id");
    }

}