<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'config.php';

$userID = $_SESSION["id"];
echo $userID;
$result   = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `userID` = '$userID'");
$data     = $result->fetch_array();
$courseID = $data['courseID'];
$modules  = mysqli_query($mysqli, "SELECT * FROM `modules` WHERE `courseID` = '$courseID'");


if (mysqli_num_rows($result)) {
    
    while ($row = mysqli_fetch_array($modules, MYSQL_NUM)) {
        
        
        echo '
                                               <tr>
                                                    <td>' . $row[0] . '</td>
                                                    <td class="text-center">' . $row[1] . '</td>
                                                    <td class="text-center">' . $row[6] . '</td>
                                                    <td class="text-center">' . $row[2] . '</td>
                                                    <td class="text-center"><span class="label label-success w-300">' . $row[5] . '</span></td>
                                                    <td class="text-center">Semester ' . $row[4] . '</td>                                                    
                                                    <td class="text-center"> 
                                                    <a href="course_module_edit.html">
                                                     <button type="button" class="btn btn-sm btn-icon btn-rounded btn-dark"><i class="fa fa-pencil"></i></button>
                                                     </a>
                                   					 <button type="button" class="btn btn-sm btn-icon btn-rounded btn-primary"><i class="fa fa-search"></i></button>
                                                    </td>
                                                </tr>
                                                ';
        
    }
    
}

?>