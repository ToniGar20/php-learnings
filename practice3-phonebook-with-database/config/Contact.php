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
            "SELECT *, DATE(created_at) AS date FROM public.phonebook ORDER BY first_name ASC"
        );
    }

    function countContacts() {
        return $this->conn->query(
            "SELECT COUNT(*) AS total FROM public.phonebook;"
        )->fetch();
    }

    function countMaxContactId() {
        return $this->conn->query(
            "SELECT MAX(id)+1 AS new_id FROM public.phonebook"
        )->fetch();
    }

    function showEditableContact() {
        $data = $this->conn->prepare(
          "SELECT * FROM public.phonebook WHERE id = :id"
        );

        $data->execute([':id' => $this->id]);
        return $data->fetch();
    }

    function addContact() {
        $data = $this->conn->prepare(
            "INSERT INTO public.phonebook (id, first_name, last_name, phone, phone_type) 
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
            "UPDATE public.phonebook SET
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
        $data = $this->conn->prepare("DELETE FROM public.phonebook WHERE id = :id");
        return $data->execute([':id' => $this->id]);
    }

}