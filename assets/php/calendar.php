<?php

require 'config.php';
$userID = $_SESSION["id"];

if ($query = mysqli_query($mysqli, "SELECT * FROM `moodle` WHERE `userID` = '$userID'")) {
    
    if (mysqli_num_rows($query)) {
        
        $data = $query->fetch_array();
        
        $moodleID       = $data['moodleID'];
        $moodleUsername = $data['moodleUsername'];
        $moodlePassword = $data['moodlePassword'];
        $moodleToken    = $data['moodleToken'];
        
    }
    
    if ($query = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `userID` = '$userID'")) {
        
        if (mysqli_num_rows($query)) {
            
            $data = $query->fetch_array();
            
            $courseID = $data['courseID'];
            
            
        }
        if ($query = mysqli_query($mysqli, "SELECT * FROM `modules` WHERE `courseID` = '$courseID'")) {
            
            if (mysqli_num_rows($query)) {
                
                $ch = curl_init();
                
                while ($row = mysqli_fetch_array($query)) {
                    $moduleID = $row['moduleID'];
                    // create a new cURL resource
                    
                    
                    
                    
                    //GET CALANDER EVENTS
                    curl_setopt($ch, CURLOPT_URL, "http://moodle.ncirl.ie/webservice/rest/server.php?wstoken=$moodleToken&wsfunction=core_calendar_get_calendar_events&events[courseids][0]=$moduleID&moodlewsrestformat=json");
                    curl_setopt($ch, CURLOPT_HEADER, 0);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $calander = curl_exec($ch);
                    
                    
                    $calander = json_decode($calander, true);
                    
                    
                    foreach ($calander['events'] as $event) {
                        $eventName = $event['name'];
                        $eventID   = $event['id'];
                        $timestart = $event['timestart'];
                        $dateStart = new DateTime("@$timestart");
                        $dateStart = $dateStart->format('Y-m-d H:i:s');
                        $dateEnd   = $dateStart;

                        
                        $result = mysqli_query($mysqli, "INSERT INTO `calendar`(`eventID`, `eventName`, `eventSDate`, `eventEDate`, `userID`, `moduleID`) VALUES ('$eventID','$eventName','$dateStart','$dateEnd','$userID','$moduleID') ON DUPLICATE KEY UPDATE `eventID` = '$eventID', `eventName` = '$eventName', `eventSDate` = '$dateStart', `eventEDate` = '$dateEnd', `userID` = '$userID', `moduleID` = '$moduleID'");
                        if ($result) {
                            echo "Update Success";
                        } else {
                            echo "Update Failed";
                        }
                        
                    }
                    
                    
                    
                    
                    
                    
                    
                }
                // close cURL resource, and free up system resources
                curl_close($ch);
                
                
                
                
                
            }
            
            
        }
        
    }
}


?>