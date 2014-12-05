<?php

require 'config.php';
$userID   = $_SESSION["id"];
$function = $_GET['type'];
$noteID   = $_GET['id'];
$noteName = $_GET['name'];
$noteBody = $_GET['body'];
$noteTime = $_GET['date'];



if ($query = mysqli_query($mysqli, "SELECT * FROM `todo` WHERE `todoID` = '$todoID'")) {
    
    if (mysqli_num_rows($query)) {
        if ($function == "update") {
            $query = mysqli_query($mysqli, "UPDATE `todo` SET `todoID`='$noteID',`todoName`='$noteName',`todoBody`='$noteBody',`todoTime`='$noteTime' WHERE `userID`='$userID'");
        }
        else if ($function == "delete") {
            $query = mysqli_query($mysqli, "DELETE FROM `todo` WHERE `todoID`='$noteID'");
            
        }
    } else {
        if ($function == "update") {
            $query = mysqli_query($mysqli, "INSERT INTO `todo`(`todoID`, `todoName`, `todoBody`, `todoTime`, `userID`) VALUES ('$noteID','$noteName','$noteBody','$noteTime','$userID')");
        }
    }
    
    
    
}


?>