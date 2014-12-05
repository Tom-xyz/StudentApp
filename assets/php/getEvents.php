<?php
require 'config.php';


//Display Errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

//GET Variables
$myToken = "1525868201015480|057fe6bf62a992e620a51658b503d7e3";
$uid = "281747298678547";
$userID = $_SESSION["id"];

// create a new cURL resource
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/$uid/events?access_token=$myToken");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// grab URL and pass it to the browser

$events = curl_exec($ch);
$decoded = json_decode($events);

 

curl_close($ch);

foreach($decoded->data as $mydata)

    {
   

        $id = $mydata->id;
        $start_time = $mydata->start_time;
        $end_time = null;
        if(array_key_exists('end_time', $mydata)) {
        $end_time = $mydata->end_time;
        }
        $location = null;
        if(array_key_exists('location', $mydata)) {
        $location = $mydata->location;
        }

        $name = $mydata->name;



$query = mysqli_query($mysqli, "SELECT * FROM `events` WHERE `id` = '$id'");

if($query){
    
if(mysqli_num_rows($query)){

    
}
}
    else{
   
    $insert_row = mysqli_query($mysqli,"INSERT INTO events (`eventID`, `eventName`, `eventLoc`, `eventSDate`, `eventEDate`, `eventImg`, `eventUrl`, `userID`) VALUES ('$id', '$name', '$location', '$start_time', '$end_time', 'default.png', '#','$userID')");
 
    if($insert_row){
    

    
}else{ 
die('Error : ('. $mysqli->errno .') '. $mysqli->error);

}
}
    

}





?>