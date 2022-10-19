<?php

class Session
{
    public static function init(){
        if(version_compare(phpversion(), "5.4.0", '<')){
            if(session_id() == ""){
                session_start();
            }
        }else{
            if(session_status() == PHP_SESSION_NONE){

                session_start();
            }
        }
    }

    public static function set($key, $value){
         $_SESSION[$key] = $value;
    }

    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }else{
            return false;
        }
    }

    public static function alreadyLogin(){
        if(self::get('login') == true){
            header("Location: allUser.php");
        }
    }

    public static function checkSession(){
        if(self::get("login") == false){
            session_destroy();
            header("Location: index.php");
        }
    }

    public static function destory(){
        session_destroy();
        session_unset();
        header("Location: index.php");
    }


}
