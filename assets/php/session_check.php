<?php
session_start();





$session = $_SESSION['username'];

if($session == null){
     print "Expired";
}
else{
     print "Active";
}



?>