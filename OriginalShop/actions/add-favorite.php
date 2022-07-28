<?php
session_start();

include "../classes/product.php";

$p1 = new Product;

$p1->getProduct($_GET["id"]);

$product_id = $_GET["id"];

$user_id = $_SESSION["user_id"];

$p1->addFavorite($user_id,$product_id);

?>