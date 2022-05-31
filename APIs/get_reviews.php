<?php
include("connection.php");

$query = $mysqli->prepare("SELECT * from Reviews");
$query->execute();
$array = $query->get_result();

$response = [];
while($todo = $array->fetch_assoc()){
    $response[] = $todo;
} 

$json = json_encode($response);
echo $json;

?>