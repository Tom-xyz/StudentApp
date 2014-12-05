<?php
     
require 'config.php';

$userID = $_SESSION["id"]; 
$mode = $_GET['function'];

if($mode == "contact"){
        if ($query = mysqli_query($mysqli, "SELECT * FROM `contact` WHERE `userID` = '$userID'")) {

        if (mysqli_num_rows($query)) {
            

            
            while($row = $query->fetch_array()){
                $name = $row['moodleName'];
                $picture = $row['profileImgUrl'];
 echo'

                                        <a href="view_contacts.html" class="message-item media">
                                            <div class="media">
                                                <img src="assets/img/avatars/avatar5.png" alt="avatar 5" width="35" class="pull-left">
                                                <div class="media-body">
                                                    <div class="pull-left">
                                                        <p class="c-dark m-0"><strong>'.$name.'</strong>
                                                        </p>

                                                    </div>
                                                    <div class="pull-right f-18 p-t-10">
                                                        <i data-rel="tooltip" title="add to favs" data-placement="left" class="favs fa fa-star-o p-r-10"></i>
                                                        <i data-rel="tooltip" title="send email" data-placement="left" class="fa fa-envelope-o p-r-10"></i>
                                                        <i data-rel="tooltip" title="show address" data-placement="left" class="fa fa-home"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

';  
            }
        }
            
        }
}else if($mode == "email"){
    
          if ($query = mysqli_query($mysqli, "SELECT * FROM `email` WHERE `userID` = '$userID'")) {

        if (mysqli_num_rows($query)) {
            

            
            while($row = $query->fetch_array()){
                $name = $row['sender'];
                $subject = $row['subject'];
                $emailID = $row['emailID'];
                
                echo'
                                              <a href="mail.html#'.$emailID.'" class="message-item media">
                            <div class="media"> <img src="assets/img/avatars/avatar13_big.png" alt="avatar 13" width="50" class="pull-left">
                              <div class="media-body"> 
                                <h5 class="c-dark"><strong>'.$name.'</strong></h5>
                                <h4 class="c-dark">'.$subject.'</h4>
                              </div>
                            </div>


                            </a> 
                            </a> 
                
                ';
                
            }
            
        }
              
          }
    
    
    
}else if($mode=="todo"){
             if ($query = mysqli_query($mysqli, "SELECT * FROM `todo` WHERE `userID` = '$userID'")) {

        if (mysqli_num_rows($query)) {
            

            
            while($row = $query->fetch_array()){
                $todoName = $row['todoName'];

                
                echo'
                                                                                 <li class="sortable col-md-12 m-b-10 bd-3 bg-opacity-20 fade in">
                                                <a href="#" class="pull-right c-white p-l-10" data-dismiss="alert"><i class="fa fa-times f-18"></i></a>
                                                <a href="#" class="pull-right c-white" data-dismiss="alert"><i class="fa fa-pencil f-18"></i></a>
                                                <div class="sortable-item">
                                                    <div class="pos-rel">
                                                        <input tabindex="13" type="checkbox" class="pull-left task-item">
                                                    </div>
                                                    <div class="p-l-40 pull-left">
                                                        '.$todoName.'
                                                    </div>
                                                </div>
                                            </li>
                
                ';
                
            }
            
        }
               
    
}
}
     
     
?>