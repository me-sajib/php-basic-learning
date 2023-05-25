<?php
define("DSN","mysql:host=localhost;dbname=llc");
define("DB_USER", "root");
define("DB_PWD", "");

try{
    $connection = new PDO(DSN, DB_USER, DB_PWD);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}