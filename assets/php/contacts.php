<?php
require 'config.php';
$userID = $_SESSION["id"];

if ($query = mysqli_query($mysqli, "SELECT * FROM `contact` WHERE `userID` = '$userID'")) {
    
    if (mysqli_num_rows($query)) {
        

        while($row = mysqli_fetch_array($query))
        {
            $contactName = $row['moodleName'];
            $contactPicture = $row['profileImgUrl'];
            
            echo'

                                            <div class="col-md-4 member-entry">
                                                <div class="row member">
                                                    <div class="col-xs-3">
                                                        <img src="assets/img/avatars/avatar1_big.png" alt="avatar 1" class="pull-left img-responsive">
                                                    </div>
                                                    <div class="col-xs-9">
                                                        <h3 class="m-t-0 member-name"><strong>'.$contactName.'</strong></h3>
                                                        <div class="pull-left">
                                                            <p><i class="fa fa-envelope-o c-gray-light p-r-10"></i> cameso@it.com</p>
                                                            <p><i class="fa fa-facebook c-gray-light p-r-10"></i> facebook.com/jsnow</p>
                                                        </div>
                                                        <div class="pull-right align-right">
                                                            <p><i class="fa fa-calendar c-gray-light p-r-10"></i> 6 may 2014</p>
                                                            <p><i class="fa fa-map-marker c-gray-light p-r-10"></i> New York</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

            ';
        }
        


    }
}






?>

