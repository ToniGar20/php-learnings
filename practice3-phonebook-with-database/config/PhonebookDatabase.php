<?php

class PhonebookDatabase
{
    //Database
    private $host = "51.178.152.213";
    private $db_name = "agarcia_phonebook_db";
    private $username = "agarcia_usr";
    private $password = "abc123.";
    public $conn;

    //Doing connection to database
    public function doConnection(): ?PDO
    {
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $this->conn = null;
        try{
            $this->conn = new PDO("pgsql:host=" . $this->host . ";port=5432;dbname=" . $this->db_name, $this->username, $this->password, $options);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }


}