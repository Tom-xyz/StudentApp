<?php

//php setup
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

echo
'
                                <div class="row">
                                    <div class="col-md-12">
                                      <form class="form-horizontal">
                                            <div class="col-md-6">
                                                <h3 class="m-t-0 m-b-20">Course info  <small>(<a href="course_edit.html" class="text-muted">Edit Course</a>)</small></h3>
                                                <div class="form-group">
                                                    <div class="col-sm-4">Course Code:
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <strong>'.$courseCode.'</strong>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-4">Course Name:
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <strong>'.$courseName.'</strong>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-4">Course Category
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <strong>'.$courseCat.'</strong>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-4">Degree:
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <strong>'.$courseDeg.'</strong>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-4">Duration:
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <strong>'.$courseDur.' Years</strong>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-4">Full/Part-Time:
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <strong>'.$courseTime.'</strong>
                                                    </div>
                                                </div>       <div class="form-group">
                                                    <div class="col-sm-4">Start Date:
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <strong>'.$courseSDate.'</strong>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-4">End Date:
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <strong>'.$courseEDate.'4</strong>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-4">Course URL:
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <strong><a href="'.$courseURL.'">'.$courseURL.'</a></strong>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <h3 class="m-t-0 m-b-20">College info</h3>
                                                <div class="form-group">
                                                    <div class="col-sm-4">College Name:
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <strong>'.$colName.'</strong>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-4">Address:
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <strong>'.$colAddress.'</strong>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-4">City:
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <strong>'.$colCity.'</strong>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-4">Country:
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <strong>'.$colCountry.'</strong>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-4">Website:
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <strong><a href="#">'.$colUrl.'</a></strong>
                                                    </div>
                                                </div> 
                                                <h3 class="m-t-0 m-b-20">Contact Info</h3>

                                                <div class="form-group">
                                                    <div class="col-sm-4">Email:
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <strong>'.$colEmail.'</strong>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-4">Phone Number:
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <strong>'.$colPhone.'</strong>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div>
                  


'

?>