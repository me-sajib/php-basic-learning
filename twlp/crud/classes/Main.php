<?php
include_once "DB.php";


abstract class Main{
    protected $table;
    
    abstract public function insertUser();
    abstract public function updateUser($id);
    
    public function readAll(){
        $sql = "SELECT * FROM users";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function readUser($id){
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function deleteUser($id){
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    
    public function validateData($data){
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        return $data;
    }

}