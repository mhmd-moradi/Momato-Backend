<?php

include("connection.php");

if(isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["email"]) && isset($_POST["user_id"])){
    $firs_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $user_id = $_POST["user_id"];
    
}else
    die("Failure!");

$query = $mysqli->prepare("UPDATE Users SET first_name = ?, last_name = ?, email = ? WHERE user_id = ?");
$query->bind_param("sssi", $firs_name, $last_name, $email, $user_id);
$query->execute();


$response = [];

if($mysqli->affected_rows === 1)
    $response["success"] = true;

else
    $response["success"] = false;

$json = json_encode($response);
echo $json;

?>