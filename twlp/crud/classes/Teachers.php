<?php
include_once "Main.php";

class Teachers extends Main{
    protected $table = "teachers";

    public $name;
    public $email;
    public $password;
    public $profile_photo;

    public function setName($name){
        $this->name = $name;
    }

    public function setEmail($email){
        $this->email = $email;
    }
    public function setPassword($password){
        $this->password = $password;
    }

    public function setProfile_photo($profile_photo){
        $this->profile_photo = $profile_photo;
    }

    public function insertUser(){
        $sql = "INSERT INTO users (name, email, password, profile_photo) VALUES (:name, :email, :password, :profile_photo)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':profile_photo', $this->profile_photo);
        return $stmt->execute();
    }

    public function updateUser($id){
        $sql = "UPDATE users SET name = :name, email = :email, password = :password, profile_photo = :profile_photo WHERE id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':profile_photo', $this->profile_photo);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }


}


?>