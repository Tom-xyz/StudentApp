$('#contactPanel').load("assets/php/dashboard.php?function=contact", function () {

    $("#contactPanel").mCustomScrollbar({
        VerticalScroll: true,
    });

});

$('#emailPanel').load("assets/php/dashboard.php?function=email", function () {

    $("#emailPanel").mCustomScrollbar({
        VerticalScroll: true,
    });

});

$('#sortable-todo').load("assets/php/dashboard.php?function=todo", function () {

    $("#emailPanel").mCustomScrollbar({
        
    });

});