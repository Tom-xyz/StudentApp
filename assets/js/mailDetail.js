var url = document.URL;
var hash = url.substring(url.indexOf("#")+1);


	$('#detailMessage').load("assets/php/emailDetail.php?uid="+hash, function () {

});

