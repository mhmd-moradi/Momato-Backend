<?php
include("connection.php");

if(isset($_GET["restaurant_id"])){
    $restaurant_id = $_GET["restaurant_id"];
    $query = $mysqli->prepare("SELECT * from Reviews where restaurant_id = ? ");
    $query->bind_param("s", $restaurant_id);
}else
    $query = $mysqli->prepare("SELECT * from Reviews");
    
$query->execute();
$array = $query->get_result();

$response = [];
while($restaurant = $array->fetch_assoc()){
    $response[] = $restaurant;
} 

$json = json_encode($response);
echo $json;


?>