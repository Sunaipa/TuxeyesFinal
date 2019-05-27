$(document).on("scroll", function(){
    if ($(document).scrollTop() >= $(".colExpertise").scrollTop() )
    {
        $(".colExpertise").fadeIn(1000)
    }
    else
    {

    }
});

$(function () {
    $(".colExpertise"  ).hide();
});