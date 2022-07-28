<?php
include '../classes/admin.php';

$username = $_POST['username'];
$password = $_POST['password'];

$user = new Admin;

$user->login($username,$password);

?>