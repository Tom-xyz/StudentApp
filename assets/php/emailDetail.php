<?php
require 'config.php';
$uid = $_GET["uid"];
$userID = $_SESSION["id"];
$result = mysqli_query($mysqli, "SELECT * FROM `email` WHERE `emailID` = '$uid'");

if($result){
    
while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
            print'
                        <div class="panel-body messages message-result">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="p-20">
                                        <div class="message-item media">
                                            <div class="message-item-right">
                                                <div class="media">
                                                    <img src="assets/img/avatars/avatar4_big.png" alt="avatar 4" width="50" class="pull-left">
                                                    <div class="media-body">
                                                        <small class="pull-right">'.$row[6].'</small>

                                                        <p class="c-gray">'.$row[3].'</p>
                                                        <p class="c-gray">'.$row[4].'</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="message-body">
                                        
                                        '.$row[5].'

                                    </div>
                                </div>
                            </div>

                        </div>     
                       
            '; 
}
}


?>