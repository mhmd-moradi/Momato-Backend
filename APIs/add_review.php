<?php

include("connection.php");

if(isset($_POST["user_id"]) && isset($_POST["restaurant_id"]) && isset($_POST["description"]) && isset($_POST["date"])){
    $user_id = $_POST["user_id"];
    $restaurant_id = $_POST["restaurant_id"];
    $description = $_POST["description"];
    $date = $_POST["date"];
}else
    die("Failure!");

//inserting review
$query = $mysqli->prepare("INSERT INTO Reviews(user_id, restaurant_id, status, description, date) VALUES (?, ?, 1, ?, ?)");
$query->bind_param("iiss", $user_id, $restaurant_id, $description, $date);
$query->execute();


$response = [];

if($mysqli->affected_rows === 1)
    $response["success"] = true;
else
    $response["success"] = false;

$json = json_encode($response);
echo $json;

?>