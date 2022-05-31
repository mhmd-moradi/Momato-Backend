<?php

include("connection.php");

if(isset($_GET["review_id"])){
    $review_id = $_GET["review_id"];
    
}else
    die("Failure!");

$query = $mysqli->prepare("UPDATE Reviews SET status = 3 WHERE review_id = ?");
$query->bind_param("s", $review_id);
$query->execute();


$response = [];

if($mysqli->affected_rows === 1)
    $response["success"] = true;

else
    $response["success"] = false;

$json = json_encode($response);
echo $json;

?>