<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

// create a new cURL resource
$ch = curl_init();

//GET MOODLE TOKEN
curl_setopt($ch, CURLOPT_URL, "http://moodle.ncirl.ie/login/token.php?username=x12410922&password=6SH1Yp4T4&service=moodle_mobile_app");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// grab URL and pass it to the browser

$token = curl_exec($ch);
$token = json_decode($token);

$currentToken = $token->token; 

echo "Moodle Token:";
echo "<br/>";
echo $currentToken;
echo "<br/>";
echo "<br/>";

//GET MOODLE COURSES FOR TOKEN
curl_setopt($ch, CURLOPT_URL, "http://moodle.ncirl.ie/webservice/rest/server.php?wstoken=".$currentToken."&wsfunction=moodle_enrol_get_users_courses&userid=35200&moodlewsrestformat=json");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// grab URL and pass it to the browser

$courses =curl_exec($ch);
echo "Course Info:";
echo "<br/>";
echo $courses;
echo "<br/>";
echo "<br/>";

//GET USER INFO
curl_setopt($ch, CURLOPT_URL, "http://moodle.ncirl.ie/webservice/rest/server.php?wstoken=".$currentToken."&wsfunction=moodle_webservice_get_siteinfo&moodlewsrestformat=json");
$info =curl_exec($ch);
echo $info;
$info = json_decode($info);
$userID = $info->userid;

echo "User Info & Available Functions: ";
echo "<br/>";
echo $userID;

echo "<br/>";
echo "<br/>";

//GET CALANDER EVENTS
curl_setopt($ch, CURLOPT_URL, "http://moodle.ncirl.ie/webservice/rest/server.php?wstoken=".$currentToken."&wsfunction=core_calendar_get_calendar_events&events[courseids][0]=2538");
$calander =curl_exec($ch);
echo "Calander Events: ";
echo "<br/>";
echo $calander;


// close cURL resource, and free up system resources
curl_close($ch);


    


?>