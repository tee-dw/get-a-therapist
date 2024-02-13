

$(document).ready(function(){

    // Show Sidebar
    $("#menu-btn").click(function(){

        $("aside").css("display", "block");

    })

    // Hide Sidebar
    $("#close-btn").click(function(){

        $("aside").css("display", "none");

    })

    // Toggle Theme
    $(".theme-toggler").click(function(){

        $("body").toggleClass("dark-theme-variables");

        $('.theme-toggler span').toggleClass('active');

    })


})