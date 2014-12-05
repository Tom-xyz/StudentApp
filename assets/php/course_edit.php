<?php

require 'config.php';
$userID = $_SESSION["id"];
//display warnings
error_reporting(E_ALL);
ini_set('display_errors', 1);

//retrieve course id for current user
$query = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `userID` = '$userID'");
$data = $query->fetch_array();
$courseID = $data['courseID'];

$query = mysqli_query($mysqli, "SELECT * FROM `course` WHERE `courseID` = '$courseID '");
$data = $query->fetch_array();
$courseCode = $data['courseCode'];
$courseName = $data['courseName'];
$courseCat = $data['courseCat'];
$courseDeg = $data['courseDeg'];
$courseDur = $data['courseDur'];
$courseTime = $data['courseTime'];
$courseSDate = $data['courseSDate'];
$courseEDate = $data['courseEDate'];
$courseURL = $data['courseURL'];
$collegeID = $data['collegeID'];

$query = mysqli_query($mysqli, "SELECT * FROM `college` WHERE `collegeID` = '$collegeID'");
$data = $query->fetch_array();

$colName = $data['colName'];
$colAddress = $data['colAddress'];
$colCity= $data['colCity'];
$colCountry = $data['colCountry'];
$colPhone = $data['colPhone'];
$colUrl = $data['colUrl'];
$colEmail = $data['colEmail'];

echo'
                        <ul id="myTab" class="nav nav-tabs">
                            <li class="active"><a href="#module_info" data-toggle="tab">Course Information</a></li>
                            <li><a href="#college_info" data-toggle="tab">College Information</a></li>                                                        
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade active in" id="module_info">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form id="form1" class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >ID:
                                            </label>
                                            <div class="col-sm-7">
                                                <input type="text" id="courseID" class="form-control" value="'.$courseID.'" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Course Code: <span class="asterisk">*</span>
                                            </label>
                                            <div class="col-sm-7">
                                                <input type="text" id="courseCode" class="form-control" placeholder="Enter Module ID here" value="'.$courseCode.'">
                                            </div>
                                        </div>                                        
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Course Name: <span class="asterisk">*</span>
                                            </label>
                                            <div class="col-sm-7">
                                                <input type="text" id="courseName" class="form-control" placeholder="Enter Module Name here" value="'.$courseName.'">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-sm-2 control-label">Course Category:<span class="asterisk">*</span></label>
                                            <div class="col-sm-7">
                                                <select id="courseCat" class="form-control" multiple title="Choose one or more">
                                                <optgroup label="Select Course">
                                                    <option selected>'.$courseCat.'</option>
                                                </optgroup>
                                            </select>
                                            </div>
                                        </div>    
										<div class="form-group">
                                            <label class="col-sm-2 control-label">Course Degree:<span class="asterisk">*</span></label>
                                            <div class="col-sm-7">
												<input id="courseDeg" type="text" class="form-control" placeholder="Enter Module Name here" value="'.$courseDeg.'">
                                            </div>
                                        </div>                                                                                                                    
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Duration: <span class="asterisk">*</span>
                                            </label>
                                            <div class="col-sm-7">
                                                <input type="text" id="courseDur" class="form-control" Placeholder="4 Years" value="'.$courseDur.' years">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-sm-2 control-label">Full/Part-Time:<span class="asterisk">*</span></label>
                                            <div class="col-sm-7">
                                                <select id="courseTime" class="form-control" multiple title="Choose one or more">
                                                <optgroup label="Select Course">
                                                    <option selected>'.$courseTime.'</option>
                                                    <option>Part Time</option> 
                                                    <option>Full Time</option>  
                                                </optgroup>
                                            </select>
                                            </div>
                                        </div> 
                                      <div class="form-group">
                                            <label class="col-sm-2 control-label">Start Date: <span class="asterisk">*</span>
                                            </label>
                                            <div class="col-sm-7">
												<input id="courseSDate" class="pickadate form-control" type="text" placeholder="Click me to see modal calendar" value="'.$courseSDate.'" />
                                            </div>
                                        </div>
                                      <div class="form-group">
                                            <label class="col-sm-2 control-label">End Date: <span class="asterisk">*</span>
                                            </label>
                                            <div class="col-sm-7">
												<input id="courseEDate" class="pickadate form-control" type="text" placeholder="Click me to see modal calendar" value="'.$courseEDate.'" />
                                            </div>
                                        </div>                                       
										<div class="form-group">
                                            <label class="col-sm-2 control-label">Course URL: <span class="asterisk">*</span>
                                            </label>
                                            <div class="col-sm-7">
                                                <input id="courseURL" type="text" class="form-control" Placeholder="www.yourcourse.com" value="'.$courseURL.'">
                                            </div>
                                        </div>  
                                        <hr />  
                                                                                                                                                          
                                    </form>
                                    </div>
                                </div>
                            </div>
						<div class="tab-pane fade" id="college_info">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form id="form1" class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">College Name: <span class="asterisk">*</span>
                                            </label>
                                            <div class="col-sm-7">
                                                <input type="text" id="colName" class="form-control" placeholder="E.g. National College of Ireland" value="'.$colName.'">
                                            </div>
                                        </div>                                        
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Address: <span class="asterisk">*</span>
                                            </label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" id="colAddress" placeholder="Enter Address here" value="'.$colAddress.'">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">City: <span class="asterisk">*</span>
                                            </label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" id="colCity" placeholder="Enter City here" value="'.$colCity.'">
                                            </div>
                                        </div>    
										<div class="form-group">
                                            <label class="col-sm-2 control-label">Country:<span class="asterisk">*</span></label>
                                            <div class="col-sm-7">
												<input type="text" class="form-control" id="colCountry" placeholder="Enter country here" value="'.$colCountry.'">
                                            </div>
                                        </div>    
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Phone Number: <span class="asterisk">*</span>
                                            </label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" id="colPhone" placeholder="Enter City here" value="'.$colPhone.'">
                                            </div>
                                        </div>                                                                                                                                                           
										<div class="form-group">
                                            <label class="col-sm-2 control-label">Website URL:<span class="asterisk">*</span></label>
                                            <div class="col-sm-7">
												<input type="text" class="form-control" id="colUrl" placeholder="Enter College Website URL" value="'.$colUrl.'">
                                            </div>
                                        </div>  

                                      <div class="form-group">
                                            <label class="col-sm-2 control-label">Contact Email: <span class="asterisk">*</span>
                                            </label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" id="colEmail" Placeholder="contact@contact.com" value="'.$colEmail.'" >
                                            </div>
                                        </div>  

                                    </form>
                                    </div>
                                </div>
                            </div>							
                        </div>
';


?>