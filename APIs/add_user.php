<?php

include("connection.php");

if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"]) && isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["gender"])){
    $username = $_POST["username"];
    $password = hash("sha256", $_POST["password"]);
    $email = $_POST["email"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $gender = $_POST["gender"];
}else
    die("Failure!");



?>