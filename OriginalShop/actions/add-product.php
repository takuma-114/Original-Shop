<?php

include '../classes/product.php';

$product_name = $_POST['product_name'];
$product_code = $_POST['product_code'];
$price = $_POST['price'];
$photo_name = $_FILES['photo']['name']; //filename of the file
$tmp_name = $_FILES['photo']['tmp_name']; //location of temp file

$p1 = new Product;

$p1->addProduct($product_name,$product_code,$photo_name,$price,$tmp_name);

?>