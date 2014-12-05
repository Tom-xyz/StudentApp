<?php
require 'config.php';  
error_reporting(E_ALL);
ini_set('display_errors', 1);

$uPass = $_GET["uPass"];
$uEmail = $_GET["uEmail"];
$userID = $_SESSION["id"];



if($uPass != null && $uEmail != null){
 

    $sql = "UPDATE `users` SET `collegeEmail`= '$uEmail', `emailPassword`='$uPass' WHERE `userID`='$userID'";
    
}
    
if ($mysqli->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
    
?>