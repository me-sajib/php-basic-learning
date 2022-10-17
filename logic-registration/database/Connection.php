<?php
include_once "config.php";

class Connection{
    public static $pdo;
    
    public function __construct()
    {
        if(!isset(self::$pdo)){
            try{
                self::$pdo = new PDO("mysql:host=".HOST.";dbname=".DB_NAME, USER, PASSWORD);
            }catch(PDOException $e){
                echo "Database connection fail".$e->getMessage();
            }
        }
    }
}