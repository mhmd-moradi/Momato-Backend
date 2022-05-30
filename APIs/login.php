<?php

include("connection.php");

if(isset($_POST["username"]) && isset($_POST["password"])){
    $username = $_POST["username"];
    $password = hash("sha256", $_POST["password"]);
}else
    die("Failure!");

//retrieve inserted user id
$query = $mysqli->prepare("Select user_id from Users where username = ? and password = ?");
$query->bind_param("ss", $username, $password);
$query->execute();
$query->store_result();
$num_rows = $query->num_rows;
$query->bind_result($id);
$query->fetch();

if($num_rows == 0)
    $response["user_id"] = -1;
else
    //send inserted user id to front end
    $response["user_id"] = $id;

$json = json_encode($response);
echo $json;
?>