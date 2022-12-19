<?php
error_reporting(E_ALL); 
require 'dbh.php';
session_start();
$result = mysqli_query($conn, "SELECT * FROM momo where Id = 2; ");
$row = mysqli_fetch_array($result);
echo $row[0]."<br>";
echo $row[1]."<br>";
echo $row[2]."<br>";
echo $row[3]."<br>";
echo $row[4]."<br>";
echo $row[5]."<br>";
echo $row[6]."<br>";
