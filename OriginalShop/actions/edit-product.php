<?php

include '../classes/admin.php';

$product_name = $_POST['product_name'];
$product_code = $_POST['product_code'];
$price = $_POST['price'];
$photo_name = $_FILES['photo']['name']; //filename of the file
$tmp_name = $_FILES['photo']['tmp_name']; //location of temp file

$p1 = new Admin;

$p1->editProduct($_GET['product_id'],$product_name,$product_code,$photo_name,$price,$tmp_name);

?>