function timelineToggle(id) {
    $(function () {
        $(".expProHidden" + id ).slideToggle(800);
        $(".expProButton" + id).toggleClass("fa-angle-double-down").toggleClass("fa-angle-double-up")
    })
}
$(function () {
    $(".hidden"  ).hide();
});