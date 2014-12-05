<?php

//Php Setup
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'config.php';
$userID = $_SESSION["id"];

//Get College Info
if ($query = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `userID` = '$userID'")) {
    $data        = $query->fetch_array();
    $collegeID   = $data['collegeID'];
    $collegePass = $data['emailPassword'];
    
    // create a new cURL resource
    $ch = curl_init();
    
    
    
    //Get Token
    curl_setopt($ch, CURLOPT_URL, "http://moodle.ncirl.ie/login/token.php?username=$collegeID&password=$collegePass&service=moodle_mobile_app");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $token        = curl_exec($ch);
    $token        = json_decode($token);
    $currentToken = $token->token;

    
    //Get moodle userID
    curl_setopt($ch, CURLOPT_URL, "http://moodle.ncirl.ie/webservice/rest/server.php?wstoken=$currentToken&wsfunction=moodle_webservice_get_siteinfo&moodlewsrestformat=json");
    $info     = curl_exec($ch);
    $info     = json_decode($info);
    $moodleID = $info->userid;
    $siteURL  = $info->siteurl;
    
    
    // close cURL resource, and free up system resources
    curl_close($ch);
    
    if ($query = mysqli_query($mysqli, "SELECT * FROM `moodle` WHERE `userID` = '$userID'")) {
        
        if (mysqli_num_rows($query)) {
            
            echo 'updating old data';
            $query = mysqli_query($mysqli, "UPDATE `moodle` SET `moodleID`='$moodleID',`userID`='$userID',`moodleUsername`='$collegeID',`moodlePassword`='$collegePass',`moodleUrl`='$siteURL',`moodleToken`='$currentToken' WHERE `userID`='$userID'");
            
        } else {
            $query = mysqli_query($mysqli, "INSERT INTO `moodle`(`moodleID`, `userID`, `moodleUsername`, `moodlePassword`, `moodleUrl`, `moodleToken`) VALUES ('$moodleID', '$userID', '$collegeID', '$collegePass', '$siteURL', '$currentToken')");
            
            if ($query) {
                echo 'moodle successful';
            }
            
        }
        
    }
    
}




?>