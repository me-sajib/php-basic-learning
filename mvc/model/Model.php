<?php
include "classes/DB.php";


class Model
{
    public function getAllUser(){
        $sql = "SELECT * FROM users";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
