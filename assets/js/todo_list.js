$('#notes-list').load("assets/php/todo_list.php", function () {    

});

function deleteNote() {
    var noteName = document.getElementById('noteName').value;
    var noteBody = document.getElementById('noteBody').value;
    var noteID = document.getElementById('noteID').value;
    var mode = 'delete';


   $.ajax({
      url: "assets/php/todo_update.php", //This is the page where you will handle your SQL insert
      type: "GET",
      data: "mode=" + mode + "&noteID=" + noteID + "&noteHeader=" +noteName+ "&noteBody=" +noteBody,
      success: function(){
          console.log("AJAX request was successfull");
      },
      error:function(){
          console.log("AJAX request was a failure");
      }   
    });
    
}

function createNote() {
    var noteName = "Untitled"
    var noteBody = "No Content"
    var noteID = '1';
    var mode = 'create';


   $.ajax({
      url: "assets/php/todo_update.php", //This is the page where you will handle your SQL insert
      type: "GET",
      data: "mode=" + mode + "&noteID=" + noteID + "&noteHeader=" +noteName+ "&noteBody=" +noteBody,
      success: function(){
          console.log("AJAX request was successfull");
          location.reload();
      },
      error:function(){
          console.log("AJAX request was a failure");
      }   
    });
    
}
$('#noteArea').bind('input propertychange', function() {

    updateNote();
     
});

function updateNote() {
    var noteName = document.getElementsByClassName("note-item media fade in current").getElementById("noteName");
    var noteBody = document.getElementsByClassName("note-item media fade in current").getElementById("noteBody");
    var noteID = document.getElementsByClassName("note-item media fade in current").getElementById("noteID");
    var mode = 'update';


   $.ajax({
      url: "assets/php/todo_update.php", //This is the page where you will handle your SQL insert
      type: "GET",
      data: "mode=" + mode + "&noteID=" + noteID + "&noteHeader=" +noteName+ "&noteBody=" +noteBody,
      success: function(){
          console.log("AJAX request was successfull");
      },
      error:function(){
          console.log("AJAX request was a failure");
      }   
    });
    
}