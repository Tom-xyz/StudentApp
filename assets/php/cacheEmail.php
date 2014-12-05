<?php
require 'config.php';
$userID = $_SESSION["id"];

    if ($query = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `userID` = '$userID'")) {
        echo $userID;
        if (mysqli_num_rows($query)) {
            
$data = $query->fetch_array();
            
$uEmail    = $data['collegeEmail'];
$uPassword = $data['emailPassword'];

$hostname  = '{outlook.office365.com:993/imap/ssl/novalidate-cert}INBOX';


$inbox = imap_open($hostname, $uEmail, $uPassword) or die('Cannot connect to outlook: ' . imap_last_error());

$headers = imap_headers($inbox) or die('Could not get emails');
$numEmails = sizeof($headers);
$numEnd    = $numEmails - 10;


for ($i = $numEmails; $i > $numEnd; $i--) {
    $mailHeader = imap_headerinfo($inbox, $i);
    $from = $mailHeader->fromaddress;
    $subject = strip_tags($mailHeader->subject);
    $date = $mailHeader->date;
    
    $struct = imap_fetchstructure($inbox, $i,1);
    $body = imap_fetchbody($inbox, $i,FT_UID);

    if ($struct == 0) 
{ 
    $body = imap_7bit($body); 
} 
elseif ($struct == 1) 
{ 
    $body = imap_8bit($body); 
} 
elseif ($struct == 2) 
{ 
    $body = imap_binary($body); 
} 
elseif ($struct == 3) 
{ 
    $body = imap_base64($body); 
} 
elseif ($struct == 4) 
{ 
    $body = quoted_printable($body); 
} 
elseif ($struct == 5) 
{ 
    $body = $body; 
} 
    

    
    
    $id = imap_uid($inbox, $i);
    
    $subject = mysqli_real_escape_string($mysqli, $subject);
    $body = mysqli_real_escape_string($mysqli, $body);

    
    if ($query = mysqli_query($mysqli, "SELECT * FROM `email` WHERE `emailID` = '.$id.'")) {
        
        if (mysqli_num_rows($query)) {
            
        } else {
            
            
            $insert_row = mysqli_query($mysqli, "INSERT INTO `email` (`emailID`, `userID`, `recipient`, `sender`, `subject`, `body`, `date`, `emailUsername`, `emailPassword`) VALUES ('$id', '$userID', '$uEmail', '$from', '$subject', '$body', '$date', '$uEmail', '$uPassword')");
            
        }
        
        
    }
    
    
    
    
}
echo "done";
imap_close($inbox);
        } else {
            echo "Error Refreshing Emails";
        }
    }









?>  
