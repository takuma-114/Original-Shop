<?php
session_start();
include '../classes/user.php';

$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['e-mail'];
$holder = $_POST['holder'];
$number = $_POST['number'];
$date = $_POST['date'];

$p1 = new User;



foreach ($_SESSION["cart_item"] as $item){
    $test_array[] = $item["code"]; 
}

$transaction_code = "TRANSID-".strtoupper(uniqid());

for ($x=0; $x<count($test_array); $x++){
    $p1->saveTransaction($_SESSION['user_id'], $test_array[$x], $transaction_code);
}

$p1->savePurchase($name,$address,$email,$holder,$number,$date,$transaction_code);
?>