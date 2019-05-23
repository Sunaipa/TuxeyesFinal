$(document).ready(function(){
    $("#flip").click(function(){
        $("#panel").slideDown("slow");
    });
});

function timelineToggle($id) {
    $("#timelineToggle").click(function () {
        $(".expProHidden" + $id).slideDown("slow");
    });
}


