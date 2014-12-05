<?php

require 'config.php';
$userID = $_SESSION["id"];

if ($query = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `userID` = '$userID'")) {
    if (mysqli_num_rows($query)) {
        
        $data         = $query->fetch_array();
        $fname        = $data['fname'];
        $lname        = $data['lname'];
        $username     = $data['username'];
        $email        = $data['emailAddress'];
        $collegeID    = $data['collegeID'];
        $collegeEmail = $data['collegeEmail'];
        $phone        = $data['phoneNum'];
        $street       = $data['street'];
        $city         = $data['city'];
        $zipCode      = $data['zipCode'];
        $courseID     = $data['courseID'];
        $dob          =  $data['dob'];
        $mobile = $data['mobileNum'];
        $emailPassword = $data['emailPassword'];
        $query = mysqli_query($mysqli, "SELECT * FROM `moodle` WHERE `userID` = '$userID'");
        $data         = $query->fetch_array();
        $moodleUsername = $data['moodleUsername'];
        $moodlePassword = $data['moodlePassword'];
        $moodleUrl = $data['moodleUrl'];

        
        echo '
            <div class="row">

                <!-- BEGIN PROFIL SIDEBAR -->
                <div class="col-md-4 profil-sidebar">
                    
                    <div class="p-20">


                        <div class="profil-sidebar-element">
                            <h4>PERSONAL STATS</h4>
                            <p class="c-gray m-t-0"><i>Last connection: 2 days ago</i>
                            </p>
                            <div class="clearfix"></div>
                           
                            <h5>MY MODULES</h5>
                            ';
        if ($query = mysqli_query($mysqli, "SELECT * FROM `modules` WHERE `courseID` = '$courseID'")) {
            if (mysqli_num_rows($query)) {
                while ($row = mysqli_fetch_array($query)) {
                    $moduleName = $row['moduleName'];
                    echo '
                            <p class="m-t-0">' . $moduleName . '</p>
                            ';
                    
                }
                
                
            }
            
        }
        
        echo '
                        </div>

                            <div class="clearfix"></div>                         
                         <button type="button" class="btn btn-block btn-success pull-right" data-toggle="modal" data-target="#modal-large"><i class="fa fa-cogs"></i> Edit Profile &amp; Settings</button>
                        
                            <div class="clearfix"></div> 
                        <div class="profil-sidebar-element">
                            <h4>SOCIAL SHARING</h4>
                            <div class="social-btn-small"><a href="#" class="zocial icon facebook m-0">Sign in with Facebook</a>
                            </div>
                            <div class="social-btn-small"><a href="#" class="zocial icon twitter m-0">Sign in with Twitter</a>
                            </div>
                            <div class="social-btn-small"><a href="#" class="zocial icon googleplus m-0">Sign in with Google+</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PROFIL SIDEBAR -->

                <!-- BEGIN PROFILE CONTENT -->
                <div class="col-md-8 profil-content m-t-20">
                    <h2>HI! IM <span class="c-blue">' . $username . '</span></h2>
                    

                   <br />
                    <div class="row profil-groups">
                     
                            <div class="col-md-12">
                                      <form class="form-horizontal">
                                        
                                                 <h3 class="m-t-0 m-b-20">Personal Information</h3>
                                                <div class="form-group">
                                                    <div class="col-sm-5">Full Name
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <strong>' . $fname . ' ' . $lname . '</strong>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-5">Email Address
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <strong>' . $email . '</strong>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-5">Address
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <strong>' .$street .', '. $city . '</strong>
                                                    </div>
                                                </div>                
                                                <div class="form-group">
                                                    <div class="col-sm-5">Phone Number
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <strong>' . $phone . '</strong>
                                                    </div>
                                                </div>   
                                                <div class="form-group">
                                                    <div class="col-sm-5">DOB
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <strong>' . $dob . '</strong>
                                                    </div>
                                                </div>   

                                            
                                        </form>
                                    </div>
                        
                    </div>

            <div class="modal fade" id="modal-large" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-body">
                            <div class="tabbable tabbable-custom form">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#general_settings" data-toggle="tab">Personal</a></li>
                                    <li><a href="#college_settings" data-toggle="tab">College Settings</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="space20"></div>
                                    <div class="tab-pane active" id="general_settings">
                                        <div class="row profile">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <ul class="list-unstyled profile-nav col-md-3">
                                                            <li>
                                                                <img src="assets/img/avatars/avatar4_big.png" alt="avatar 4"/>
                                                            </li>
                                                        </ul>
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-12 profile-info">
                                                                    <h1>'.$fname.' '.$lname.'</h1>
                                                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt laoreet dolore magna aliquam tincidunt erat volutpat laoreet dolore magna aliquam tincidunt erat volutpat.</p>
                                                                   
                                                                   
                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
       
                                                <div class="row profile-classic">
                                                    <div class="col-md-12 m-t-20">
                                                        <div class="panel">
                                                            <div class="panel-title line">
                                                                <div class="caption"><i class="fa fa-phone c-gray m-r-10"></i> CONTACT</div>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="control-label c-gray col-md-3">Email:</div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" id="userEmail" value="'.$email.'">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="control-label c-gray col-md-3">Phone:</div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" id="userPhone" value="'.$phone.'">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="control-label c-gray col-md-3">Mobile:</div> 
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" id="userMobile" value="'.$mobile.'">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row profile-classic">
                                                    <div class="col-md-12">
                                                        <div class="panel">
                                                            <div class="panel-title line">
                                                                <div class="caption"><i class="fa fa-info c-gray m-r-10"></i> ABOUT</div>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="control-label col-md-3">First Name:</div> 
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" id="userFName" value="'.$fname.'"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="control-label col-md-3">Surname:</div> 
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" id="userLName" value="'.$lname.'"></div>
                                                                </div>       
                                                                <div class="row">
                                                                    <div class="control-label col-md-3">Date of Birth:</div> 
                                                                    <div class="col-md-5">
                                                                        <input id="userDob" value="'.$dob.'" type="text" class="pickadate">
                                                                        
                                                                </div>                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row profile-classic">
                                                    <div class="col-md-12">
                                                        <div class="panel">
                                                            <div class="panel-title line">
                                                                <div class="caption"><i class="fa fa-home c-gray m-r-10"></i> ADDRESS</div>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="control-label col-md-3">Street:</div> 
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" id="userStreet" value="'.$street.'">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="control-label col-md-3">City:</div> 
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" id="userCity" value="'.$city.'">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="control-label col-md-3">Zip Code:</div> 
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" id="userZipCode" value="'.$zipCode.'">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="tab-pane " id="college_settings">
                                        <div class="row profile">
                                            <div class="col-md-12">

                                                <div class="row profile-classic">
                                                    <div class="col-md-12 m-t-20">
                                                        <div class="panel">
                                                            <div class="panel-title line">
                                                                <div class="caption"><i class="fa fa-phone c-gray m-r-10"></i> Moodle Settings:</div>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="control-label c-gray col-md-3">College Moodle URL:</div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" id="moodleUrl" value="'.$moodleUrl.'">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="control-label c-gray col-md-3">Moodle Username:</div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" id="moodleUsername" value="'.$moodleUsername.'">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="control-label c-gray col-md-3">Moodle Password:</div> 
                                                                    <div class="col-md-8">
                                                                        <input type="password" class="form-control" id="moodlePassword" value="'.$moodlePassword.'">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row profile-classic">
                                                    <div class="col-md-12">
                                                        <div class="panel">
                                                            <div class="panel-title line">
                                                                <div class="caption"><i class="fa fa-phone c-gray m-r-10"></i>Email Settings:</div>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="control-label c-gray col-md-3">Email Server</div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" disabled id="field-1" value="outlook.office365.com">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="control-label c-gray col-md-3">Email Server Port</div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" disabled id="field-1" value="993">
                                                                    </div>
                                                                </div>                                                                
                                                                <div class="row">
                                                                    <div class="control-label c-gray col-md-3">Email Username:</div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" id="collegeEmail" value="'.$collegeEmail.'">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="control-label c-gray col-md-3">Email Password:</div> 
                                                                    <div class="col-md-8">
                                                                        <input type="password" class="form-control" id="emailPassword" value="'.$emailPassword.'">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button onclick="updateProfile();" type="button" class="btn btn-success">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>                    
    <div class="md-overlay"></div> <!-- Overlay Element. Important: place just after last modal -->
                </div>
                <!-- END PROFIL CONTENT -->
            </div>
        </div>
        <!-- END MAIN CONTENT -->

';
        
        
    }
    
}

?>