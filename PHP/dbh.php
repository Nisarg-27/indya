<?php

$servername = "localhost";
$dbUsername = "root";
$dbPassowrd = "";
$dbName = "clg_pro";

$conn = mysqli_connect($servername, $dbUsername, $dbPassowrd, $dbName);

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
