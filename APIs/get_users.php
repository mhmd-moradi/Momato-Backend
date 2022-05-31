<?php
include("connection.php");

if(isset($_GET["user_id"]) ){
    $user_id = $_GET["user_id"];
    $query = $mysqli->prepare("SELECT * from Users where user_id = ?");
    $query->bind_param("s", $user_id);
}else
    $query = $mysqli->prepare("SELECT * from Users");
    
$query->execute();
$array = $query->get_result();

$response = [];
while($user = $array->fetch_assoc()){
    $response[] = $user;
} 

$json = json_encode($response);
echo $json;


?>