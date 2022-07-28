<?php
session_start();

include "../classes/product.php";

$p1 = new Product;

$product_id = $_GET["id"];

$user_id = $_SESSION["user_id"];

$p1->deleteFavorite($product_id,$user_id);

?>