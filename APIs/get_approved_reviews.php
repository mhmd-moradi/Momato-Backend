<?php
include("connection.php");

if(isset($_GET["restaurant_id"]) ){
    $restaurant_id = $_GET["restaurant_id"];
}else
    die("Failure!");

$query = $mysqli->prepare("SELECT * from Reviews, Users where restaurant_id = ? and Users.user_id = Reviews.user_id and status = 2");
$query->bind_param("s", $restaurant_id);
    
$query->execute();
$array = $query->get_result();

$response = [];
while($restaurant = $array->fetch_assoc()){
    $response[] = $restaurant;
} 

$json = json_encode($response);
echo $json;


?>