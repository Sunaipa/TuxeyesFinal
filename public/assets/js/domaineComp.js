$(document).on("scroll", function(){
    if ($(document).scrollTop() >= $(".colExpertise").scrollTop() )
    {
        $(".colExpertise").fadeIn(3000)
    }
    else
    {

    }
});

$(function () {
    $(".colExpertise"  ).hide();
});