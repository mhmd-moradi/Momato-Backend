<?php

include("connection.php");
if(isset($_POST["image"]) && $_POST["name"]  && $_POST["location"]  && $_POST["category"]  && $_POST["opening_time"]  && $_POST["closing_time"]  && $_POST["user"] ){
    $image = $_POST["image"];
    $name = $_POST["name"];
    $location = $_POST["location"];
    $category = $_POST["category"];
    $opening_time = $_POST["opening_time"];
    $closing_time = $_POST["closing_time"];
    $user = $_POST["user"];
}else
    die("Failure!");


$query = $mysqli->prepare("INSERT INTO Restaurants(type, created_by,restaurant_name, location ,image, opening_time, closing_time) VALUES (?, ?, ?, ?, ?, ?, ?)");
$query->bind_param("iisssss", $category, $user, $name, $location, $image, $opening_time, $closing_time);
$query->execute();


$response = [];
if($mysqli->affected_rows === 1)
    $response["restaurant_id"] = $mysqli->insert_id;
else
    $response["restaurant_id"] = -1;

$json = json_encode($response);
echo $json;

?>