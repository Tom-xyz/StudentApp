   $.ajax({
      url: "./assets/php/cacheEmail.php", //This is the page where you will handle your SQL insert
      type: "GET",
       //The data your sending to some-page.php
      success: function(){   
          console.log("AJAX request was successfull");
      },
      error:function(){
          console.log("AJAX request was a failure");
          alert("failure");
      }   
    });