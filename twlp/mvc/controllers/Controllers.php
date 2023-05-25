<?php
include_once "models/Models.php";

class Controllers{
    public $model;

    public function __construct(){
        $this->model = new Models();    
    }

    public function home(){
        $user = $this->model->allUsers();
        include_once "views/home.php";
    }
}
