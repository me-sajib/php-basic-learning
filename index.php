<html>
<head> <title>Index</title> </head>
<body>
    <h1>Request global variables</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Name: <input type="text" name="fname" /><br>
    Age : <input type="number" name="age">
    <input type="submit"/>
</form>


<?php
// $_REQUEST METHOD
if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    $name =htmlspecialchars( $_POST["fname"]);
    $age = htmlspecialchars($_POST['age']);
    if(empty($name)){
        echo "Name is empty";
    }else{
        echo "Name is $name";
    }

    if(empty($age)){
        echo "Age is required";
    }else{
        echo "her age is $age";
    }
}

// exception
// function devide($a, $b){
//     if($b == 0){
//         throw new exception("Division by zero");
//     }
//     return $a/$b;
// }
// try{
//     echo devide(10, 0);
// }catch(Exception $e){
//     echo "Error: ".$e->getMessage();
// }
// php json
// $ages = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
// $json = json_encode($ages);
// $djson = json_decode($json);
// var_dump($djson);
// super global variables
// $_SERVER - server variables
// echo $_SERVER['PHP_SELF']; //SHOW THE PATH OF THE CURRENT PAGE
// echo $_SERVER['SERVER_NAME']; //SHOW THE SERVER NAME = localhost
// echo $_SERVER['REQUEST_METHOD']; //SHOW THE REQUEST METHOD = GET
// echo $_SERVER['HTTP_HOST']; //SHOW THE HTTP HOST = localhost
// echo $_SERVER['HTTP_USER_AGENT']; //SHOW THE USER AGENT = Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36
// echo $_SERVER['SCRIPT_NAME']; //SHOW THE SCRIPT NAME = /index.php


// $GLOBALS
// $a = 2;
// $b = 3;
// function addition(){
//     echo $GLOBALS['x'] = $GLOBALS['a'] + $GLOBALS['b'];
// }
// addition();
// echo $x;
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
    ?>
</body>
</html>