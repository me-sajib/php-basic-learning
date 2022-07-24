<?php
// oop class
class Person{
    public $name;
    public $age;

    public function __construct($name, $age){
        $this->name = $name;
        $this->age = $age;
    }

   

    public function get_details() :void {
        echo "Name: ".$this->name."<br>";
        echo "Age: ".$this->age."<br>";
    }
}

$persons = new Person("John", 22);
$persons->get_details();
