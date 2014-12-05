<?php

//Php Setup
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'config.php';
$userID = $_SESSION["id"];

if($query = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `userID` = '$userID'")){
$data = $query->fetch_array();
$courseID = $data['courseID'];

if ($modules = mysqli_query($mysqli, "SELECT * FROM `moodle` WHERE `userID` = '$userID'")) {
    
    $data        = $modules->fetch_array();
    $moodleToken = $data['moodleToken'];
    $moodleID    = $data['moodleID'];
    
    // get modules
    $ch = curl_init();
    // set URL and other appropriate options
    curl_setopt($ch, CURLOPT_URL, "http://moodle.ncirl.ie/webservice/rest/server.php?wstoken=$moodleToken&wsfunction=moodle_enrol_get_users_courses&userid=$moodleID&moodlewsrestformat=json");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // grab URL and pass it to the browser
    
    $courses = curl_exec($ch);
    
    
    // close cURL resource, and free up system resources
    curl_close($ch);
    
    foreach (json_decode($courses, true) AS $value) {
        $moduleID = $value["id"];
        if ($query = mysqli_query($mysqli, "SELECT * FROM `modules` WHERE `moduleID` = '$moduleID'")) {
                $fullName    = $value["fullname"];
                $shortName = $value["shortname"];
                $moduleID      = $value["id"];
                $moduleCredVal = 5;
                $moduleLecture = "Unknown";
                $moduleSemester = 1;
            if (mysqli_num_rows($query)) {
                $query = mysqli_query($mysqli, "UPDATE `modules` SET `moduleID`='$moduleID', `moduleName`='$fullName', `moduleLecture`='$moduleLecture', `courseID`='$courseID', `moduleSemester`='$moduleSemester', `moduleCredVal`='$moduleCredVal', `moduleCode`='$shortName' WHERE `moduleID` ='$moduleID'");
                echo "updated old data";

            } else {

                
                $query = mysqli_query($mysqli, "INSERT INTO modules (moduleID, moduleName, moduleLecture, courseID, moduleSemester, moduleCredVal, moduleCode) VALUES ('$moduleID', '$fullName', '$moduleLecture', '$courseID', '$moduleSemester', '$moduleCredVal', '$shortName');");
                echo "added new modules";
            }
            
        }
        
    }
    
    
} else {
    echo 'No moodle info found';
}
}


?>