<?php
header("Access-Control-Allow-Origin: *"); 
header("Content-Type: application/json");

$host = "localhost";
$db_user = "root";
$db_pass = null;
$db_name = "momatodb";

$mysqli = new mysqli($host, $db_user, $db_pass, $db_name);

?>