$(function(){
    $("#openNav").click(function () {
        $(".side-navbar-container").css({ "width": "250px" });
        $(".main-container").css({ "margin-left": "250px" });
    });

    $("#closeNav").click(function () {
        $(".side-navbar-container").css({"width":"0"});
        $(".main-container").css({"margin-left":"0"});
    });
})

