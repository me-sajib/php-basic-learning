<?php
require_once('config.php');

class DB{
    public static $pdo;

    public static function connection(){
        if(!self::$pdo){
            try{
                self::$pdo = new PDO("mysql:host=".HOST.";dbname=".DB_NAME , USER, PASS);
                
            }catch(PDOException $e){
                echo "connection fail".$e->getMessage();
            }
        }
        return self::$pdo;
    }

    // prepare function
    public static function prepare($sql){
        return self::connection()->prepare($sql);
    }
}