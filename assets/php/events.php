<?php

require 'config.php';
$userID = $_SESSION["id"];

$query = mysqli_query($mysqli, "SELECT * FROM `events` WHERE `userID` = '$userID'");

if($query){
    
if(mysqli_num_rows($query)){
    
    while ($row = mysqli_fetch_array($query, MYSQL_NUM)) {
    
 echo'
                            <tr>
                                <td>
                                <img src="http://placehold.it/300x130" alt="mars" class="img-responsive"> </td>
                                <td>'.$row[1].'</td>
                                <td>'.$row[2].'</td>
                                <td class="text-center">
                                '.$row[3].'  	
                                </td>
                                <td class="text-center">
                                    <span class="label label-success w-300">Available</span>
                                </td>
                                <td class="text-center"> 
                                <a href="https://www.facebook.com/events/'.$row[0].'" target="_blank"
                                <button type="button" class="btn btn-success">View Event</button>
                                </a>
                                </td>
                            </tr>
'; 
    }
}


}

?>