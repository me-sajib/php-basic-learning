<!-- class object property method -->
<?php

// class Intro{
//     public $name;
//     public $age;
//     const ID = 22;
//     public static $school = "Dhaka College";

//     public function __construct($name, $age){
//         $this->name = $name;
//         $this->age = $age;
//     }
//     public function details(){
//         echo "this person name is ".$this->name;
//     }
    
//     public static function full_information(){
//         echo "this person age is "." his id: ".Intro::ID;
//         echo "<br> school is ".self::$school;
//     }
// }

// $result = new Intro("sajib", "23");
// Intro::full_information();


// interface implement

// interface School{
//     public function schoolName($name):void;
//     public function address($address);
// }

// class Schools implements School{
//     public function schoolName($name):void{
//         echo "school name is ". $name;
//     }

//     public function address($address){
//         echo "his school address is ".$address;
//     }
// }

// abstract 

abstract class School{
    abstract function name($name):void;
    abstract function address($address):void;
    public function student($std):void{
        echo "total student is ".$std;
    }
}

class Schools extends School{
    public function name($name):void{
        echo "his school name ".$name;
    }

    public function address($address):void{
        echo "his school address is ".$address;
    }
}

$result = new Schools();
echo $result->name("rangpur");
echo $result->address("Rangpur");