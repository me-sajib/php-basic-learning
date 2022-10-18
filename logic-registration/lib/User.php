<?php
include ("Connection.php");
include ("Session.php");

class User{
    private $db;
    // set database connection
    public function __construct()
    {
        $this->db = new Connection();
    }

// user registration method
    public function userRegistration($data){
        $name = $data['name'];
        $email = $data["email"];
        $password = $data["password"];

        // if already email register
        $checkEmail = $this->hasRegister($email);

        // field empty check
        if($name == "" OR $email == "" OR $password == ""){
            $err = "<div class='alert alert-danger'>Field must not be empty</div>"; 
            return $err;
        }

        // check valid email or not
        if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
            $err = "<div class='alert alert-danger'>Please enter a valid email</div>"; 
            return $err;
        }

        // already email user error msg show
        if($checkEmail == true){
            $err = "<div class='alert alert-danger'>This email already exits</div>"; 
            return $err;
        }

        $sql = "INSERT INTO user (id, name, email, password) VALUES (:id, :name, :email, :password)";
        $insertData = $this->db::$pdo->prepare($sql);
        $insertData->bindValue(":id", "1");
        $insertData->bindValue(":name", $name);
        $insertData->bindValue(":email", $email);
        $insertData->bindValue(":password", $password);
       $result = $insertData->execute();

       if($result){
        $err = "<div class='alert alert-success'><strong>Thank you.</strong> You have been registered</div>"; 
        return $err;
       }else{
        $err = "<div class='alert alert-danger'><strong>Failed.</strong> There are something problem</div>"; 
        return $err;
       }
    }

    // check user exits or not
    public function hasRegister($email){
        $query = "SELECT email FROM user WHERE email=:email";
        $sql = $this->db::$pdo->prepare($query);
        $sql->bindValue(":email", $email);
        $sql->execute();
        // if user count or not
        if($sql->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    // login user method
    public function loginUser($data){
        $email = $data['email'];
        $pwd = $data["password"];

        // check is not valid user
        $validEmail = $this->hasRegister($email);
        // is empty field
        if($email == "" OR $pwd == ""){
            $err = "<div class='alert alert-danger'>Field must not be empty</div>"; 
            return $err;
        }

        // check valid email field
        if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
            $err = "<div class='alert alert-danger'>Please enter a valid email</div>"; 
            return $err;
        }

        // check user valid
        if($validEmail == false){
            $err = "<div class='alert alert-danger'>This user not exits</div>"; 
            return $err;
        }

        $query = "SELECT * FROM user WHERE email=:email AND password=:pwd LIMIT 1";
        $sql = $this->db::$pdo->prepare($query);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":pwd", $pwd);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_OBJ);
    if($result){
        Session::init();
        Session::set("login", "true");  
        Session::set("user", $result->name);
    }else{
        $err = "<div class='alert alert-danger'>Password is wrong</div>"; 
return $err;
    }
    }
}