<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'config.php';

$uName = $_GET["uName"];
$uPass1 = $_GET["uPass1"];
$uPass2 = $_GET["uPass2"];
$uEmail= $_GET["uEmail"];
$uCollegeID = $_GET["uCollegeID"];
$uType = $_GET["uType"];
$uSalt = "1415613513";

if($uPass1 != $uPass2){
print 'passwords do not match';
}else{
if($uName != null&&$uPass1 != null&&$uEmail != null&&$uCollegeID != null&&$uType != null){
if($result = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `emailAddress` = '$uEmail'")){

if(mysqli_num_rows($result)){

print 'User already exists';

}else{
$uPass = md5($uPass1.$uSalt);
$insert_row = mysqli_query($mysqli,"INSERT INTO users (`userID`, `username`, `collegeID`, `emailAddress`, `password`, `salt`, `type`) VALUES (NULL, '$uName', '$uCollegeID', '$uEmail', '$uPass', '$uSalt', '$uType')");
			      

if($insert_row){
print'Signup Completed';
}else{
die('Error : ('. $mysqli->errno .') '. $mysqli->error);
echo'failure';
}


}



}else{

echo'false';

}
}
}
?>