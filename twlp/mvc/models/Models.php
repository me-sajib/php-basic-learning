<?php
include_once "DB.php";

class Models{
    public function allUsers(){
        $sql = "SELECT * FROM users";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}