<?php

require_once 'acties.php';

class DBConnectionUser{

    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "freshportal";
    public $conn;

    public function __construct(){
        $this-> conn = new pdo("mysql:host=".$this->host.";dbname=".$this->database, $this->username, $this->password);

        if(!$this->conn){
            echo "Connection failed!";
        }
    }

    public function getConnection(){
        return $this->conn;
    }




}