<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require('config.php');
$conx=mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if(!$conx){print("Can not connect");}

$score = $_POST['score'];
$name = $_SESSION["username"];

$sql="UPDATE `users` SET score = '$score' WHERE username = '$name' AND score < $score";

$result=mysqli_query($conx, $sql);
?>