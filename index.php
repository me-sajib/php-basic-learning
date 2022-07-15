<?php
// super global variables
// $GLOBALS
$a = 2;
$b = 3;
function addition(){
    echo $GLOBALS['x'] = $GLOBALS['a'] + $GLOBALS['b'];
}
addition();
echo $x;
// function
// basic function
// function hello($name = "jack", $age = 22){
//     echo "$name is $age years old.";
// }
// hello("John", 55);
// hello();
echo "<br>";
// array
//multidimensional array
// $cars = array(
//     array("Volvo",22,18),
//     array("BMW",15,13),
//     array("Saab",5,2),
//     array("Land Rover",17,15)
// );
// for ($i=0; $i < 4; $i++) { 
//     for ($j=0; $j < 3; $j++) { 
//         echo $cars[$i][$j];
//         echo " <br/>";
//     }
// }
// loops
// for loop
$nums = 2;
// for($i =1; $i <=10; $i++){
//     echo "2 X ".$i." =".$nums*$i."<br>";
// }

// while loop
$i = 1;
// while($i <=10){
//     echo "2 X ".$i." =".$nums*$i."<br>";
//     $i++;
// }

// do while loop
// do{
//     echo "2 X ".$i." =".$nums*$i."<br>";
//     $i++;
// }while($i <=10);

// $teams = ["Liverpool", "Chelsea", "Arsenal", "Manchester United", "Manchester City"];
// $teams = ["Dhaka"=> "Bangladesh", "London"=> "England", "New York"=> "USA", "Sydney"=> "Australia"];
// $teams = ["Gaibandha"=> ["nodi"=>"bil", "road"=> "park"], "Palshabari"=>"upozila"];
// foreach ($teams as $key => $value) {
//     if(is_array($value)){
//         foreach ($value as $key1 => $value1) {
//             echo $key." ".$key1." ".$value1."<br>";
//         }
//     }else{

//         echo $key." ".$value."<br>";
//     }
// }

// switch statement
$color = "red";

switch ($color) {
    case 'red':
        echo "Red is the color of fire";
        break;
    case "blue":
        echo "Blue is the color of the sky";
        break;
    default:
        echo "I don't know that color";
        break;
}

// conditional statement
// $t = date("H");
// if($date < "20") {
//     echo "Have a good day!";
// } else {
//     echo "Have a good night!";
// }

// operator precedence
// arithmetic operators 
//  + = addition, - = subtraction, * = multiplication, / = division, % = modulus
//  ++ = increment, -- = decrement

// comparison operators
//  == = equal to, != = not equal to, <> = not equal to, > = greater than, < = less than, >= = greater than or equal to, <= = less than or equal to 

// logical operator
//  && = and, || = or, ! = not, and, or, xor = true but not both true

// concatenation operator
//  . = concatenate, .= = concatenate and assign

// conditional operator
//  ? = if, : = else, ?: = ternary operator, ?? = null coalesce operator
// constants
// define("DB", "localhost");
// define("arr",["a","b","c"]);


// datatype check
// string
$str = 'Hello World';
// number
$num = 123;
// boolean  
$bool = true;
// array
$arr = [1, 2, 3];
// object
$obj = new stdClass();
// null
$null = null;
// resource
$res = fopen('index.php', 'r');
// undefined


    // decare variables
    $name = "sajib sarker";
    $age = "20";
    const AGE = "20";
    $age = 33;
    echo $name, $age, AGE;
