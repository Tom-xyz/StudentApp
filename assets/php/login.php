<?php
require 'config.php';

$uPass2 = $_GET["uPass"];
$uEmail= $_GET["uEmail"];

if($result = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `emailAddress` = '$uEmail'")){

if(mysqli_num_rows($result)){
$row_rsmyQuery = mysqli_fetch_assoc($result);
$uSalt = $row_rsmyQuery["salt"];
$uPass = md5($uPass2.$uSalt);

if($userQuery = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `password` = '$uPass'")){

if(mysqli_num_rows($userQuery)){
$row_rsmyQuery2 = mysqli_fetch_assoc($userQuery);
$uName = $row_rsmyQuery2["username"];    
$userID = $row_rsmyQuery2["userID"];  
$_SESSION['username'] = $uName;
$_SESSION['id'] = $userID;
print 'true';
}else{
echo 'false';
}

}else{

print 'false';

}
}
}

?>