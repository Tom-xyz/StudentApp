<?php
require 'config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

$userID = $_SESSION["id"];



$user = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `userID` = '$userID' AND emailPassword =''");






        
        
    if(mysqli_num_rows($user)){
    
    echo'
    <div class="row"> 
    <div class="alert alert-danger text-center" role="alert">

<h4>
No email account found! Update your email settings



</h4>


<form role="form">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="uEmail" placeholder="Enter email" required="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="uPass" placeholder="Password" required="">
  </div>


  <button onclick="updateEmail();" type="button" id="buttonEmail" class="btn btn-success">Save changes</button>
</form>
  




    </div>
    </div>
     <div class="row">    
    ';
    
    
        
    
} else{






$result = mysqli_query($mysqli, "SELECT * FROM `email` WHERE `userID` = '$userID' ORDER BY `emailID` DESC");

if($result){
    
if(mysqli_num_rows($result)){

while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {


    echo'
            <a href="mail.html#'.$row[0].'">
                                 <div class="message-item media">
                                    <div class="pull-left text-center">
                                        <div class="pos-rel message-checkbox">
                                            <input type="checkbox" data-style="flat-red">
                                        </div>
                                        <div>
                                        </div>
                                    </div>
                                    <div class="message-item-right">
                                        <div class="media">
                                            <img src="assets/img/avatars/avatar7_big.png" alt="avatar 7" width="50" class="pull-left">
                                            <div class="media-body">
                                                <small class="pull-right">'.$row[6].'</small>
                                                <h5 class="c-dark"><strong>'.$row[3].'</strong></h5>
                                                <h4 class="c-dark">'.$row[4].'</h4>
                                            </div>
                                        </div>

                                    </div>
                                </div>  
                                 </a>
            ';
    
}

}
    
}


}

?>