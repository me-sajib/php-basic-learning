<?php
// oop class

// iterable keyword
function printIterable():iterable{
    return ['a', 'b', 'c'];
}
$myIt = printIterable();
foreach($myIt as $value){
        echo $value . '<br>';
    }
// namespace Html;
// use Html\Table as T;
// include 'Html.php';

// $table = new T();
// $table->cell = '11';
// $table->row = '14';

// $table->message();
// class Person{
//     public $name;
//     public $age;

//     public function __construct($name, $age){
//         $this->name = $name;
//         $this->age = $age;
//     }

   

//     public function get_details() :void {
//         echo "Name: ".$this->name."<br>";
//         echo "Age: ".$this->age."<br>";
//     }
// }

// $persons = new Person("John", 22);
// $persons->get_details();


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

// constance

class bye{
    const LEAVE_MESSAGE = "good bye and see you soon dear..";
    public function bye(){
        echo self::LEAVE_MESSAGE;
    }
}

$goodbye = new bye();
$goodbye->bye();

// abstract classes

// abstract class Car{
//     public $name;
//     public $color;

//     public function __construct($name, $color){
//         $this->name = $name;
//         $this->color = $color;
//     }   
//     abstract public function intro():void;
// }
// // child classes
// class Volvo extends Car{
//     public function intro():void{
//         echo "Car ".$this->name." is ".$this->color."<br>";
//     }
// }

// $cars = new Volvo("Volvo", "red");
// $cars->intro();

// abstract classes with argument

// abstract class Car{
//     abstract public function name($name);
// }

// class Intro extends Car{
//     public function name($name){
//         echo "Car ".$name."<br>";
//     }

// }

// $cars = new Intro();
// $cars->name("Volvo");

// interface Car{
//     public function set_name();
// }

// class Details implements Car{
//     public function set_name()
//     {
//         echo "this is volvo car";
//     }
// }

// $car = new Details; 
// $car->set_name();

// trait carname{
//     public function get_name(){
//         echo "this is volvo car";
//     }
// }
// trait carname1{
//     public function get_namea(){
//         echo "this is volvo car 1";
//     }
// }

// class Bestcar{
//     use carname;
// }

// class Car{
//     use carname, carname1;
// }

// $obj = new Bestcar();
// $obj->get_name();

// $objj = new Car();
// $objj->get_name();
// $objj->get_namea();
echo "<br>";
// static method
// class greeting{
//     protected static function say_hello(){
//         echo "hello";
//     }
// }
// class Byes extends greeting{
//     public static function say_bye(){
//         echo "bye";
//     }
//     public function __construct()
//     {
//         parent::say_hello();
//     }

// }
// $bye = new Byes();

// static properties

// class Pi{
//     public static $pi = 3.14;
//     public function __construct()
//     {
//         echo self::$pi;
//     }
// }
// $p = new Pi();
// echo Pi::$pi;
