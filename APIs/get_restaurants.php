<?php

include("connection.php");

$query = $mysqli->prepare("SELECT * from Restaurants");
$query->execute();
$array = $query->get_result();

$response = [];
while($restaurant = $array->fetch_assoc()){
    $response[] = $restaurant;
} 

$json = json_encode($response);
echo $json;

?>