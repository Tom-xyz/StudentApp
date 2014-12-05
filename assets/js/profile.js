$('#main-content').load("assets/php/profile.php", function () {           
});

function updateProfile() {
  
       //Get the ID of the button that was clicked on
   var emailAddress = document.getElementById('userEmail').value;
   var fname = document.getElementById('userFName').value;
   var lname = document.getElementById('userLName').value;
   var mobileNum = document.getElementById('userMobile').value;
   var phoneNum = document.getElementById('userPhone').value;
   var street = document.getElementById('userStreet').value;
   var city = document.getElementById('userCity').value;
   var zipCode = document.getElementById('userZipCode').value;
   var dob = document.getElementById('userDob').value;
    
   var moodleUrl = document.getElementById('moodleUrl').value;
   var moodleUsername = document.getElementById('moodleUsername').value;
   var moodlePassword = document.getElementById('moodlePassword').value;
    
   var colEmailPass = document.getElementById('emailPassword').value;
   var colEmail = document.getElementById('collegeEmail').value;




   $.ajax({
      url: "./assets/php/updateProfile.php", //This is the page where you will handle your SQL insert
      type: "GET",
      data: "emailAddress=" + emailAddress + "&fname=" + fname + "&lname=" + lname + "&phoneNum=" + phoneNum + "&mobileNum=" + mobileNum + "&street=" + street + "&city=" + city + "&zipCode=" + zipCode + "&dob=" + dob + "&moodleUrl=" + moodleUrl + "&moodleUsername=" + moodleUsername + "&moodlePassword=" + moodlePassword + "&colEmailPass=" + colEmailPass + "&colEmail=" + colEmail,
       //The data your sending to some-page.php
      success: function(){
          window.location.replace('');     
          console.log("AJAX request was successfull");
      },
      error:function(){
          console.log("AJAX request was a failure");
          alert("failure");
      }   
    });
    
} 