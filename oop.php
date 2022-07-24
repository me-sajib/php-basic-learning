<?php
// oop class
class Person{
    public $name;
    public $age;

    public function set_details($name, $age) : void{
        $this->name = $name;
        $this->age = $age;
    }

    public function get_details() :void {
        echo "Name: ".$this->name."<br>";
        echo "Age: ".$this->age."<br>";
    }
}

$persons = new Person();
$persons->set_details("John", 22);
$persons->get_details();
