<?php

// namespace Html;
// class Table{
//     public $cell;
//     public $row;
//     public function message(){
//         echo "table cell is {$this->cell} and row is {$this->row}";
//     }
// }
$x = 4;
// function globalFunction(){
//     global $z;
//     $x = 3;
//     echo $x."global variable is ".$z;
// }

// globalFunction();

// super global variable
// $GLOBALS
// $_SERVER
// $_REQUEST
// $_GET;
// $_ENV;
// $_SESSION;
// $_COOKIE;
// $_FILES;

// function sum(){
//     $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['x'];
// }
// sum();
// echo $z;

// echo $_SERVER['HTTP_USER_AGENT'];
// echo $_SERVER['SERVER_ADDR'];

// echo date("d-m-Y");
// date_default_timezone_set("Asia/dhaka");
// echo date("h:i:sa");
// echo date_default_timezone_get();

// echo readfile("text.txt");

// $str = array("sajib", "is", "the", "good", "body");
// echo implode(", ", $str);

// array combine
// $arr1 = array("sajib", "Raju", "Golap");
// $arr2 = array("Js Developer", "SEO Experts", "Learning JS");

// $combine = array_combine($arr1, $arr2);

// print("<pre>");
// print_r($combine);
// print("</pre>");


// $names = array("sajib", "raju", "golap", "zahid", "momin", "masum");
// $length = count($names);

// for($i = 0; $i < $length; $i++){
//     print("<pre>$names[$i]</pre>");
// }
// function runCar($values){
//     $v = strtoupper($values);
//     return $v;
// }
// $cars = array(
//     "volvo"=>"xc56",
//     "bmw"=>"2jd3",
//     "toyota"=>"gd3k",
//     "audi"=>"gd3k"
// );
// $cars2 = array(
//     "bangla"=>"adkd",
//     "indaian"=>"klds"
// );
$cars = array("dhaka", "bangladesh");

// $check = array_keys($cars, "gd3k");
// $check = array_map("runCar",$cars);
// $check = array_merge($cars, $cars2);
// array_multisort($cars, SORT_ASC);
// if(in_array("dhaka", $cars)){
//     echo "Dhaka exits";
// }else{
//     echo "don't exit";
// }

print("<pre>");
print_r($check);
print("</pre>");


// $email = "sajib@gmail.com";

// if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
//     echo "not validate";
// }else{
//     echo "validate";
// }

