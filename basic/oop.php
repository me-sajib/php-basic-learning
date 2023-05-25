<?php
    namespace Student;
// basic oop
// class Fruits{
//     public $name;
//     const ID = 22;
//     public function __construct($name){
//         $this->name = $name;
//     }

//     // public function __destruct(){
//     //     echo "Fruits is destroyed $this->name";
//     // }
//     public function set_name($name){
//         $this->name = $name;
//     }

//     public function get_name(){
//         return "Name of the fruit $this->name and is ver useful and is is". self::ID;
//     }

// }

// class Mango extends Fruits{

//     public function message(){
//         echo "A message for me, i'm a mango sub class";
//         echo $this->get_name();
//     }
// }



// $obj = new Mango("Mango");
// echo $obj->get_name();
// echo $obj::ID;
// echo $obj->message();
// var_dump($obj instanceof Fruits);


// abstract class Car{
//     public $name;
//     public function __construct($name){
//         $this->name = $name;
//     }
//     abstract protected function intro() : string;
    
// }

// class Bmw extends Car{
//     public function intro() : string{
//         return "I am a $this->name";
//     }
// }

// $obj = new Bmw("BMW");
// echo $obj->intro();

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

// abstract class School{
//     abstract function name($name):void;
//     abstract function address($address):void;
//     public function student($std):void{
//         echo "total student is ".$std;
//     }
// }

// class Schools extends School{
//     public function name($name):void{
//         echo "his school name ".$name;
//     }

//     public function address($address):void{
//         echo "his school address is ".$address;
//     }
// }

// $result = new Schools();
// echo $result->name("rangpur");
// echo $result->address("Rangpur");

// interface Animal{
//     public function sound() : void;
// }

// class Cat implements Animal{
//     public function sound() : void{
//         echo "meow";
//     }
// }

// $obj = new Cat();
// $obj->sound();

// trait Cat{
//     public function sound() : void{
//         echo "meow";
//     }
// }

// trait Dog{
//     public function sound1() : void{
//         echo "woof";
//     }
// }

// class Animal{
//     use Cat, Dog;
// }

// $obj = new Animal();
// $obj->sound1();


class User{
    public $name;
    public $age;
    public function __construct($name, $age){
        $this->name = $name;
        $this->age = $age;
    }
    public function details(){
        echo "this person name is ".$this->name;
    }
}
$obj = new User("sajib", "23");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>
<body>
    <h1>Hey interface how are you </h1>
</body>
</html>