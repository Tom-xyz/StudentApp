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
                    
                    
                    
                    
                    //GET Contacts
                    curl_setopt($ch, CURLOPT_URL, "http://moodle.ncirl.ie/webservice/rest/server.php?wstoken=$moodleToken&wsfunction=moodle_enrol_get_enrolled_users&courseid=$moduleID&moodlewsrestformat=json");
                    curl_setopt($ch, CURLOPT_HEADER, 0);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    
                    $contacts = curl_exec($ch);
                    $contacts = json_decode($contacts, true);
                    
                    
                    foreach ($contacts as $contact) {
                        $contactName   = $contact['fullname'];
                        $contactID     = $contact['userid'];
                        $profileImgUrl = $contact['profileimgurl'];
                        
                        
                        $result = mysqli_query($mysqli, "INSERT INTO `contact`(`moodleID`, `moodleName`, `userID`, `profileImgUrl`) VALUES ('$contactID','$contactName','$userID','$profileImgUrl') ON DUPLICATE KEY UPDATE `moodleID` = '$contactID', `moodleName` = '$contactName', `userID` = '$userID', `profileImgUrl` = '$profileImgUrl'");
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