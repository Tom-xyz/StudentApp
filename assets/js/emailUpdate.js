function updateEmail() {
  
       //Get the ID of the button that was clicked on
   var uEmail = document.getElementById('uEmail').value;
   var uPass = document.getElementById('uPass').value;



   $.ajax({
      url: "./assets/php/emailUpdate.php", //This is the page where you will handle your SQL insert
      type: "GET",
      data: "uEmail=" + uEmail + "&uPass=" + uPass,
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
