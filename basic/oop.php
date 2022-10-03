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

interface School{
    public function schoolName($name):void;
    public function address($address);
}

class Schools implements School{
    public function schoolName($name):void{
        echo "school name is ". $name;
    }

    public function address($address){
        echo "his school address is ".$address;
    }
}



$result = new Schools();
echo $result->schoolName("rangpur");
echo $result->address("Rangpur");