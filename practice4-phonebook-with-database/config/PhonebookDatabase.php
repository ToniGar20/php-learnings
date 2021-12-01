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
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
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