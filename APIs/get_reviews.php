<?php
include("connection.php");

if(isset($_GET["restaurant_id"]) ){
    $restaurant_id = $_GET["restaurant_id"];
    $query = $mysqli->prepare("SELECT * from Reviews, Users where restaurant_id = ? and Users.user_id = Reviews.user_id");
    $query->bind_param("s", $restaurant_id);
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