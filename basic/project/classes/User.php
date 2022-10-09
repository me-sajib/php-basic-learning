<?php
require("Main.php");

class User extends Main{
    protected $table = "users";

 
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

   
}