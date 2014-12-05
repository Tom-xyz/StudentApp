<?

require 'config.php';
$sessionUsername =  $_SESSION["username"];
if($sessionUsername != null){
   echo $sessionUsername;
}


?>