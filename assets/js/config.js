$.get('assets/php/session_check.php', function(data) {
     if( data == "Expired" ) {

         window.location = "./login.html";
     } else if (data == "Active" ) {

     }
 });

                