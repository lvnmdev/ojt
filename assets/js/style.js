$(document).ready(function() {
    //Preloader Start
    $(window).on("load", function() {
        preloaderFadeOutTime = 2000;
        function hidePreloader() {
            var preloader = $('.folding-cube-wrapper');
            preloader.fadeOut(preloaderFadeOutTime);
        }

        hidePreloader();
    });

    //Initialization of Datatable 
    $('#table_id').dataTable();

    //Side Navigation Bar Slide
    $("#openNav").click(function () {
        $(".side-navbar-container").css({"width":"270px"});
    });

    $("#closeNav").click(function () {
        $(".side-navbar-container").css({"width":"0"});
        $(".main-container").css({"margin-left":"0"});
    });

    //Scroll Up Button Function
    window.onscroll = function () { scrollFunction() };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            $("#scrollup-btn").css({"display":"block"});
        } else {
            $("#scrollup-btn").css({"display": "none"});
        }
    }

    // When the user clicks on the button, it scrolls to the top of the document

    $("#scrollup-btn").click(function () {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
        $('body,html').animate({
            scrollTop: 0
        }, 800);
    });
})

