<?php

include "../classes/admin.php";

$p1 = new Admin;
$p1->deleteProduct($_GET['product_id']);


?>