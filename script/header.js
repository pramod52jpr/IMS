$(document).ready(() => {
    $("#helloCompany").click(() => {
        $("#hellocompanyDropdown").slideToggle(200);
    })
    $(".itemDropdown").hide()
    $(".items").click(() => {
        $(".itemDropdown").slideToggle(200)
    })
    $(".hamburger").click(() => {
        var width = $(".navbar").css("width");
        $(".navbar").animate({ width: width == "0px" ? "300px" : "0px" }, 300);
    })
})