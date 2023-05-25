<?php

class Connection {
    private $conn;
    public function __construct()
    {
        try{
            $this->conn = new PDO("mysql:host=localhost;dbname=hospitals", "root", "");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function prepare($sql){
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    // insert database query
    public function insert($table, $data){
        $stmt = $this->prepare("INSERT INTO $table ($data) VALUES (?)");
        $stmt->execute([$data]);
    }
}