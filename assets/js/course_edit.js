$('#tabcordion').load("assets/php/course_edit.php", function () {           
});

function updateCourse() {
  
       //Get the ID of the button that was clicked on
   var courseID = document.getElementById('courseID').value;
   var courseCode = document.getElementById('courseCode').value;
   var courseName = document.getElementById('courseName').value;
   var courseCat = document.getElementById('courseCat').value;
   var courseDeg = document.getElementById('courseDeg').value;
   var courseDur = document.getElementById('courseDur').value;
   var courseTime = document.getElementById('courseTime').value;
   var courseSDate = document.getElementById('courseSDate').value;
   var courseEDate = document.getElementById('courseEDate').value;
   var courseURL = document.getElementById('courseURL').value;
   var colName = document.getElementById('colName').value;
   var colAddress = document.getElementById('colAddress').value;
   var colCity = document.getElementById('colCity').value;
   var colCountry = document.getElementById('colCountry').value;
   var colPhone = document.getElementById('colPhone').value;
   var colUrl = document.getElementById('colUrl').value;
   var colEmail = document.getElementById('colEmail').value;




   $.ajax({
      url: "./assets/php/courseUpdate.php", //This is the page where you will handle your SQL insert
      type: "GET",
      data: "courseID=" + courseID + "&courseCode=" + courseCode + "&courseName=" + courseName + "&courseCat=" + courseCat + "&courseDeg=" + courseDeg + "&courseDur=" + courseDur + "&courseTime=" + courseTime + "&courseSDate=" + courseSDate + "&courseEDate=" + courseEDate + "&courseURL=" + courseURL + "&colName=" + colName + "&colAddress=" + colAddress + "&colCity=" + colCity + "&colCountry=" + colCountry + "&colPhone=" + colPhone + "&colUrl=" + colUrl + "&colEmail=" + colEmail,
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