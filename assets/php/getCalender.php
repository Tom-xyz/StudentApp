<?php

require 'config.php';
$userID = $_SESSION["id"];





$arr = array();
if ($query = mysqli_query($mysqli, "SELECT * FROM `calendar` WHERE `userID` = '$userID'")) {
    
    if (mysqli_num_rows($query)) {
        
         while ($row = mysqli_fetch_array($query)) 
 {
        
        
        $eventName       = $row['eventName'];
        $eventSDate =  date_create($row['eventSDate']);
        $eventEDate =  date_create($row['eventEDate']);
        $moduleID    = $row['moduleID'];
        $eventSDate = $eventSDate->format(DateTime::ISO8601);
        $eventEDate = $eventEDate->format(DateTime::ISO8601);

        array_push($arr,(array('title' => $eventName, 'start' => $eventSDate, 'end' => $eventEDate)));
        
     
 }
        
        echo json_encode($arr);  
        
        
    }
}
?>