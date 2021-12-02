<?php

class PhonebookDatabase
{
    //Database
    private $host = "localhost";
    private $db_name = "phonebook_practice";
    private $username = "root";
    private $password = "password";
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
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password, $options);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }

    //Close connection
    public function closeConnection(){
        $this->conn->close();
    }

}