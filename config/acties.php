<?php

require_once 'db-conn.php';

class acties
{

    private $db;

    public function __construct()
    {
        $this->db = new DBConnectionUser();
    }

    public function create()
    {

        $conn = $this->db->getConnection();

        if (isset($_POST['send'])) {
            $titel = $_POST['titel'];
            $beschrijving = $_POST['beschrijving'];
            $status = $_POST['status'];
            $prioriteit = $_POST['prioriteit'];
            $deadline = $_POST['deadline'];

            $deadline = date('d-m-Y', strtotime($deadline));

            var_dump($deadline);
            exit();

            $stmt = $conn->prepare("INSERT INTO taken (titel, beschrijving, status, prioriteit, deadline) VALUES (:titel, :beschrijving, :status, :prioriteit, :deadline)");
            $stmt->bindParam(':titel', $titel);
            $stmt->bindParam(':beschrijving', $beschrijving);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':prioriteit', $prioriteit);
            $stmt->bindParam(':deadline', $deadline);
            $stmt->execute();

        }
    }

    public function read()
    {

        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT * FROM taken");
        $stmt->execute();
        $result = $stmt->fetchAll();


        return $result;
    }


    public function update()
    {

        $conn = $this->db->getConnection();

        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $titel = $_POST['titel'];
            $beschrijving = $_POST['beschrijving'];
            $status = $_POST['status'];
            $prioriteit = $_POST['prioriteit'];
            $deadline = $_POST['deadline'];

//            $deadline = date('d-m-Y', strtotime($deadline));

            $stmt = $conn->prepare("UPDATE taken SET titel= :titel, beschrijving= :beschrijving, status= :status, prioriteit= :prioriteit, deadline= :deadline WHERE id= :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':titel', $titel);
            $stmt->bindParam(':beschrijving', $beschrijving);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':prioriteit', $prioriteit);
            $stmt->bindParam(':deadline', $deadline);
            $stmt->execute();


        }
    }

    public function retrieve($id)
    {

        $conn = $this->db->getConnection();

        $smtp = $conn->prepare("SELECT * FROM taken WHERE id = :id");
        $smtp->bindParam(':id', $id);
        $smtp->execute();
        $result = $smtp->fetch();
        return $result;
    }

    public function delete($id)
    {
        $conn = $this->db->getConnection();


        $stmt = $conn->prepare("DELETE FROM taken WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }


}