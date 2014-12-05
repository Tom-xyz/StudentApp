<?php                            

require 'config.php';
$userID = $_SESSION["id"];

if ($query = mysqli_query($mysqli, "SELECT * FROM `todo` WHERE `userID` = '$userID'")) {
    
    if (mysqli_num_rows($query)) {
        
         while ($row = mysqli_fetch_array($query)) 
        {
             
             $noteName = $row['todoName'];
             $noteDesc = $row['todoBody'];
             $noteDate = $row['todoTime'];
             $noteID = $row['todoID'];
echo'

                                <div class="note-item media fade in">
                                    <button onclick="deleteNote();" class="close" id="noteID" value="'.$noteID.'" data-dismiss="alert" data-rel="tooltip" data-placement="left" data-original-title="Delete">×</button>
                                    <div>
                                        <div>
                                            <h4 class="note-name" id="noteName" >'.$noteName.'</h4>
                                        </div>
                                        <p class="note-desc" id="noteBody" >'.$noteDesc.'</p>
                                        <p><small class="pull-right" id="noteDate" >'.$noteDate.'</small></p>
                                    </div>
                                </div>
';
         }
        
    }
    
    
}


                                
?>