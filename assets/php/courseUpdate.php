<?php

require 'config.php';
$userID = $_SESSION["id"];
//display warnings
error_reporting(E_ALL);
ini_set('display_errors', 1);



$courseID = $_GET['courseID'];
$courseCode = $_GET['courseCode'];
$courseName = $_GET['courseName'];
$courseCat = $_GET['courseCat'];
$courseDeg = $_GET['courseDeg'];
$courseDur = $_GET['courseDur'];
$courseTime = $_GET['courseTime'];
$courseSDate = $_GET['courseSDate'];
$courseEDate = $_GET['courseEDate'];
$courseURL = $_GET['courseURL'];

$collegeID = $_GET['collegeID'];
$colName = $_GET['colName'];
$colAddress = $_GET['colAddress'];
$colCity= $_GET['colCity'];
$colCountry = $_GET['colCountry'];
$colPhone = $_GET['colPhone'];
$colUrl = $_GET['colUrl'];
$colEmail = $_GET['colEmail'];



$query = mysqli_query($mysqli,"SELECT * FROM `college` WHERE `colName` = '$colName'");
if($query){
    $data = $query->fetch_array();
    $collegeID = $data['collegeID'];
}

$query = mysqli_query($mysqli, "INSERT INTO `course`(`courseID`, `courseCode`, `courseName`, `courseCat`, `courseDeg`, `courseDur`, `courseTime`, `courseSDate`, `courseEDate`, `courseURL`, `collegeID`) VALUES ('$courseID','$courseCode','$courseName','$courseCat','$courseDeg','$courseDur','$courseTime','$courseSDate','$courseEDate','$courseURL','$collegeID') ON DUPLICATE KEY UPDATE `courseID` = '$courseID', `courseCode` = '$courseCode', `courseName`= '$courseName', `courseCat`= '$courseCat', `courseDeg`= '$courseDeg', `courseDur`= '$courseDur', `courseTime`= '$courseTime', `courseSDate`= '$courseSDate', `courseEDate`= '$courseEDate', `courseURL`= '$courseURL', `collegeID`= '$courseID'");
    if($query){
     echo "Update Success";
    }else{
     echo "Update Failed";   
    }


$query = mysqli_query($mysqli, "INSERT INTO `college`(`collegeID`, `colName`, `colAddress`, `colCity`, `colCountry`, `colPhone`, `colUrl`, `colEmail`) VALUES ('$collegeID','$colName','$colAddress','$colCity','$colCountry','$colPhone','$colUrl','$colEmail') ON DUPLICATE KEY UPDATE `collegeID` = '$collegeID', `colName` = '$colName', `colAddress` = '$colAddress', `colCity` = '$colCity', `colCountry` = '$colCountry', `colPhone` = '$colPhone', `colUrl` = '$colUrl', `colEmail` = '$colEmail'");
    if($query){
     echo "Update Success";
    }else{
     echo "Update Failed";   
    }

?>