<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

$dbHost = "localhost";
$dbName = "thomasbo_studenthub";
$dbUser = "thomasbo_admin";
$dbPass = "loop1234";

$mysqli = mysqli_connect($dbHost,$dbUser, $dbPass, $dbName);

// Start the session
session_start();


// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }





?>