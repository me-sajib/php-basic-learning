<?php
require_once ("DB.php");

abstract class Main
{
    protected $table;
    abstract function updateData($id,$name,$email,$number,$gender,$comment);
    abstract function insertData($id,$name,$email,$number,$gender,$comment);

    public function readAll(){
        $sql = "SELECT * FROM ".$this->table;
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function readById($id){
        $sql = "SELECT * FROM users WHERE id=:id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function deleteUser($id){
        $sql = "DELETE FROM users WHERE id=:id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
