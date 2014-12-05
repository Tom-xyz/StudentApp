<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'config.php';
$userID = $_SESSION["id"];

if(!$userID){
    echo "Not Logged in!";
}

// create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, "http://moodle.ncirl.ie/login/token.php?username=x12410922&password=6SH1Yp4T4&service=moodle_mobile_app");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// grab URL and pass it to the browser

$token = curl_exec($ch);
$token = json_decode($token);

$currentToken = $token->token; 

//GET USER INFO
curl_setopt($ch, CURLOPT_URL, "http://moodle.ncirl.ie/webservice/rest/server.php?wstoken=".$currentToken."&wsfunction=moodle_webservice_get_siteinfo&moodlewsrestformat=json");
$info =curl_exec($ch);
$info = json_decode($info);

$userID = $info->userid;

//Get course id
curl_setopt($ch, CURLOPT_URL, "http://moodle.ncirl.ie/webservice/rest/server.php?wstoken=".$currentToken."&wsfunction=moodle_enrol_get_users_courses&userid=".$userID."&moodlewsrestformat=json");
$info =curl_exec($ch);
$info = json_decode($info);
$courseID = $info[0]->id;


//Get Contacts
curl_setopt($ch, CURLOPT_URL, "http://moodle.ncirl.ie/webservice/rest/server.php?wstoken=".$currentToken."&wsfunction=moodle_user_get_users_by_courseid&courseid=".$courseID."&moodlewsrestformat=json");
$contacts = curl_exec($ch);
$contacts = json_decode($contacts);

foreach ($contacts as $contact)
{
    $fullName = $contact->fullname;
    $emailAddress = $contact->email;
    $moodleID = $contact->id;
    foreach($contact->roles as $role){
       $role = $role->name; 
    }

    
    if ($query = mysqli_query($mysqli, "SELECT * FROM `contact` WHERE `moodleID` = '.$moodleID.' AND `userID` = '.$userID.'")) {
        
        if (mysqli_num_rows($query)) {
            echo "test1";
        } else {
            
            echo "test2";
            $insert_row = mysqli_query($mysqli, "INSERT INTO `contact` (`moodleID`, `moodleName`, `userID`, `contactRole`, `contactEmail`) VALUES ('$moodleID', '$fullName', '$userID', '$role', '$emailAddress')");
            
        }
        
        
    }

}

// close cURL resource, and free up system resources
curl_close($ch);

//Get CourseID


?>