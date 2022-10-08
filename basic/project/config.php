<?php
class Connection{
    
    public static function db_connect(){
         $dsn = "mysql:host=127.0.0.1;dbname=hotels";
         $username = "root";
         $password ="";

        try{
            $connection = new PDO($dsn, $username, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          return $connection;

        }catch(PDOException $e){
                echo "connection failed ".$e->getMessage();
        }
    }
}

