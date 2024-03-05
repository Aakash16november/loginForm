<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "dbinfo";

$conn = new mysqli($servername, $username, $password, $database);

if(!$conn){
    die(mysqli_connect_error());
}
?>