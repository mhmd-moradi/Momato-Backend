<?php
include("connection.php");

if(isset($_GET["restaurant_id"]) && isset($_GET["user_id"])){
    $restaurant_id = $_GET["restaurant_id"];
    $user_id = $_GET["user_id"];
    $query = $mysqli->prepare("SELECT * from Reviews, Users where restaurant_id = ? and Users.user_id = Reviews.user_id and Reviews.user_id = ?");
    $query->bind_param("ss", $restaurant_id, $user_id);
}else
    $query = $mysqli->prepare("SELECT * from Reviews, Users where Users.user_id = Reviews.user_id");
    
$query->execute();
$array = $query->get_result();

$response = [];
while($restaurant = $array->fetch_assoc()){
    $response[] = $restaurant;
} 

$json = json_encode($response);
echo $json;


?>