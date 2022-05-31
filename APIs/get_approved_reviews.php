<?php
include("connection.php");

$query = $mysqli->prepare("SELECT * from Reviews where status = 2");
$query->execute();
$array = $query->get_result();

$response = [];
while($todo = $array->fetch_assoc()){
    $response[] = $todo;
} 

$json = json_encode($response);
echo $json;

?>