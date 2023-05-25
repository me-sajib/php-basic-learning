<?php
require_once "config.php";

class DB{
    private static $pdo;

    public static function connection(){
        if(!isset(self::$pdo)){
            try{
                self::$pdo = new PDO("mysql:host=".HOST_NAME.";dbname=".DB_NAME.";", DB_USERNAME, DB_PASS);
            }catch(PDOException $e){
                echo "Connection fail".$e->getMessage();
            }
        }
        return self::$pdo;
    }

    public static function prepare($sql){
        return self::connection()->prepare($sql);
    }

}