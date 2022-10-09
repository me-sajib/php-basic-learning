<?php
require("DB.php");

class User{
    private $table = "users";

    public function readAll(){
        $sql = "SELECT * FROM ".$this->table;
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function insertData($id,$name,$email,$number,$gender,$comment){
        $sql = "INSERT INTO ".$this->table." (id, name, email, number, gender, comment) VALUES (:id, :name, :email, :number, :gender, :comment)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":number", $number);
        $stmt->bindParam(":gender", $gender);
        $stmt->bindParam(":comment", $comment);
    return    $stmt->execute();
    
    }

    public function readById($id){
        $sql = "SELECT * FROM users WHERE id=:id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function updateData($id,$name,$email,$number,$gender,$comment){
        $sql = "UPDATE ".$this->table." SET id=:id, name = :name, email =:email, number =:number, gender=:gender, comment=:comment WHERE id=:id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":number", $number);
        $stmt->bindParam(":gender", $gender);
        $stmt->bindParam(":comment", $comment);
    return    $stmt->execute();
    }

    public function deleteUser($id){
        $sql = "DELETE FROM users WHERE id=:id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}