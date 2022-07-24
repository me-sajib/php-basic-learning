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


// destructor method mean automatically run function
// class Fruit{
//     public $name;

//     public function __construct($name){
//         $this->name = $name;
//     }

//     public function __destruct()
//     {
//         echo "Fruit ".$this->name." is destroyed";
//     }
// }

// $ff = new Fruit("Apple");

// inheritance 
class Fruit{
    public $name;
    public $color;

    public function __construct($name, $color){
        $this->name = $name;
        $this->color = $color;
    }
    
    protected function intro(){
        echo "Fruit ".$this->name." is ".$this->color."<br>";
    }
}

class Mango extends Fruit{
    public function __construct($name, $color)
    {
     parent::__construct($name, $color);
     $this->intro();   
    }
}

$man = new Mango("mango", "red");
