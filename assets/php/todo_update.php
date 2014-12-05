<?php

require 'config.php';

$userID     = $_SESSION["id"];
$mode       = $_GET['mode'];
$noteID     = $_GET['noteID'];
$noteBody   = $_GET['noteBody'];
$noteHeader = $_GET['noteHeader'];


if ($mode == "delete") {
    if ($query = mysqli_query($mysqli, "SELECT * FROM `todo` WHERE `todoID` = '$noteID'")) {
        
        if (mysqli_num_rows($query)) {
            
            $query = mysqli_query($mysqli, "DELETE FROM `todo` WHERE `todoID` = '$noteID'");
            
        } else {
            
            
        }
    }
} else if ($mode == "create") {
    $today = date("Y/m/d");
    $query = mysqli_query($mysqli, "INSERT INTO `todo`(`todoName`, `todoBody`, `todoTime`, `userID`) VALUES ('$noteHeader','$noteBody','$today','$userID')");
    echo 'done';
} else if ($mode == "update") {
    $today = date("Y/m/d");
    $query = mysqli_query($mysqli, "UPDATE `todo` SET todoName`='$noteHeader',`todoBody`='$noteBody',`todoTime`='$today' WHERE `todoID`='$noteID'");
    echo 'done';
}




?>