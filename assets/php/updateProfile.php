<?php

require 'config.php';
$userID = $_SESSION["id"];
//display warnings
error_reporting(E_ALL);
ini_set('display_errors', 1);

$emailAddress = $_GET['emailAddress'];
$fname = $_GET['fname'];
$lname = $_GET['lname'];
$mobileNum = $_GET['mobileNum'];
$phoneNum = $_GET['phoneNum'];
$street = $_GET['street'];
$city = $_GET['city'];
$zipCode = $_GET['zipCode'];
$dob = $_GET['dob'];

$moodleUrl = $_GET['moodleUrl'];
$moodleUsername = $_GET['moodleUsername'];
$moodlePassword = $_GET['moodlePassword'];


$colEmailPass = $_GET['colEmailPass'];
$colEmail = $_GET['colEmail'];





$query = mysqli_query($mysqli, "UPDATE `users` SET `emailAddress`='$emailAddress', `emailPassword`='$colEmailPass',`collegeEmail`='$colEmail',`fname`='$fname',`lname`='$lname',`mobileNum`='$mobileNum',`phoneNum`='$phoneNum',`street`='$street',`city`='$city',`zipCode`='$zipCode',`dob`='$dob' WHERE `userID`='$userID'");
    if($query){
     echo "Update Success";
    }else{
     echo "Update Failed";   
    }


$query = mysqli_query($mysqli, "UPDATE `moodle` SET `moodleUsername`='$moodleUsername',`moodlePassword`='$moodlePassword',`moodleUrl`='$moodleUrl' WHERE `userID`='$userID'");
    if($query){
     echo "Update Success";
    }else{
     echo "Update Failed";   
    }

?>