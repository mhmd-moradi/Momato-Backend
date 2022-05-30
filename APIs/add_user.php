<?php

include("connection.php");

if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"]) && isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["gender"])){
    $username = $_POST["username"];
    $password = hash("sha256", $_POST["password"]);
    $email = $_POST["email"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $gender = $_POST["gender"];
}else
    die("Failure!");

//inserting user
$query = $mysqli->prepare("INSERT INTO Users(username, password,email, role,first_name, last_name, gender) VALUES (?, ?, ?, 2, ?, ?, ?)");
$query->bind_param("ssssss", $username, $password, $email, $fname, $lname, $gender);
$query->execute();


$response = [];
if($mysqli->affected_rows === 1)
    {
        //retrieve inserted user id
        $query = $mysqli->prepare("Select user_id from Users where username = ?");
        $query->bind_param("s", $username);
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
                
    }
else
    $response["user_id"] = -1;

$json = json_encode($response);
echo $json;

?>