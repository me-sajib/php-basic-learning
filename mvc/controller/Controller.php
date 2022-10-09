<?php
include_once ("model/Model.php");

class Controller 
{
    public $model;
    public function __construct()
    {
        $this->model = new Model();
    }

    public function home(){
        $user = $this->model->getAllUser();
        include "view/home.php";
    }
}
