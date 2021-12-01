<?php

class PhonebookUse
{


    // database connection

    private $conn;

    public $id;
    public $first_name;
    public $last_name;
    public $number;
    public $type;

    // constructor
    public function __construct(){
        $this->conn = $db;
    }

    public function countRegisters() {
        $query =
            "SELECT
                COUNT(*)
            FROM contact";

        return $this->conn->query($query);
    }

    public function showRegisters() {
        $query =
            "SELECT
                C.id,
                C.first_name,
                C.last_name,
                P.number,
                P.type,
            FROM contact C
            LEFT JOIN phone P ON P.contact_id = C.id
            ORDER BY 2 DESC";

        return $this->conn->query($query);

    }

    public function addRegister($userId) {
        $query =
            "
            DELETE FROM contact
            WHERE id = " . $userId ;


    }

    public function editRegister() {

    }

    public function deleteRegister() {
        $query =
            "
            DELETE FROM contact
            WHERE id = " . $userId ;

        return $this->conn->query($query);

    }


}