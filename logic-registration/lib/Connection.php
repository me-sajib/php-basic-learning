<?php
include_once "config.php";

class Connection{
    public static $pdo;
    
    public function __construct()
    {
        if(!isset(self::$pdo)){
            try{
                $link = new PDO("mysql:host=".HOST.";dbname=".DB_NAME, USER, PASSWORD);
                $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $link->exec("SET CHARACTER set utf8");
                self::$pdo = $link;
            }catch(PDOException $e){
                die("Database connection fail".$e->getMessage());
            }
        }
    }
}